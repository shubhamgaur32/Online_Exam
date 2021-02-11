@extends('layouts.app')
@section('title','Manage Portal') 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Portal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Portal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                 <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button> -->
                    <a class="btn btn-info brn-sn" href="javascript:;" data-toggle="modal" data-target="#mymodal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Mobile No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($portal as $key => $p1)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $p1['name'] }}</td>
                            <td>{{ $p1['email'] }}</td>
                            <td>{{ $p1['mobile_no'] }}</td>
                            <td><input type="checkbox" name="status" data-id="{{ $p1['id'] }}" class="portalStatus" <?php if($p1['status']==1) { echo "checked"; } ?>></td>
                            <td>
                                <a href="{{ url('admin/editPortal/'.$p1['id']) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('admin/deletePortal/'.$p1['id']) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                       @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Mobile No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    </div>
    <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog">
        <!-- modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add New Portal</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="{{ url('admin/addNewPortal')}}" class="databaseOperation"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Name</label>
                    {{ csrf_field()}}
                    <input type="text" name="name" required="required" placeholder="Enter Name" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter E-Mail</label>
                    <input type="email" name="email" required="required" placeholder="Enter Email" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Mobile No.</label>
                    <input type="text" name="mobile_no" required="required" placeholder="Enter Mobile No." class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" required="required" placeholder="Enter Password" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                <div class="from-group"><br>
                  <button class="btn btn-primary">Add</button>
                </div>
              </div>
             </div>
             </form>
            </div>
    </div>
        
    </div>
        </div>
    
    <!-- /.content-header -->

  </div>
  @endsection