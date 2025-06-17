<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#masters" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Blog </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masters">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('video-gallary')}}"> Video Gallary</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('testimonial')}}"> Testimonial</a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('about-us-images')}}"> About-Us Images</a></li> -->
              <!-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('news-letter')}}"> News Letter</a></li> -->
            </ul>
            </div>
            
     
          </li>

          </li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#product_master" aria-expanded="false" aria-controls="charts">
  <i class="mdi mdi-group menu-icon"></i> 
    <span class="menu-title">Product Master </span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="product_master">
    <ul class="nav flex-column sub-menu">
    <li class="nav-item"> <a class="nav-link" href="{{URL::to('product-index')}}">Products</a></li>
    </ul>
  </div>
  

</li>


<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="charts">
  <i class="mdi mdi-group menu-icon"></i> 
    <span class="menu-title">Customers</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="customer">
    <ul class="nav flex-column sub-menu">
    <li class="nav-item"> <a class="nav-link" href="{{URL::to('customer-index')}}">Customers</a></li>
    </ul>
  </div>
  

</li>
<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#fish-report" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Fishing Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fish-report">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('fishing-reports-pending')}}">Pending</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('fishing-reports-active')}}">Active</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('fishing-reports-blocked')}}">Blocked</a></li>

              </ul>
            </div>
            
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Review </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="review">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-pending')}}">Pending</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-active')}}">Active</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-block')}}">Blocked</a></li>

              </ul>
            </div>
            
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('/order-dashboard')}}">Dashboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('orders-index')}}">Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('orders-tracking')}}"> Order Tracking</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('orders-processing')}}">Processing Orders</a></li>
                
                 </ul>
            </div>
     
          </li>




         
        </ul>
      </nav>