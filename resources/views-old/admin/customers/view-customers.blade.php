@extends('layouts.admin-layout')

@section('style')
  




@endsection

@section('content')

<style type="text/css">
    
#editor {
    max-height: 250px;
    height: 250px;
    background-color: white;
    border-collapse: separate; 
    border: 1px solid rgb(204, 204, 204); 
    padding: 4px; 
    box-sizing: content-box; 
    -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
    box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
    border-top-right-radius: 3px; border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; border-top-left-radius: 3px;
    overflow: scroll;
    outline: none;
}
#voiceBtn {
  width: 20px;
  color: transparent;
  background-color: transparent;
  transform: scale(2.0, 2.0);
  -webkit-transform: scale(2.0, 2.0);
  -moz-transform: scale(2.0, 2.0);
  border: transparent;
  cursor: pointer;
  box-shadow: none;
  -webkit-box-shadow: none;
}

div[data-role="editor-toolbar"] {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.dropdown-menu a {
  cursor: pointer;
}

    
</style>


<!-- content -->
 <div class="content__inner">
                    <header class="content__title">
                       
<h1>View Customers</h1>
                        <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                       
                    </div>

                   
  

                    </header>

                   

  <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customer  Details</h4>
                         @foreach($view_cust as $view_cust)
                        
                        <table class="table table-dark mb-0">
                            
                            <tbody>
                            <tr>
                                <th scope="row">Customer Name</th>
                                <td>{{ $view_cust->customer_name}}</td>
                                
                            </tr>
                            
                            <tr>
                              <th scope="row">Customer Email</th>
                               <td>
                              <?php if (!$view_cust->customer_email) {
                                    echo "Not Specified";
                                } ?>
                             
                             
                             {{ $view_cust->customer_email}}</td>
                            
                                
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td>
                                <?php if (!$view_cust->customer_mobile) {
                                    echo "Not Specified";
                                } ?>
                                {{ $view_cust->customer_mobile}}</td>
                                
                            </tr>
                             <tr>
                                <th scope="row">Address</th>
                                <td><?php if (!$view_cust->customer_address) {
                                    echo "Not Specified";

                                } ?>{{ $view_cust->customer_address}}</td>
                                
                            </tr>
                            
                            <tr>
                                <th scope="row">City</th>
                                <td><?php if (!$view_cust->customer_dist) {
                                    echo "Not Specified";
                                } ?>{{ $view_cust->customer_dist}}</td>
                                
                            </tr>

                             
                             <tr>
                                <th scope="row">Pin Number</th>
                                <td><?php if (!$view_cust->customer_pincode) {
                                    echo "Not Specified";
                                } ?>{{ $view_cust->customer_pincode}}</td>
                                
                            </tr>
                          
                           
                             
                            </tbody>
                        </table>
                        @endforeach
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

        <script src="{{url('assets/vendors/bower_components/autosize/dist/autosize.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap-wysiwyg.js')}}"></script>

@endsection