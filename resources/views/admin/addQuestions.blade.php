@extends('layouts.app')
@section('title','Exam Questions')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exam Questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam Questions</li>
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
                    <a class="btn btn-info brn-sn" href="javascript:;" data-toggle="modal" data-target="#mymodal">Add New Question</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($questions as $key => $question)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $question['question'] }}</td>
                        <td>{{ $question['answer'] }}</td>
                        <td><input data-id="{{ $question['exam_id'] }}" class="questionStatus"<?php if($question['status']==1) { echo "checked";}?> type="checkbox" name="status"></td>
                        <td>
                            <a href="{{ url('admin/editQuestion/'.$question['exam_id']) }}" class="btn btn-primary">Update</a>
                            <a href="{{ url('admin/deleteQuestion/'.$question['exam_id']) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
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
    <div class="modal-dialog modal-lg">
        <!-- modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add New Question</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="{{ url('admin/addNewQuestion')}}" class="databaseOperation"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Question</label>
                    <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                    {{ csrf_field()}}
                    <input type="text" name="question" required="required" placeholder="Enter Question" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 1</label>
                    <input type="text" name="option_a" required="required" placeholder="Enter Option 1" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 2</label>
                    <input type="text" name="option_b" required="required" placeholder="Enter Option 2" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 3</label>
                    <input type="text" name="option_c" required="required" placeholder="Enter Option 3" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 4</label>
                    <input type="text" name="option_d" required="required" placeholder="Enter Option 4" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="from-group"><br>
                  <select class="form-control" name="answer" id="c_option" required="required">
                    <option value="0">Select Correct Answer</option>
                      <option value="option_a">Option A</option>
                      <option value="option_b">Option B</option>
                      <option value="option_c">Option C</option>
                      <option value="option_d">Option D</option>
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