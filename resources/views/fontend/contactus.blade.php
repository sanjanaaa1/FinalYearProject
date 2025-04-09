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
                         <h3 class="form-title">Contact Us</h3>
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

     <!-- <div class="footer_social">
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
     </div> -->
     <!-- end why section -->
     <!-- arrival section -->

     <!-- end arrival section -->

<style>
.inner_page_head {
    padding: 40px 0;
    background-color: #fff;  /* Changed from #f8f9fa to white */
}

.inner_page_head h3 {
    font-size: 42px;
    font-weight: 600;
    margin: 0;
    color: #333;
}

.why_section {
    padding: 60px 0;
    background: #fff;
}

.why_section .full {
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
}

.why_section form {
    max-width: 600px;
    margin: 0 auto;
}

.inner_page_head {
    padding: 20px 0;
    background-color: #fff;
}

.inner_page_head h3 {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.why_section input,
.why_section textarea {
    width: 100%;
    padding: 12px 0;
    margin-top: 10px;
    margin-bottom: 25px;
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    font-size: 16px;
    transition: all 0.3s ease;
    color: #333;  /* Darker text color */
}

::placeholder {
    color: #666;  /* Darker placeholder color */
    font-weight: 400;  /* Slightly bolder font */
}

.why_section input:focus,
.why_section textarea:focus {
    outline: none;
    border-bottom: 2px solid #000;
}

.why_section input[type="submit"] {
    background: #e91e63;  /* Changed to match heading color */
    color: #fff;
    padding: 12px 40px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    width: auto;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 2px 5px rgba(233, 30, 99, 0.3);  /* Shadow color updated to match */
}

.why_section input[type="submit"]:hover {
    background: #c2185b;  /* Darker shade of the same pink */
    box-shadow: 0 3px 8px rgba(233, 30, 99, 0.4);
}

.footer_social {
    text-align: center;
    padding: 20px 0;
}

.footer_social a {
    color: #000;
    margin: 0 15px;
    font-size: 18px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer_social a:hover {
    color: #666;
}
.form-title {
    color: #e91e63;
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 30px;
    text-align: center;  /* Changed from left to center */
}

.inner_page_head {
    display: none;  /* Hide the original heading section */
}

::placeholder {
    color: #555;  /* Slightly lighter than before */
    font-weight: 400;
}

// Remove the duplicate ::placeholder at the bottom of your CSS
</style>

@endsection
