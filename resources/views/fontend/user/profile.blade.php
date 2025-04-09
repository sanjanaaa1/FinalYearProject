@extends('fontend.fontend-design')

@section('title')
User Profile
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #e91e63; color: white;">
                    <h3 class="mb-0">User Profile</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-user-circle fa-6x text-muted"></i>
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->email }}</p>
                            <p>Member since: {{ $user->created_at ? $user->created_at->format('F d, Y') : 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Account Information</h5>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Name:</div>
                                <div class="col-md-8">{{ $user->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Email:</div>
                                <div class="col-md-8">{{ $user->email }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Phone:</div>
                                <div class="col-md-8">{{ $user->phone ?? 'Not provided' }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Address:</div>
                                <div class="col-md-8">{{ $user->address ?? 'Not provided' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('user.orders') }}" class="btn btn-outline-primary mr-2">
                            <i class="fas fa-history"></i> View Order History
                        </a>
                        <a href="{{ route('homePage') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection