   <div class="header">

        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 " style="padding:0px;margin:0px">
                        <div class="language-wrapper">
                            <div class="box-language">
                                <div class="pull-right">
                                    <div class="text-right">

                                        <div class="account link-inline">
                                            <div class="dropdown text-right">
                                                <a href="#" aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown">
                                                    <span class="icon-user"></span>  @if(session('username')){{session('user')}} @else Account @endif<span class="icon-arrow-down"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if(session('username'))
                                                    <li><a href="{{url('my-account')}}"><span class="icon icon-user"></span>My Account</a></li>
                                                    
                                                    <li><a href="{{url('wish-list')}}"><span class="icon icon-heart"></span>My Wishlist</a></li>
                                                      <li><a href="{{url('logout')}}"><span class="icon icon-close"></span>Logout</a></li>
                                                   @else

                                                  <!--   <li><a href="compare.html"><span class="icon icon-graph"></span>Compare</a></li> -->
                                                    
                                                    <li><a href="{{url('my-login')}}"><span class="icon icon-lock"></span>Log In</a></li>
                                                    <li><a href="{{url('my-login')}}"><span class="icon icon-user-follow"></span>Create an account</a></li>
                                                     @endif
                                                     <li><a href="{{url('checkout')}}"><span class="icon icon-check"></span>Checkout</a></li>
                                                  
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding:0px;margin:0px">

                        <div class="search-area">
                           <form action="{{url('/search')}}" method="get">
                     {{ csrf_field() }}
                                <div class="control-group">
                                    <!--
                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-header">Clothing</li>
                                                <li><a tabindex="-1" href="#">- Men</a></li>
                                                <li><a tabindex="-1" href="#">- Women</a></li>
                                                <li><a tabindex="-1" href="#">- Boys</a></li>
                                                <li><a tabindex="-1" href="#">- Girls</a></li>
                                                <li class="menu-header">Electronics</li>
                                                <li><a tabindex="-1" href="#">- Laptops</a></li>
                                                <li><a tabindex="-1" href="#">- Desktops</a></li>
                                                <li><a tabindex="-1" href="#">- Cameras</a></li>
                                                <li><a tabindex="-1" href="#">- Mobile Phones</a></li>
                                            </ul>
                                        </li>
                                    </ul>
