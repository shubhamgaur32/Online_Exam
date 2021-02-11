@extends('layouts.app')
@section('title','Edit Portal') 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Portal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Portal</li>
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
              <div class="card-body">
                    <form action="{{ url('admin/editPortalSub')}}" class="databaseOperation"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Enter Name</label>
                                    {{ csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $portal_info->id }}">
                                    <input type="text" name="name" value="{{ $portal_info->name }}" required="required" placeholder="Enter Name" class="form-control">
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Enter E-Mail</label>
                                    <input type="email" name="email" value="{{ $portal_info->email }}" required="required" placeholder="Enter Email" class="form-control">
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Enter Mobile No.</label>
                                    <input type="text" name="mobile_no" value="{{ $portal_info->mobile_no }}" required="required" placeholder="Enter Mobile No." class="form-control">
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="from-group">
                                    <label>Enter Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="from-group"><br>
                                <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    </div>
  @endsection