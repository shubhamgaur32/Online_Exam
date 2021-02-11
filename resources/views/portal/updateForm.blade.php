@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Exam Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Exam Form</li>
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
                  <form action="{{ url('portal/student_exam_info') }}" method="get">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Enter Mobile No.</label>
                              <input type="text" name="mobile_no" required="required" placeholder="Enter Mobile No." class="form-control">
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Select DOB</label>
                              <input type="date" name="dob" required="required" class="form-control">
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Select Exam</label>
                                <select name="exam" required="required" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($exams as $exam)
                                       <option value="{{ $exam['id'] }}">{{ $exam['title'] }}</option> 
                                    @endforeach
                                </select>
                          </div>
                      </div>
                      <div class="com-sm-12">
                          <div class="form-group">
                              <button class="btn btn-info">Search</button>
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