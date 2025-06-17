@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')





<!-- content -->
                <header class="content__title">
                    <h1>Advertisment</h1>

                    <div class="actions">
                     <p>STORE</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

<span class="icons_head">
<a href="{{url('add-advertisment')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>                        
</span><br>
                       
<h5>Advertisment List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th></th>
                                        <th width="20%">Advertisment Page</th>
                                        <th width="30%">Image</th>
                                        <th width="20%">Created Date</th>                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>

                                    <tr>
                                        <?php $i="0"; ?>
                                       @foreach($advertisment as $advertisment)
                                       <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $advertisment->page}}</td>
                                        <td><img src="{{url('/uploads/ads/'.$advertisment->image) }}" alt="" width="200px" ></td>
                                        <td>{{ $advertisment->created_at}}</td>

                                        <td>
                                        <a href="{{url('delete-adds/'.$advertisment->add_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>
                                       </td>
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