<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsBlog;
use DB;

class NewsBlogController extends Controller
{
    //

    public function  index(){
        return view('newsblog');

    }
     public function store(Request $request){
        $post=$request->all();

        $request->validate([
            'title'=>'required',
            // 'image'=>'required|mimes:jpeg,png,jpg,gif,max:2048',
            'description'=>'required',
        ]);

        $imageArray = [];
        $name = $post['image']->getClientOriginalName();
        $newName = time().$name;
        $post['image']->storeAs('public/newsblog/', $newName);
        $imageArray = $newName;
        $img = $imageArray;
        //echo "inserted successfully";
        $insert_data = NewsBlog::create([
            'title' =>  $post['title'],
            'image' => $img,
            'description' => $post['description'],

        ]);
        if ($insert_data ){
            return redirect()->route('news.display')->with('message','Inserted succsssful');}
            else{
                return back()->with('error','something went wrong');
            }

     }
      public function display(){
        $data = DB::table('news_blog')
        ->get();

        return view('shownews',['data'=>$data]);

      }
      public function destroy($id){
        $data= DB::table('news_blog')
        ->where('id',$id)
        ->delete();

    return redirect()->route('news.display')->with('error','Deleted Successfully!!');

      }
      public function edit($id){
        // dd($id);
        $data = NewsBLog::find($id);
        // dd($data);
        return view('newsupdate',compact('data','id'));
      }

    //   public function updatenews (Request $request,$id){
    //     $post = NewsBLog::find($id);
    //     $imageArray = [];
    //     $name = $post['image']->getClientOriginalName();
    //     $newName = time().$name;
    //     $post['image']->storeAs('public/newsblog/', $newName);
    //     $imageArray = $newName;
    //     $img = (json_encode($imageArray));
    //    //echo "inserted successfully";
    //     $insert_data = NewsBlog::create([
    //         'title' =>  $post['title'],
    //         'image' => $img,
    //         'description' => $post['description'],

    //     ]);
    //     if ($insert_data ){
    //         echo "success";
    //         return redirect()->route('news.display')->with('message','Inserted succsssful');}
    //         else{
    //             return back()->with('error','something went wrong');
    //         }

    //  //echo "success";

    //   }
    public function updatenews(Request $request, $id) {
        $post = NewsBLog::find($id);
        $imageArray = [];

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $newName = time().$name;
            $request->file('image')->storeAs('public/newsblog/', $newName);
            $imageArray[] = $newName;
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = json_encode($imageArray);
        $post->save();
        //cho"hurray";

       return redirect()->route('news.display')->with('message', 'Updated successfully');
    }








}
