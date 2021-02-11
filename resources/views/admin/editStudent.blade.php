@extends('layouts.app')
@section('title','Manage Students')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Students</li>
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
                    
                </div>
              </div>
              <div class="card-body">
                <form action="{{ url('admin/editStudentFinal')}}" class="databaseOperation"> 
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter Name</label>
                            {{ csrf_field()}}
                            <input type="hidden" name="id" value="{{ $students->id}}">
                            <input type="text" value="{{ $students->name }}" name="name" required="required" placeholder="Enter Name" class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter E-Mail</label>
                            <input type="email" value="{{ $students->email }}" name="email" required="required" placeholder="Enter E-Mail" class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter Mobile No.</label>
                            <input type="text" value="{{ $students->mobile_no }}" name="mobile_no" required="required" placeholder="Enter Mobile No." class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Select DOB</label>
                            <input type="date" value="{{ $students->dob }}" name="dob" required="required"  class="form-control">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Select Exam</label>
                            <select class="form-control" name="exam" required="required">
                                <option value="">Select</option>
                                @foreach($exams as $exam)
                                <option <?php if($students->exam==$exam['id']) { echo "selected"; } ?> value="{{ $exam['id'] }}">{{ $exam['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter Password</label>
                            {{ csrf_field()}}
                            <input type="password" name="password" required="required" placeholder="Enter Password" class="form-control">
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