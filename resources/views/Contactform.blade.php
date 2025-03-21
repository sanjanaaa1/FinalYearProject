@extends('backend.layout.admindesign')

@section('title')
<title>Send Email </title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white"> Send Email</h3>
        </div>
        <div class="card-body">

            {{-- @if(Session::has('message'))

            <script>
        toastr.options = {
                "postion":true,
                "progressBar":true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('message') }}");
            //$.notify("Hello World");
            //$.notify("Message addes sucesfully ", "success");
            </script> --}}

            @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif


            <form method="POST" action="{{ route('contact.us-form')}} " id="contactUSForm" >
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$post->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $post->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Subject:</strong>
                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ $post->subject}}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Message:</strong>
                            <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
                @if(Session::has('success'))
                <script>
            toastr.options = {
                    "postion":true,
                    "progressBar":true,
                    "closeButton": true,
                }
                toastr.success("{{ Session::get('success') }}");
                //$.notify("Hello World");
                //$.notify("Message addes sucesfully ", "success");
                </script>

                @endif
            </form>

        </div>
    </div>
    <script>
        var botmanWidget = {
        aboutText: 'OuTFiT TOps',
        introMessage: "✋ Hello there welcom"

        };
        </script>
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection
