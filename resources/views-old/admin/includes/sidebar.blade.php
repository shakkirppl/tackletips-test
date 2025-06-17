                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{url('assets/demo/img/profile-pics/8.jpg')}}" alt="">
                            <div>
                                <div class="user__name">Admin</div>
                                <div class="user__email">admin@gmail.com</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-item" href="#">View Profile</a>
                            <a class="dropdown-item" href="#">Settings</a> --}}
                            <a class="dropdown-item" href="{{url('/myadmin-logout')}}">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation__active"><a href="{{url('admin/dash-board')}}"><i class="zmdi zmdi-home"></i> Home</a></li>

                        <li class="navigation__sub {{session('catelog')}}">
                            <a href="#"><i class="zmdi zmdi-local-grocery-store zmdi-hc-fw"></i> Products</a>

                            <ul>
                               <li class="{{session('product')}}"><a href="{{url('/products')}}">Products</a></li>
                               
                              
                                 
                           
                                <li style="display: none;" class="{{session('stock')}}"><a href="{{url('/ad_stock')}}">Product Stock</a></li>
                               
                            </ul>
                        </li>
                        
                         <li class="navigation__sub" style="display: none;">
                            <a href="#"><i class="zmdi zmdi-local-wc zmdi-hc-fw"></i> Quick Price</a>

                            <ul>
                                <li class=""><a href="{{ url('quick-price')}}">Quick price</a></li>
                            </ul>
                  </li>

                        <li class="navigation__sub {{session('sales')}}">
                            <a href="#"><i class="zmdi zmdi-local-shipping zmdi-hc-fw"></i> Sales</a>

                            <ul>
                               <li class="{{session('/purchase')}}"><a href="{{ url('/ad_purchase') }}">Purchase History</a></li>
                                <li class="{{session('/orders')}}"><a href="{{ url('/ad_orders') }}">Orders History</a></li>
                                 <li class="{{session('/orders/un-paid')}}"><a href="{{ url('/ad_orders/un-paid') }}">Orders Unpaid</a></li>
                                <!-- <li class="{{session('/guest')}}"><a href="{{ url('/ad_guest_orders') }}">Guest Orders History</a></li> -->
                                <li style="display: none;"><a href="boxed-layout.html">Returns</a></li>
                                <li class="navigation__sub"><a href="hidden-sidebar-boxed-layout.html" style="display: none;">Gift Vouchers <i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i></a>

                                        <ul>
                                         <li><a href="hidden-sidebar.html" style="color: #2196f32196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Gift Vouchers</a></li> 
                                          <li><a href="hidden-sidebar.html" style="color: #2196f32196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Voucher Theme</a></li>                                        
                                         
                                        </ul>


                                </li>                              
                                
                            </ul>
                        </li>

                          <!--<li class="navigation__sub">-->
                          <!--  <a href="#"><i class="zmdi zmdi-local-wc zmdi-hc-fw"></i>Subscribe</a>-->
                          <!--  <ul>-->
                          <!--    <li class=""><a href="{{ url('whatsapp')}}">Subscribe</a></li>-->
                          <!--  </ul>-->
                          <!--</li>-->

                          <!--  <li class="navigation__sub">-->
                          <!--  <a href="#"><i class="zmdi zmdi-local-wc zmdi-hc-fw"></i> Offers</a>-->
                          <!--  <ul>-->
                          <!--    <li class=""><a href="{{ url('admn-daily-deals')}}">Daily Deals</a></li>-->
                          <!--  </ul>-->
                          <!--</li>-->
                         <!--  <li class="navigation__sub ">
                            <a href="#"><i class="zmdi zmdi-local-wc zmdi-hc-fw"></i> Attributes & Brands </a>
                            <ul>
                              <li class=""><a href="{{ url('/attributes')}}">Attributes</a></li>
                              <li class=""><a href="{{ url('/attribute-values')}}">Attribute Values</a></li>
                              <li class=""><a href="{{ url('/brands')}}">Brands</a></li>
                            </ul>
                            
                          </li> -->

          <li class="navigation__sub {{session('customers')}}">
                            <a href="#"><i class="zmdi zmdi-local-wc zmdi-hc-fw"></i> Customers</a>

                            <ul>
                                <li class=""><a href="{{ url('/ad_customers')}}">Customers</a></li>
                                <!--  <li class=""><a href="{{ url('/wholesale_customers')}}">Wholesale Customers</a></li> -->
                             <!--    <li class=""><a href="{{ url('/customer_groups')}}">Customer Groups</a></li> -->
                                <li style="display: none;"><a href="">Customer Approvals</a></li>
                                <li style="display: none;"><a href="">Custom Field</a></li>                              
                            </ul>
                  </li>

                  <!--<li class="navigation__sub" style="display: none;">-->
                  <!--          <a href="#"><i class="zmdi zmdi-markunread-mailbox zmdi-hc-fw"></i> Marketing</a>-->

                  <!--          <ul>-->
                  <!--              <li><a href="">Marketing</a></li>-->
                  <!--              <li><a href="">Coupons</a></li>-->
                  <!--              <li><a href="">Mail</a></li>-->
                             
                  <!--          </ul>-->
                  <!--</li>-->

                  <li class="navigation__sub" style="display: none;">
                            <a href="#"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> System</a>

                            <ul>
                                <li><a href="">Settings</a></li>
                                <li class="navigation__sub"><a href="boxed-layout.html">Users <i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i></a>

                                         <ul>
                                         <li><a href="" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Users</a></li> 
                                          <li><a href="" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> User Groups</a></li>                                        
                                         
                                        </ul>


                                </li>
                                <li class="navigation__sub" style="display: none;"><a href="">Localisation <i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i></a>

                                         <ul>
                                         <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Store Location</a></li> 
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Languages</a></li> 
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Currencies</a></li>
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Stock Statuses</a></li>
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Order Statuses</a></li>
                                          <li class="navigation__sub"><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Returns <i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i></a>
                                                    <ul>
                                                        <li><a href="hidden-sidebar.html" style="color: #d066e2;"><i class="zmdi zmdi-caret-right zmdi-hc-fw"></i> Return Statuses</a></li>
                                                        <li><a href="hidden-sidebar.html" style="color: #d066e2;"><i class="zmdi zmdi-caret-right zmdi-hc-fw"></i> Return Actions</a></li>
                                                        <li><a href="hidden-sidebar.html" style="color: #d066e2;"><i class="zmdi zmdi-caret-right zmdi-hc-fw"></i> Return Reasons</a></li>

                                                    </ul>

                                          </li> 

                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Countries</a></li> 
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Zones</a></li> 
                                          <li class="navigation__sub"><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Taxes <i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i></a>

                                                <ul>
                                                        <li><a href="hidden-sidebar.html" style="color: #d066e2;"><i class="zmdi zmdi-caret-right zmdi-hc-fw"></i> Tax Classes</a></li>
                                                        <li><a href="hidden-sidebar.html" style="color: #d066e2;"><i class="zmdi zmdi-caret-right zmdi-hc-fw"></i> Tax Rates</a></li>
                                                        

                                                    </ul>

                                          </li> 

                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Length Classes</a></li> 
                                          <li><a href="hidden-sidebar.html" style="color: #2196f3;"><i class="zmdi zmdi-label-alt-outline zmdi-hc-fw"></i> Weight Classes</a></li>                                       
                                         
                                        </ul>


                                </li>
                                <li><a href="boxed-layout.html">Maintenance</a></li>
                             
                            </ul>
                  </li>


                        <li class="navigation__sub"><a href="typography.html" style="display: none;"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i> Reports</a>
                                <ul>
                                         <li><a href="{{url('/orders_pending')}}">Orders Pending</a></li>
                                         <li><a href="">Customer Report</a></li>
                                         <li><a href=""> Statistics</a></li> 
                                </ul>

                        </li>
                        <!-- <li class="navigation__sub"><a href="typography.html"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i> Advertisment</a>-->
                        <!--        <ul>-->
                        <!--                 <li><a href="{{url('/advertisment')}}">Add Advertisment</a></li>-->
                                        
                        <!--        </ul>-->

                        <!--</li>-->

                        <li class="navigation__sub" ><a href="typography.html"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i>Blog</a>
                                <ul>
                                         <li><a href="{{url('/admin/blog')}}">Add Blog</a></li>
                                         <li><a href="{{url('/adm-blog-cat')}}">Category</a></li>
                                        
                                </ul>

                        </li>
                           <li class="navigation__sub" ><a href="typography.html"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i>Testimonial</a>
                                <ul>
                                         <li><a href="{{url('/admin/testimonial')}}">Add Testimonial</a></li>
                                        
                                        
                                </ul>

                        </li>
                        <li class="navigation__sub"><a href="typography.html"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i> Home page Images</a>
                                <ul>
                                         <li><a href="{{url('/slider-images')}}">Home Slider images</a></li>
                                        
                                </ul>

                        </li>
                        
                        <!-- <li class="navigation__sub"><a href="typography.html"><i class="zmdi zmdi-balance-wallet zmdi-hc-fw" ></i> Sell on </a>-->
                        <!--        <ul>-->
                        <!--                 <li><a href="{{url('/sell-on-companies')}}">Comapnies</a></li>-->
                                        
                        <!--        </ul>-->

                        <!--</li>-->
   

                    </ul>
                </div>