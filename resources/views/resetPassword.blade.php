@extends('Design.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span class="tag">Reset Password</span></div>
                    @include('session')

                     <form action="{{ route('reset-password') }}" method="POST">
                        <input type="hidden" name="token" value="{{ $token }}">
                       @csrf
                    {{-- // ya bata id pathako ho  --}}
                        {{-- <input type="hidden" name="customerId" value="{{$customerId}}"> --}}

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="email">
                                        @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>


                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="password" type="text" class="form-control"
                                    placeholder="New Password">
                                 @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="password_confirmation" type="text" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Update Password</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>

    <style>
        .card{
            margin-top: 100px;
        }
        .card-header{
            background-color: green;
            text-decoration: none;
            font-weight: 40px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-style: white;
            font-size: 25px;
            font-weight: 10px;

        }

    </style>

@endsection


{{-- back button ma back hune route
validation not correction on men shoes --}}


