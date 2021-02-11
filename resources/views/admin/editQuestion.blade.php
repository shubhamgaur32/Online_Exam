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
              <form action="{{ url('admin/addNewQuestion')}}" class="databaseOperation"> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="from-group">
                    <label>Enter Question</label>
                    <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                    @csrf
                    <input type="text" name="question" value="{{ $question_info->question }}" required="required" placeholder="Enter Question" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 1</label>
                    <input type="text" name="option_a" value="{{ $question_info->option_a }}" required="required" placeholder="Enter Option 1" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 2</label>
                    <input type="text" name="option_b" value="{{ $question_info->option_b }}" required="required" placeholder="Enter Option 2" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 3</label>
                    <input type="text" name="option_c" value="{{ $question_info->option_c}}" required="required" placeholder="Enter Option 3" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="from-group">
                    <label>Enter Option 4</label>
                    <input type="text" name="option_d" value="{{ $question_info->option_d}}" required="required" placeholder="Enter Option 4" class="form-control">
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