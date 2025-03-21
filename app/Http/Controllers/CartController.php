<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\MenHoodie;
use App\Models\MenShoe;
use App\Models\Product;



use Auth;



class CartController extends Controller
{
    public function addToCart(Request $request)

    {
        //dd($request->all());
        try {
            $productId = $request->input('product_id');
            $productType = $request->input('product_type');
            $quantity = $request->input('product_quantity');
            //dd($productId);
            $price = $request->input('product_price');
            $title =$request->input('product_title');
            $category_name = $request->input('category_name');
            $image = $request->input('product_image');
         // dd($category_name);
            // Check if the user is authenticated
            if (!auth()->check()) {
                return redirect()->route('customer-login')->with('message','You need to log in to add products to your cart.');
            }

            $cart = Cart::where('user_id', auth()->id())->get();
            //dd($cart);

            $cartItem = null;

            $productIdFields = [];
            if ($productType == 'copper') {
                // dd("hi");
                $productIdFields = ['product_id_copper'];
            } else if ($productType == 'brass') {
                $productIdFields = ['product_id_brass'];
            }

            if (!empty($productIdFields)) {
                foreach ($productIdFields as $productIdField) {
                    $cartItem = $cart->where($productIdField, $productId)->first();
                    if ($cartItem) {
                        // Update the quantity of the existing cart item
                        $cartItem->quantity += $quantity;
                        $cartItem->save();
                        break;
                    }
                }
            }

            if (!$cartItem) {
                // Create a new cart item
                $cartItemData = [
                    'user_id' => auth()->id(),
                    'product_id_brass' => ($productType == 'brass') ? $productId : null,
                    'product_id_copper' => ($productType == 'copper') ? $productId : null,
                    'quantity' => $quantity,
                    'price' => $price,
                    'title'=> $title,
                    'category_name'=>$category_name,
                    'image'=>$image
                ];
                Cart::create($cartItemData);
            }
               //dd("sucess");
            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
        } catch (Exception $e) {
            //dd("eror");
            return redirect()->route('cart.index')->with('error', 'Error adding product to cart: ' . $e->getMessage());
        }
    }





public function index()
{

    $cartItems = Cart::where('user_id', auth()->id())->get();

    $cartCount = $cartItems->sum('quantity');


    return view('cart', compact('cartCount', 'cartItems'));
}


public function decreaseQuantity($id)
{
    try {
        $cartItem = Cart::find($id);

        if ($cartItem) {
  
            $cartItem->quantity--;

            // Save the changes to the database
            $cartItem->save();

            return redirect()->route('cart.index')->with('success', 'Quantity decreased successfully.');
        } else {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error decreasing quantity: ' . $e->getMessage());
    }
}

public function increaseQuantity($id)
{
    try {

        $shoe = MenShoe::all();
    $hoodies = MenHoodie::all();
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->quantity++;




            $cartItem->save();
          //  dd("success");

            return redirect()->back()->with('success', 'Quantity increased successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error increasing quantity: ' . $e->getMessage());
    }
}



 public function showQuanity(){



    $cartItems = Cart::where('user_id', auth()->id())->get();

    $cartCount = $cartItems->sum('quantity');
    return view('fonend.header');
 }

 public function remove($id)
{
    Cart::find($id)->delete();
    return redirect()->back()->with('success', 'Item removed from cart');
}

public function checkOut(){
      //dd("hi");
    return view('checkoutpage');
}

}
