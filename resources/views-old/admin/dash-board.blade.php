@extends('layouts.admin-layout')


@section('style')
   <!-- Vendor styles -->
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">

@endsection



@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Admin Dashboard</h1>
                    <small>Welcome to  Store - Dashboard Panel!</small>

                    <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                <a href="#" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-blue">
                            <div class="quick-stats__info">
                                <h2>{{ $orders }}</h2>
                                <small>TOTAL ORDERS</small>
                            </div>

                            <div class="quick-stats__chart sparkline-bar-stats">6,4,8,6,5,6,7,8,3,5,9,5</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-amber">
                            <div class="quick-stats__info">
                                <h2>{{$purchase}}</h2>
                                <small>TOTAL SALES</small>
                            </div>

                            <div class="quick-stats__chart sparkline-bar-stats">4,7,6,2,5,3,8,6,6,4,8,6</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-purple">
                            <div class="quick-stats__info">
                                <h2>{{$customers}}</h2>
                                <small>TOTAL CUSTOMERS</small>
                            </div>

                            <div class="quick-stats__chart sparkline-bar-stats">9,4,6,5,6,4,5,7,9,3,6,5</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-red">
                            <div class="quick-stats__info">
                                <h2>{{$products}}</h2>
                                <small>PRODUCTS</small>
                            </div>

                            <div class="quick-stats__chart sparkline-bar-stats">5,6,3,9,7,5,4,6,5,6,4,9</div>
                        </div>
                    </div>
                 
           
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                 
                              <center>
         
            </center>
       
       
                            </div>
                        </div>
                    </div>
            </div>
              

                <div data-columns>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Registrations</h4>
                            <h6 class="card-subtitle">Checkout recently registered customers</h6>
                        </div>

                        <div class="listview listview--hover">
                            
                            @foreach($recent_reg as $recent_reg)
                            <a class="listview__item">
                                <img src="{{url('assets/demo/img/profile-pics/2.jpg')}}" class="listview__img" alt="">

                              
                                <div class="listview__content">
                                     
                                    <div class="listview__heading">{{ $recent_reg->customer_name }}</div>
                                    <p>Created an account recently.</p>

                                </div>
                                
                            </a>
                             @endforeach

                            <a href="{{ url('/ad_customers')}}" class="view-more">View All Users</a>
                        </div>
                    </div>


                    <!--<div class="card widget-calendar">-->
                    <!--    <div class="widget-calendar__header">-->
                    <!--        <div class="widget-calendar__year"></div>-->
                    <!--        <div class="widget-calendar__day"></div>-->

                            <!--<div class="actions actions--inverse">-->
                            <!--    <a href="{{url('/calender')}}" class="actions__item"><i class="zmdi zmdi-refresh-alt"></i></a>-->
                            <!--    <a href="{{url('/calender')}}" class="actions__item"><i class="zmdi zmdi-plus"></i></a>-->
                            <!--</div>-->
                    <!--    </div>-->

                    <!--    <div class="widget-calendar__body"></div>-->
                    <!--</div>-->

                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Orders</h4>
                        <h6 class="card-subtitle">Latest customer orders is listed here</h6>
                       
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Number</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($latest_orders as $latest_orders)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $latest_orders->order_number }}</td>
                                <td>{{ $latest_orders->customer_name }}</td>
                                <td>{{ $latest_orders->created_at }}</td>
                                <td>
                                    <a href="{{url('view-order-list/'.$latest_orders->order_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                </td>

                            </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
 <div class="card widget-contacts">
                        <div class="card-body">
                            <h4 class="card-title">Contact Information</h4>

                            <ul class="icon-list">
                                <li><i class="zmdi zmdi-phone"></i> Phone:  +0000000000, 

                                                                +0000000</li>
                                <li><i class="zmdi zmdi-email"></i> </li>  
                                <li><i class="zmdi zmdi-pin"></i>
                                    <address>
                                       
                                    </address>
                                </li>
                            </ul>
                        </div>

                        <a class="widget-contacts__map" href="#">
                            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1781287.9077480363!2d46.414478775959395!3d29.30938918651801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2sKuwait!5e0!3m2!1sen!2sin!4v1540876361786" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                           
                        </a>
                    </div>

                   



                 
                </div>
@endsection

@section('script')

        <!-- Vendors -->
        <script src="{{url('assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>

        <script src="{{url('assets/vendors/bower_components/Flot/jquery.flot.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/Flot/jquery.flot.resize.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/flot.curvedlines/curvedLines.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jqvmap/dist/jquery.vmap.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/salvattore/dist/salvattore.min.js')}}"></script>
        <script src="{{url('assets/vendors/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

        <!-- Charts and maps-->
        <script src="{{url('assets/demo/js/flot-charts/curved-line.js')}}"></script>
        <script src="{{url('assets/demo/js/flot-charts/dynamic.js')}}"></script>
        <script src="{{url('assets/demo/js/flot-charts/line.js')}}"></script>
        <script src="{{url('assets/demo/js/flot-charts/chart-tooltips.js')}}"></script>
        <script src="{{url('assets/demo/js/other-charts.js')}}"></script>
        <script src="{{url('assets/demo/js/jqvmap.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>

@endsection
