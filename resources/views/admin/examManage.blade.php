@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Exams</li>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Exam Dates</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($exams as $key => $exam)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $exam['title']}}</td>
                            <td>{{ $exam['cat_name']}}</td>
                            <td>{{ $exam['exam_date']}}</td>
                            <td><input type="checkbox" class="examStatus" data-id="{{ $exam['id'] }}" <?php if($exam['status']==1) { echo "checked"; }  ?> name="status"></td>
                            <td>
                                <a href="{{ url('admin/editExam/'.$exam['id']) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('admin/deleteExam/'.$exam['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ url('admin/addQuestions/'.$exam['id']) }}" class="btn btn-primary btn-sm">Add Questions</a>
                            </td>
                        </tr>
                       @endforeach;
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Exam Dates</th>
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
            <h4 class="modal-title">Add New Exam</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="{{ url('admin/addNewExam')}}" class="databaseOperation"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Title</label>
                    {{ csrf_field()}}
                    <input type="text" name="title" required="required" placeholder="Enter Title" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Select Exam Date</label>
                    <input type="date" name="exam_date" required="required"  class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Select Exam Category</label>
                    <select class="form-control" name="category" required="required">
                        <option value="">Select</option>
                        @foreach($category as $cat)
                        <option value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                        @endforeach
                    </select>
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