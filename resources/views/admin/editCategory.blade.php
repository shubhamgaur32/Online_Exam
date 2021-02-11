@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                <form action="{{ url('admin/editNewCategory')}}" class="databaseOperation"> 
                    <div class="row">
                            <div class="col-sm-12">
                            <div class="from-group">
                                <label>Enter Category Name</label>
                                {{ csrf_field()}}
                                <input type="hidden" name="id" value="{{ $category->id}}">
                                <input type="text" name="name"  value="{{$category->name }}"required="required" placeholder="Enter Category Name" class="form-control">
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