-->

                                    <input class="search-field" placeholder="Search here..." name="key" id="searchkey">
                                    <button type="submit" class="search-button" ><i class="icon-magnifier"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="shop-cart">
                            <ul>
                             
                                  @if(session('username'))
                                <li><a class="cart-icon cart-btn" href="{{url('wish-list')}}"><span id="countwhish"></span></span><span class="icon-heart"></span></a></li>
                                @endif
                                <li>
                                    <a href="#" class="cart-icon cart-btn"><i class="icon-basket-loaded"></i><span class="cart-label"><span id="countmob" >{{Cart::getContent()->groupBy('id')->count()}}</span></span></a>
                                    
                                    <div class="cart-box" >
                                        
                                        <div class="popup-container" >
                                             <?php  
                                       $res=Cart::getContent();
                                       
                                       ?>
                                         <span id="mcart">
                                             <?php if($res->isEmpty()){ ?>
                                 <span>  Cart is Empty. </span>
                                    <?php } ?>
                                             <?php
                                       foreach ($res as $ress) {  
                                       $img=DB::table('items')->where('product_id','=',$ress->id)->first();
                                 $imgs=$img->product_image;
                                       ?>
                                            <div class="cart-entry">
                                                <a href="#" class="image">
                                                    <img src="{{url('uploads/product/thumb_images/'.$imgs)}}" alt="">
                                                </a>
                                                <div class="content">
                                                    <a href="#" class="title">{{$ress->name}}</a>
                                                    <p class="quantity">Quantity: {{$ress->qty}}</p>
                                                    <span class="price">₹{{number_format($ress->price, 3, '.', ',')}}</span>
                                                </div>
                                                <div class="button-x">
                                                    <i class="icon-close"></i>
                                                </div>
                                            </div>
                                          <?php  } ?>
                                           <span id="sub"></span>
                                          <div id="subtotal">
                                              <?php if(!$res->isEmpty()){ ?>
                                            <div class="summary">
                                                <div class="subtotal">Sub Total</div>
                                                <div class="price-s">₹{{ Cart::subtotal()}}</div>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="{{url('my-cart')}}" class="btn btn-border-2">View Cart</a>
                                                <a href="{{url('checkout')}}" class="btn btn-common">Checkout</a>
                                                <div class="clear"></div>
                                            </div>
                                              <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                         <div class="share-icons">
<a href="https://m.facebook.com/tackletipshd/" target="_blank"><i class="fa fa-facebook"></i></a>
<!--<a href="#"><i class="fa fa-twitter"></i></a>-->
<a href="https://instagram.com/tackle_tips?igshid=baypxa508pyl" target="_blank"><i class="fa fa-instagram"></i></a>
<a href="http://youtube.com/c/TackleTips" target="_blank"><i class="fa fa-youtube"></i></a>
<!--<a href="#"><i class="fa fa-pinterest"></i></a>-->
</div>   
                            
                            
                             </div>
                    </div>
                </div>
            </div>
        </div>


        <nav class="navbar navbar-default" data-spy="affix" data-offset-top="50">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ URL::to('/') }}">
                            <img src="{{ URL::to('/') }}/front-end/assets/img/logoone.png" alt="">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-nav">
                            <li>
                         <?php $mcat1 = 1; ?>
                                <a href="{{url('products/'.$mcat1)}}">Reels <span class="caret"></span></a>
                 <?php $reels=DB::table('sub_category')->where('parent_id','1')->orderby('sort_order','asc')->get(); ?>
                                <ul class="dropdown">
                     @foreach($reels as $reel)
               <?php $cat1 = $reel->id; ?>
                                    <li>
             <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$reel->name}}
                                        </a>
                                    </li>
                                     @endforeach     
                                  
                                </ul>
                            </li>


                            <li>
                              <?php $mcat1 = 2; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Rod <span class="caret"></span></a>
                                <ul class="dropdown">
             <?php $rod=DB::table('sub_category')->where('parent_id','2')->orderby('sort_order','asc')->get(); ?>
               @foreach($rod as $ro)
               <?php $cat1 = $ro->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$ro->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                            
                                
                                </ul>
                            </li>

                        

                            <li>
                                <?php $mcat1 = 3; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Line <span class="caret"></span></a>
                                <ul class="dropdown">
                                    <?php $line=DB::table('sub_category')->where('parent_id','3')->orderby('sort_order','asc')->get(); ?>
               @foreach($line as $lin)
               <?php $cat1 = $lin->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$lin->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                                </ul>
                            </li>


                            <li>
                                <?php $mcat1 = 4; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Lure <span class="caret"></span></a>
                                <ul class="dropdown">
                                    <?php $lure=DB::table('sub_category')->where('parent_id','4')->orderby('sort_order','asc')->get(); ?>
               @foreach($lure as $lur)
               <?php $cat1 = $lur->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$lur->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                                </ul>
                            </li>

                            <li>
                            <?php $mcat1 = 5; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Accessories <span class="caret"></span></a>
                                <ul class="dropdown">
                                     <?php $accessories=DB::table('sub_category')->where('parent_id','5')->orderby('sort_order','asc')->get(); ?>
               @foreach($accessories as $acc)
               <?php $cat1 = $acc->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$acc->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                                </ul>
                            </li>



                            <li>
                               <?php $mcat1 = 6; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Terminal Tackle <span class="caret"></span></a>
                                <ul class="dropdown">
                                    <?php $terminal=DB::table('sub_category')->where('parent_id','6')->orderby('sort_order','asc')->get(); ?>
               @foreach($terminal as $ter)
               <?php $cat1 = $ter->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$ter->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                                </ul>
                            </li>
                            
                      <li>
                               <?php $mcat1 = 7; ?>
                                <a href="{{url('products/'.$mcat1)}}">
                                    Apparel <span class="caret"></span></a>
                                <ul class="dropdown">
                                    <?php $terminal=DB::table('sub_category')->where('parent_id','7')->orderby('sort_order','asc')->get(); ?>
               @foreach($terminal as $ter)
               <?php $cat1 = $ter->id; ?>
                                     <li>
                                        <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$ter->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                                </ul>
                            </li>


    <li>
                                <a href="#">
                                    Brand <span class="caret"></span></a>
                             <?php $brands=DB::table('brands')->orderby('id','asc')->get(); ?>
                                <ul class="dropdown">
                     @foreach($brands as $brand)
               <?php $br1 = $brand->url_word; ?>
                                    <li>
             <a class="active" href="{{url('brand-products/'.$br1)}}">
                                           {{$brand->name}}
                                        </a>
                                    </li>
                                     @endforeach     
                                  
                                </ul>
                            </li>
 <li>
                          
                                <a href="{{url('new-arrivals')}}">
                                     New Arrivals <span class="caret"></span></a>
                                <ul class="dropdown">
        
     
               <?php $reel = 1; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$reel)}}">
                                           Reels
                                        </a>
                                    </li>
                <?php $rod = 2; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$rod)}}">
                                           ROD
                                        </a>
                                    </li>
                <?php $line = 3; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$line)}}">
                                           LINE
                                        </a>
                                    </li>
                <?php $lure = 4; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$lure)}}">
                                           LURE
                                        </a>
                                    </li>
                <?php $accer =5; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$accer)}}">
                                           ACCESSORIES
                                        </a>
                                    </li>
                    <?php $terminal = 6; ?>
                                     <li>
            <a class="" href="{{url('new-arrivals/'.$terminal)}}">
                                           TERMINAL TACKLE
                                        </a>
                                    </li>
              <?php $apparel = 7; ?>
                                     <li>
            <a class="" href="{{url('new-arrivals/'.$apparel)}}">
                                           APPAREL
                                        </a>
                                    </li>          
                                
                                </ul>
                            </li>

                          

                            <!--<li>-->
                            <!--    <a href="#">-->
                            <!--        Tackle Tips-->
                            <!--    </a>-->
                            <!--</li>-->

                            <!--<li>-->
                            <!--    <a href="{{url('fish-report')}}">-->
                            <!--        Fishing Reports-->
                            <!--    </a>-->
                            <!--</li>-->


                        </ul>


                    </div>
                </div>
            </div>


            <ul class="mobile-menu">
                
                
                      <li>
                         <?php $mcat1 = 1; ?>
                                <a href="{{url('products/'.$mcat1)}}">Reels <span class="caret"></span></a>
                 <?php $reels=DB::table('sub_category')->where('parent_id','1')->orderby('sort_order','asc')->get(); ?>
                                <ul class="dropdown">
                     @foreach($reels as $reel)
               <?php $cat1 = $reel->id; ?>
                                    <li>
             <a class="" href="{{url('category-products/'.$cat1)}}">
                                           {{$reel->name}}
                                        </a>
                                    </li>
                                     @endforeach     
                                  
                                </ul>
                            </li>
                            
                            
                <li>
                     <?php $mcat1 = 1; ?>
                    <a href="{{url('products/'.$mcat1)}}">Reels <span class="caret"></span></a>
                    
                       <?php $reels=DB::table('sub_category')->where('parent_id','1')->orderby('sort_order','asc')->get(); ?>
                    <ul class="dropdown">
                         @foreach($reels as $reel)
               <?php $cat1 = $reel->id; ?>
                                    <li>
             <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$reel->name}}
                                        </a>
                                    </li>
                                     @endforeach     
                   
                    </ul>
                </li>

                <li>
                      <?php $mcat1 = 2; ?>
                    <a href="{{url('products/'.$mcat1)}}">Rod <span class="caret"></span></a>
                    <ul class="dropdown">
                  <?php $rod=DB::table('sub_category')->where('parent_id','2')->orderby('sort_order','asc')->get(); ?>
               @foreach($rod as $ro)
               <?php $cat1 = $ro->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$ro->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>




             

                <li>
                     <?php $mcat1 = 3; ?>
                     <a href="{{url('products/'.$mcat1)}}">Line <span class="caret"></span></a>
                    <ul class="dropdown">
                     <?php $line=DB::table('sub_category')->where('parent_id','3')->orderby('sort_order','asc')->get(); ?>
               @foreach($line as $lin)
               <?php $cat1 = $lin->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$lin->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>


                <li>
                      <?php $mcat1 = 4; ?>
                    <a href="{{url('products/'.$mcat1)}}">Lure <span class="caret"></span></a>
                    <ul class="dropdown">
                         <?php $lure=DB::table('sub_category')->where('parent_id','4')->orderby('sort_order','asc')->get(); ?>
               @foreach($lure as $lur)
               <?php $cat1 = $lur->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$lur->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>

                <li>
                     <?php $mcat1 = 5; ?>
                    <a href="{{url('products/'.$mcat1)}}">Accessories <span class="caret"></span></a>
                    <ul class="dropdown">
                          <?php $accessories=DB::table('sub_category')->where('parent_id','5')->orderby('sort_order','asc')->get(); ?>
               @foreach($accessories as $acc)
               <?php $cat1 = $acc->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$acc->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>



                <li>
                     <?php $mcat1 = 6; ?>
                    <a href="{{url('products/'.$mcat1)}}">Terminal Tackle <span class="caret"></span></a>
                    <ul class="dropdown">
                         <?php $terminal=DB::table('sub_category')->where('parent_id','6')->orderby('sort_order','asc')->get(); ?>
               @foreach($terminal as $ter)
               <?php $cat1 = $ter->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$ter->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>
                                <li>
                     <?php $mcat1 = 7; ?>
                    <a href="{{url('products/'.$mcat1)}}">Apparel <span class="caret"></span></a>
                    <ul class="dropdown">
                         <?php $terminal=DB::table('sub_category')->where('parent_id','7')->orderby('sort_order','asc')->get(); ?>
               @foreach($terminal as $ter)
               <?php $cat1 = $ter->id; ?>
                                     <li>
                                        <a class="active" href="{{url('category-products/'.$cat1)}}">
                                           {{$ter->name}}
                                        </a>
                                    </li>
                                     @endforeach 
                    </ul>
                </li>


   <li>
                    <a href="#">Brand <span class="caret"></span></a>
                      <?php $brands=DB::table('brands')->orderby('id','asc')->get(); ?>
                    <ul class="dropdown">
                       @foreach($brands as $brand)
               <?php $br1 = $brand->url_word; ?>
                                    <li>
             <a class="active" href="{{url('brand-products/'.$br1)}}">
                                           {{$brand->name}}
                                        </a>
                                    </li>
                                     @endforeach   
                    </ul>
                </li>
