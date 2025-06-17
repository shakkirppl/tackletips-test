@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Attributes & Amount</h1>

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
                
                <div class="card">
                    <div class="card-body">
                       

<span class="icons_head"><a href="{{url('/add-attr-amnt')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-attr-amnt')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> 
                       
<h5>Attributes & Amount List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        <th width="10%">Id</th>
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Attribute Name</th>
                                        <th width="10%">Attribute Value</th> 
                                        <th width="5%">Image</th>
                                        <th width="10%">Price</th> 
                                        <th width="15%">Stock</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                <?php $i='0'; ?>
                                    @foreach($attr_amnt as $attr_amnt)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$attr_amnt->product_name}}</td>
                                        <td>
                                        <?php 
                                        $atr = $attr_amnt->attrbute_type;
                                        if ($atr=="") {
                                            echo "Not Specified";
                                        }else{
                                             
                                        $attr_name = DB::table('attributes')
                                            ->where('attribute_id','=',$attr_amnt->attrbute_type) 
                                            ->get();
                                        ?>
                                        @foreach($attr_name as $attr_name){{$attr_name->attribute_name}}@endforeach
                                      <?php  }
                                        ?>
                                       </td>
                                        <td>
                                            <?php $val = $attr_amnt->attribute_value;
                                            if ($val=="") {
                                                echo "Not Specified";
                                            }else{

                                                $attr_val = DB::table('attributes_value')
                                                    ->where('attribute_value','=',$attr_amnt->attribute_value) 
                                                    ->get();
                                            ?>
                                            @foreach($attr_val as $attr_val){{$attr_val->attribute_value}}@endforeach
                                          <?php  }
                                            ?>
                                            
                                        </td>
                                    <td>
                                        <?php
                                        $img = $attr_amnt->attribute_image;
                                        if ($img=="") { 
                                            echo "Not Extra Images";
                                        }else{ ?>

                                        <img src="{{url('/uploads/product/thumb_images/'.$attr_amnt->attribute_image) }}" alt="" width="100px" height="100px">
                                        <?php   }
                                        ?>
                                        

                                    </td>

                                    <td>
                                        <?php
                                        $price = $attr_amnt->attribute_price;
                                        if ($price=="") { 
                                            echo "Not Specified";
                                        }else{ ?>
                                            ${{$attr_amnt->attribute_price}}
                                     <?php   }
                                        ?>
                                        
                                    </td>
                                        <td>
                                        <?php
                                        $stock = $attr_amnt->available_qty;
                                        if ($stock=='0') { ?>
                                            <h5 style="color: red;">Out Of Stock</h5>
                                        <?php  }else{ ?>

                                                    {{$attr_amnt->available_qty}}

                                        <?php     }
                                        ?>
                                        </td>

                                        <td>
                                    
                                        <a href="{{url('edit-attramnt/'.$attr_amnt->products_attributes_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a href="{{url('delete-attramnt/'.$attr_amnt->products_attributes_id) }}"  onclick="return confirm('Are you sure you want to delete');" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a></td>
                                    </tr>
                                    @endforeach

                                   
                                </tbody>
                            </table>
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