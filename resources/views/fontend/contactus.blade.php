@extends('fontend.fontend-design')

@section('title')
Contact Us
@endsection

@section('content')

      <!-- inner page section -->
      <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Contact us</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end inner page section -->
     <!-- why section -->
     <section class="why_section layout_padding">
        <div class="container">

           <div class="row">
              <div class="col-lg-8 offset-lg-2">
                 <div class="full">
                    <form action="{{route('contact-us')}}" method="POST">
                        @csrf
                       <fieldset>
                         @include('session')
                          <input type="text" placeholder="Enter your full name" name="name" required />
                          <input type="email" placeholder="Enter your email address" name="email" required />
                          <input type="text" placeholder="Enter subject" name="subject" required />
                          <textarea placeholder="Enter your message"  name ="message" required></textarea>
                          <input type="submit" value="Submit" />
                       </fieldset>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>

     <div class="footer_social">
        <a href="">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
        <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a href="">
        <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
        <i class="fa fa-pinterest" aria-hidden="true"></i>
        </a>
     </div>
     <!-- end why section -->
     <!-- arrival section -->

     <!-- end arrival section -->

@endsection
