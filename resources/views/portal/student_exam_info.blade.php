@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Exam Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Exam Info</li>
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
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ $exam_info->title }}</h3>
                    </div>
                    <div class="col-sm-6">
                        <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_info->exam_date)) }}</span></h3>
                    </div>
                </div>
                <form action="{{ url('portal/student_exam_info_edit') }}" class="databaseOperation">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="from-group">
                            
                            
                            <label>Enter Name</label>
                            <input type="hidden" name="id" value="{{ $students_info[0]['id'] }}">
                            @csrf
                            <input type="text" name="name" value="{{ $students_info[0]['name'] }}" required="required" placeholder="Name" class="form-control">
                            
                         </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter E-mail</label>
                            <input type="email" name="email" value="{{ $students_info[0]['email'] }}" required="required" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter Mobile No.</label>
                            <input type="text" name="mobile_no" value="{{ $students_info[0]['mobile_no'] }}" required="required" placeholder="Mobile No." class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="from-group">
                            <label>Select DOB</label>
                            <input type="date" name="dob" value="{{ $students_info[0]['dob'] }}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="from-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" required="required" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="from-group"><br>    
                            <button class="btn btn-info">Update</button>
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