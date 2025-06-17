

    <footer class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="contact-us">
                        <h3 class="widget-title">Contact Us</h3>
                        <ul class="contact-list">
                            <li><i class="icon-home"></i> <span>Tackle Tips Fishing Tackle Store <br>1st Floor, 11/893-J, Tackle Tips, Tirur - Kadalundi Rd,<br> Rod, Nadakavu,
                                    Tanur, <br>Kerala 676302</span></li>
                            <li><i class="icon-call-out"></i> <span>070129 01159</span></li>
                            <li><i class="icon-envelope"></i> <span><a href="#" class="">info@tackletips.com
                                    </a></span> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <h3 class="widget-title">Useful Links</h3>
                    <ul>
                         <li>
                            <a href="{{url('about-us')}}">
                          Abous Us
                            </a>
                        </li>
             
                       
                         <li>
                            <a href="{{url('privacy-policy')}}">
                          Privacy Policy
                            </a>
                        </li>
                         <li>
                            <a href="{{url('terms-and-conditions')}}">
                          Terms and Conditions
                            </a>
                        </li>
                          <li>
                            <a href="{{url('refund-cancellation-policy')}}">
                          Refund/Cancellation Policy
                            </a>
                        </li>
                          <li>
                            <a href="{{url('shipping-policy')}}">
                         Shipping Policy
                            </a>
                        </li>
                        <!-- @if(session('username'))-->
                        <!--<li><a href="{{url('my-account')}}">My Account</a></li>-->
                        <!--<li><a href="{{url('contact')}}">Contact</a></li>-->
                        <!--<li><a href="{{url('checkout')}}">Checkout</a></li>-->
                        <!--<li><a href="{{url('wish-list')}}">Wishlist</a></li>-->
                        <!--@endif-->
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <h3 class="widget-title">Product Tags</h3>
                    <div class="tagcloud">
                         <?php $mcat1 = Crypt::encryptString(1); ?>
                          <?php $mcat2 = Crypt::encryptString(2); ?>
                          <?php $mcat3 = Crypt::encryptString(3); ?>
                          <?php $mcat4 = Crypt::encryptString(4); ?>
                          <?php $mcat5 = Crypt::encryptString(5); ?>
                          <?php $mcat6 = Crypt::encryptString(6); ?>
                        <a href="{{url('products/'.$mcat1)}}" class="tag-link">Reels </a>
                        <a href="{{url('products/'.$mcat2)}}" class="tag-link">Rod </a>
                        <a href="{{url('products/'.$mcat3)}}" class="tag-link">Line </a>
                        <a href="{{url('products/'.$mcat4)}}" class="tag-link">Lure </a>
                        <a href="{{url('products/'.$mcat5)}}" class="tag-link">Accessories </a>
                        <a href="{{url('products/'.$mcat6)}}" class="tag-link">Terminal Tackle </a>
                       
                        <a href="#" class="tag-link">Tackle Tips</a>
                        <a href="#" class="tag-link">Fishing Reports</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="block-subscribe">
                        <h3 class="widget-title">Newsletter</h3>
                        <form class="subscribe">
                            <input type="text" class="form-control" name="email" placeholder="Enter Email">
                            <button type="submit" class="btn btn-common">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div id="copyright">
        <div class="container">
            <div class="row" >
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>&copy; 2022 Tackle Tips- Fishing Tackle Store</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="payment pull-right">
                        <p>Designed & Developed by <a rel="nofollow" href="https://sysbitech.com/">Sysbreeze Technologies</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <a href="#" class="back-to-top">
        <i class="icon-arrow-up"></i>
    </a>


 

    <!--<a href="https://wa.me/+970000000000" id="callme1" class="mb-whtsup-none" target="_blank">-->
    <!--    <div id="callmeMain1">-->
    <!--        <i class="fa fa-whatsapp my-float"></i>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<a href="tel:+970000000000" id="live1" class="" target="_blank">-->
    <!--    <div id="livechat1">-->
    <!--        <i class="fa fa-phone my-float"></i>-->
    <!--    </div>-->
    <!--</a>-->

    <div id="preloader">
        <div id="status">
            <div class="spinner">
                Loading...
            </div>
        </div>
    </div>


  
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery-min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/ion.rangeSlider.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/classie.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/nivo-lightbox.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery.slicknav.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/contact-form-script.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/main.js"></script>
      <script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery.flexslider.js"></script>
      
      
<!--<script src="{{ URL::to('/') }}/front-end/assets/js/jquery.jqZoom.js"></script>-->


<script> jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val-1 ).change();
            } 
        });
    });</script>
    
    
    

    
    
    
    
    
    <script>$(function(){
    $('#myModal').on('show.bs.modal', function(){
        var myModal = $(this);
        clearTimeout(myModal.data('hideInterval'));
        myModal.data('hideInterval', setTimeout(function(){
            myModal.modal('hide');
        }, 1000));
    });
});</script>

<div class="success-popup-cart">
                             <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Item Selected
            </div>
        </div> 
    </div>
</div>
</div>



