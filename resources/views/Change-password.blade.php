

@extends('backend.layout.admindesign')

@section('title')
<title>changepasssword</title>
@endsection


@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span class="tag">Change Password</span></div>

                    <form action="{{ route('change.password') }}" method="POST">
                       @csrf
                        <div class="card-body">
                            <div>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            </div>
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="oldpassword" type="password" class="form-control"
                                    placeholder="Old Password">
                                 @error('oldpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="current_password" type="password" class="form-control"
                                    placeholder="New Password">
                                 @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="confirm_password" type="password" class="form-control" id="confirmNewPasswordInput"
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
            margin-top: 50px;
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


