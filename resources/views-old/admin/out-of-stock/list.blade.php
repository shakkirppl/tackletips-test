@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Catgeories</h1>

                    <div class="actions">
                       <p>Tackle</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       


                       
<h5>Out of stock products list</h5>
                       
                        <div class="card card--inverse widget-profile">
                        <div class="card-body text-center">
                            

                            <h4 class="card-title mb-0">Categories</h4>

                            <div class="actions actions--inverse">
                                <div class="actions__item">
                                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="widget-profile__list">
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>REELS</strong>
                                   
                                    <?php $cat_id11 = Crypt::encryptString('1'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id11)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>ROD</strong>
                                  
                                    <?php $cat_id12 = Crypt::encryptString('2'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id12)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>LINE</strong>
                                   
                                   <?php $cat_id13 = Crypt::encryptString('3'); ?> <a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id13)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                            
                            <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>LURE</strong>
                                 
                                    <?php $cat_id14 = Crypt::encryptString('4'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id14)}}" style="float:right;">View List</a>
                                </div>
                            </div>

                                  <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>ACCESSORIES</strong>
                                 
                                    <?php $cat_id14 = Crypt::encryptString('5'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id14)}}" style="float:right;">View List</a>
                                </div>
                            </div>

                                  <div class="media">
                                <div class="avatar-char"><i class="zmdi zmdi-flower"></i></div>
                                <div class="media-body">
                                    <strong>TERMINAL TACKLE</strong>
                                 
                                    <?php $cat_id14 = Crypt::encryptString('6'); ?><a class="btn btn-dark" href="{{url('view-out-of-stock-list/'.$cat_id14)}}" style="float:right;">View List</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                       
                       
                       
                    </div>
                </div>
                
                

<!-- content-end -->


 

@endsection

@section('script')

 <!-- Vendors -->
        <script src="{{url('assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>

        <!-- Vendors: Data tables -->
            <script src="{{url('assets/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>

@endsection