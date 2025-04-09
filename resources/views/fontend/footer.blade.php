
<!-- footer start -->
<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                 </div>
                 <div class="information_f">
                   <p><strong>ADDRESS:</strong> Naxal Herald College</p>
                   <p><strong>TELEPHONE:</strong> 9762300260</p>
                   <p><strong>EMAIL:</strong> ArtfactNepal@gmail.com</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menu</h3>
                   <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Testimonial</a></li>
                      <li><a href="#">Blog</a></li>
                      <li><a href="#">Contact</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Account</h3>
                   <ul>
                      <li><a href="#">Account</a></li>
                      <li><a href="#">Checkout</a></li>
                      <li><a href="#">Login</a></li>
                      <li><a href="#">Register</a></li>
                      <li><a href="#">Shopping</a></li>
                      <li><a href="#">Widget</a></li>
                   </ul>
                </div>
             </div>
                </div>
             </div>
             <div class="col-md-5">
                {{-- <h5>This is my Google Maps web page</h5> --}}
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <div class="widget_menu">
                   <h3>Newsletter</h3>
                   <div class="information_f">
                     <p>Subscribe by our newsletter and get update protidin.</p>
                   </div>
                   <div class="form_sub">
                      <form>
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="Enter Your Mail" name="email" />
                               <input type="submit" value="Subscribe" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div> --}}
             </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By Outfits </p>


    </p>
</div>

<div class="modal userModal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal-head">
            </div>
            <div id="modal-body">
                <p><a href="{{route('user.profile')}}" id="changePass">Details</a></p>
                <p><a href="{{route('user.orders')}}" id="orderHistory">Order History</a></p>
            </div>
            <div id="modal-footer">
                <button id="modal-close" type="button" class="btn btn-secondary closeUserModal">Close</button>

            </div>
        </div>
    </div>
</div>


 <!-- jQery -->
 <script src="/js/jquery-3.4.1.min.js"></script>
 <!-- popper js -->
 <script src="/js/popper.min.js"></script>
 <!-- bootstrap js -->
 <script src="/js/bootstrap.js"></script>


 <!-- custom js -->
 <script src="js/custom.js"></script>

<script>
    $(".userLogo").on("click", function(e) {
        e.preventDefault();
        $(".userModal").modal('show');
    });

    $('.closeUserModal').on('click', function (e) {
        e.preventDefault();
        $(".userModal").modal('hide');
    });

</script>

</body>
</html>
