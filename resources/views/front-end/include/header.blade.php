<section>
   <div class="top-container">
      <div class="container">
         <div class="row">
            <div class="col-md-2">
            </div>
            <div class=" col-md-7 search-container">
               <div>
                  <form action="{{url('/search')}}" method="get">
                     {{ csrf_field() }}
                     <div>
                        <div class="search-bar">
                           <input type="text" placeholder="Search..." class="search-input" name="key" id="searchkey" />
                           <button type="submit" class="search-button">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-3 div-main">
               <div class="div-one">
                  <div class="dropdown">
                     @if(Auth::user())
                     <button class="dropdown-button login-button">
                     My Account <span class="arrow">▼</span>
                     </button>
                     @else
                     <button class="dropdown-button">
                     Account <span class="arrow">▼</span>
                     </button>
                     @endif
                     <div class="dropdown-menu">
                        <a href="{{url('checkout')}}">Checkout</a>
                        @if(Auth::user())
                        <a href="{{url('my-order')}}">Account</a>
                        <a href="{{ route('logout') }}">Log Out</a>
                        @else
                        <a href="{{url('user-login')}}">Log In</a>
                        <a href="{{url('user-register')}}">Create An Account</a>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="div-two">
                  <div class="cart-container">
                     <a href="{{url('my-cart')}}" >
                     <i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart-count">{{Cart::getTotalQuantity()}}</span>
                     </a>
                  </div>
               </div>
               <div class="div-three">
                  <div class="social-media">
                     <a href="https://www.facebook.com/tackletipshd/?_rdr" target="_blank" class="social-link facebook">
                     <i class="fa fa-facebook"></i>
                     </a>
                     <a href="https://www.instagram.com/tackle_tips?igshid=baypxa508pyl" target="_blank" class="social-link instagram">
                     <i class="fa fa-instagram"></i>
                     </a>
                     <a href="https://www.youtube.com/c/TackleTips" target="_blank" class="social-link youtube">
                     <i class="fa fa-youtube"></i>
                     </a>
                  </div>
               </div>
               <div class="mobile-icon">
                  <div id="menu-btn" class="mobile-menu">
                     <i class="fas fa-bars"></i>
                  </div>
               </div>
               <div id="menu-box" class="menu-box">
                  <ul class="navbar-nav mb-lg-0 main-list ">
                     <h6>All Categories </h6>
                     @php
                     use App\Models\SubCategory;
                     use App\Models\Brands;
                     use App\Models\Category;
                     $reels =SubCategory::select('name','slug')->where('parent_id',1)->get() ;
                     $rod =SubCategory::select('name','slug')->where('parent_id',2)->get() ;
                     $line =SubCategory::select('name','slug')->where('parent_id',3)->get() ;
                     $lure =SubCategory::select('name','slug')->where('parent_id',4)->get() ;
                     $accessories =SubCategory::select('name','slug')->where('parent_id',5)->get() ;
                     $terminal =SubCategory::select('name','slug')->where('parent_id',6)->get() ;
                     $apparel =SubCategory::select('name','slug')->where('parent_id',7)->get() ;
                     $spare =SubCategory::select('name','slug')->where('parent_id',8)->get() ;
                     $brands =Brands::select('name','url_word')->get() ;
                     $category =Category::select('name','slug')->get() ;
                     @endphp
                     <li class="nav-item sub-categories active">
                        <span class="arrow-mobilemenu">▼</span> Reels
                        <ul class="sub-list-mobile hidden">
                           @foreach($reels as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>  Rod
                        <ul class="sub-list-mobile hidden">
                           @foreach($rod as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span> Line
                        <ul class="sub-list-mobile hidden">
                           @foreach($line as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>Lure
                        <ul class="sub-list-mobile hidden">
                           @foreach($lure as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>Accessories
                        <ul class="sub-list-mobile hidden">
                           @foreach($accessories as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>Terminal Tackle
                        <ul class="sub-list-mobile hidden">
                           @foreach($terminal as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>Spare Parts
                        <ul class="sub-list-mobile hidden">
                           @foreach($spare as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>Brands
                        <ul class="sub-list-mobile hidden">
                           @foreach( $brands as  $brand)
                           <li><a href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span>New Arrivals
                        <ul class="sub-list-mobile hidden">
                           @foreach(  $category as $cate)
                           <li><a href="{{url('new-arrivals/'.$cate->slug)}}">{{$cate->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item sub-categories">
                        <span class="arrow-mobilemenu">▼</span><a style="color:black;" href="{{url('fishing-reports-create')}}">Fishing Reports</a>
                        <!-- <li><a href="{{url('fishing-reports-create')}}"></a></li> -->
                     </li>
                  </ul>
                  <button id="close-btn">&times;</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="header" id="myHeader">
      <div class="container">
         <div class="row">
            <div class="col-md-2">
               <div class="logo">
                  <a href="{{ url('/') }}"> <img src="{{URL::to('/')}}/front-end/images/home/logoone.png" alt=""></a>
               </div>
            </div>
            <div class="col-md-10">
               <nav class="navbar">
                  <ul class="navlist">
                     <li class="nav-item">
                        <a href="{{url('category-products/reels')}}" class="nav-link">REELS</a>
                        <ul class="dropdown-list">
                           @foreach($reels as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/rod')}}" class="nav-link">ROD</a>
                        <ul class="dropdown-list">
                           @foreach($rod as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/line')}}" class="nav-link">LINE</a>
                        <ul class="dropdown-list">
                           @foreach($line as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/lure')}}" class="nav-link">LURE</a>
                        <ul class="dropdown-list">
                           @foreach($lure as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/accessories')}}" class="nav-link">ACCESSORIES</a>
                        <ul class="dropdown-list">
                           @foreach($accessories as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/terminal-tackle')}}" class="nav-link">TERMINAL TACKLE</a>
                        <ul class="dropdown-list">
                           @foreach($terminal as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/apparel')}}" class="nav-link">APPAREL</a>
                        <ul class="dropdown-list">
                           @foreach($apparel as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">BRAND</a>
                        <ul class="dropdown-list">
                           @foreach( $brands as  $brand)
                           <li><a href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('new-arrivals')}}" class="nav-link">NEW ARRIVALS</a>
                        <ul class="dropdown-list">
                           @foreach(  $category as $cate)
                           <li><a href="{{url('new-arrivals/'.$cate->slug)}}">{{$cate->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('category-products/spare-parts')}}" class="nav-link">SPARE PARTS</a>
                        <ul class="dropdown-list">
                           @foreach($spare as $categories)
                           <li><a href="{{url('sub-category-products/'.$categories->slug)}}">{{$categories->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{url('fishing-reports-create')}}" class="nav-link">Fishing Reports</a>
                  </ul>
                  </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>