@extends('layouts.student')
@section('title','Exams')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
                    <table class="table">
                    <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam Title</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        <td>1</td>
                        <td>{{ $student_info->title }}</td>
                        <td>{{ $student_info->exam_date }}</td>
                        <td><?php  
                            if(strtotime($student_info->exam_date) < strtotime(date('Y-m-d')))
                            {
                                echo "Completed";
                            }
                            else if(strtotime($student_info->exam_date) == strtotime(date('Y-m-d')))
                            {
                                echo "Running"; 
                            }
                            else{
                                echo "Pending";
                            }
                        ?></td>
                        <td><a href="{{ url('student/testData') }}" class="btn btn-info">Result</a></td>
                        <td><a href="{{ url('student/takeTest') }}" class="btn btn-info">Join Exam</a></td>
                       </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Exam Title</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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
  @endsection