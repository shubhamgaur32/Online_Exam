@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Title</h3>

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
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($category as $key => $cat)
                         <tr>
                             <td><?php echo $key+1 ?></td>
                             <td><?php echo $cat['name'] ?></td>
                             <td><input class="categoryStatus" data-id="<?php echo $cat['id'] ?>"<?php if($cat['status']==1) { echo "checked"; }  ?> type="checkbox" name="status"></td>
                             <td>
                                 <a href="{{ url('admin/editCategory/'.$cat['id'])}}" class="btn btn-info">Edit</a>
                                 <a href="{{ url('admin/deleteCategory/'.$cat['id'])}}" class="btn btn-danger">Delete</a>
                             </td>
                         </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
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
            <h4 class="modal-title">Add New Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="{{ url('admin/addNewCategory')}}" class="databaseOperation"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Category Name</label>
                    {{ csrf_field()}}
                    <input type="text" name="name" required="required" placeholder="Enter Category Name" class="form-control">
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