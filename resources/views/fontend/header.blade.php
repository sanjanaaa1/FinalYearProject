<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>@yield('title')</title>
            <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <!--------------------------------------------------------------------------------------------->
   <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        {{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}






   </head>
   <body>
        <!-- header section strats -->
        <header class="header_section">
           <div class="container">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                 <a class="navbar-brand" href="#"><img width="250" src="images/" alt="#" /></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class=""> </span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                       <li class="nav-item active">
                          <a class="nav-link" href="{{route('homePage')}}">Home <span class="sr-only">(current)</span></a>
                       </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                             <li><a href="{{route('aboutus')}}">About</a></li>
                             <li><a href="#">Testimonial</a></li>
                             <li><a href="{{route('feedback.form')}}">Feedback</a></li>
                          </ul>
                       </li>
                       <li class="nav-item">
                          {{-- <a class="nav-link" href="">Products</a> --}}
                           <a class="nav-link" href="{{ route('home-hoodie')}}">Copper</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{route('shoe-home')}}">Brass</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{route('customer-register')}}">  Login</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="{{route('customer.contactus')}}">Contact</a>
                          {{-- <a class="nav-link" href="">Contact</a> --}}
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{route('product.customization')}}">Customization</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link userLogo" href="javascript:;" id="click">
                             <i class="fas fa-user-circle"></i>
                          </a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{ route('cart.index') }}">
                             <i class="fas fa-shopping-cart"></i>
                             <span class="badge badge-pill badge-danger"> </span>
                          </a>
                       </li>


                       {{-- <form class="form-inline">
                          {{-- <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                          <i class="fa fa-search" aria-hidden="true"></i>
                          </button> --}}

                    </ul>
                 </div>
              </nav>
           </div>
        </header>
        <!-- end header section -->
