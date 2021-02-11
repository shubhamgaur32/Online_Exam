@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Exam</li>
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
                <form action="{{ url('admin/editExamSub')}}" class="databaseOperation"> 
                <div class="row">
                    <div class="col-sm-12">
                    <div class="from-group">
                        <label>Enter Title</label>
                        {{ csrf_field()}}
                        <input type="hidden" name="id" value="{{ $exam->id }}">
                        <input type="text" name="title" value="{{ $exam->title}}" required="required" placeholder="Enter Title" class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="from-group">
                        <label>Select Exam Date</label>
                        <input type="date" name="exam_date" value="{{ $exam->exam_date}}" required="exam_date"  class="form-control">
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="from-group">
                        <label>Select Exam Category</label>
                        <select class="form-control" name="category" required="required">
                            <option value="">Select</option>
                            @foreach($category as $cat)
                            <option <?php if($exam->category==$cat['id']) { echo "selected"; } ?> value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                            @endforeach
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
          </div>
        </div>
      </div>
    </section>
    </div>
    @endsection