<li>
                          
                                <a href="{{url('new-arrivals')}}">
                                     New Arrivals <span class="caret"></span></a>
                                <ul class="dropdown">
        
     
               <?php $reel = 1; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$reel)}}">
                                           Reels
                                        </a>
                                    </li>
                <?php $rod = 2; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$rod)}}">
                                           ROD
                                        </a>
                                    </li>
                <?php $line =3; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$line)}}">
                                           LINE
                                        </a>
                                    </li>
                <?php $lure = 4; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$lure)}}">
                                           LURE
                                        </a>
                                    </li>
                <?php $accer = 5; ?>
                                     <li>
                                        <a class="" href="{{url('new-arrivals/'.$accer)}}">
                                           ACCESSORIES
                                        </a>
                                    </li>
             <?php $terminal = 6; ?>
                                     <li>
            <a class="" href="{{url('new-arrivals/'.$terminal)}}">
                                           TERMINAL TACKLE
                                        </a>
                                    </li>
              <?php $apparel =7; ?>
                                     <li>
            <a class="" href="{{url('new-arrivals/'.$apparel)}}">
                                           APPAREL
                                        </a>
                                    </li>
                            
                                
                                </ul>
                            </li>

                <li>
                    <a href="">
                        Tackle Tips
                    </a>
                </li>

                <li>
                    <a href="">
                        Fishing Reports
                    </a>
                </li>



            </ul>

        </nav>
    </div>