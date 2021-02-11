@extends('layouts.student')
@section('title','Join Exam')
@section('content')

<script type="text/javascript">
    function timeout()
    {
      var hours=Math.floor(timeLeft/3600);
      var minute=Math.floor(timeLeft-(hours*60*60)-30)/60);
      var second=timeLeft%60;
      var hrs=checktime(hours);
      var mint=checktime(minute);
      var sec=checktime(second);
      if(timeLeft<=0)
      {
        clearTimeout(tm);
        document.getElementById("form1").submit();
      }
      else
      {
        document.getElementById("timer").innerHTML=hrs+":"+mint+":"+sec;
      }
      timeLeft--;
      var tm= setTimeout(function() {timeout()}, 1000);
    }
    function checktime(msg)
    {
      if(msg<10)
        {
          msg="0"+msg;
        }
        return msg;
    }
</script>

<style type="text/css">
.question_option
{
    list-style:none;
      
}
.question_box{
    width:40rem;
    min-height:100px;
    border:2px solid;
    padding:10px;
    border-radius:4px;
}
.question_box p{
    font-size:20px;
    text-align:center;
    font-style:bold;
    
    font-weight:70px;
}
.option_box{
    
    width:40rem;
    margin:20px;
    text-align:center;
   
}
.option_box li{
    display:inline-block;
    width:15rem;
    margin:10px;
    padding:5px;
    text-align:center;
    height:50px;
    border:1px solid;
}
.option_box a{
    text-decoration:none;
    font-size: 22px;
}
.test_text{
    width:100%;
    text-align:center;
}
.buttons{
    display:inline-block;
    margin-right:20px;
}

</style>
<body onload="timeout()">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Join Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Join Exam</li>
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
                    <div class="col-sm-4" id="time">
                        <h3></h3>
                    </div>
                    
                    <div class="col-sm-4" id="time">
                    
                        <h3 class="text-centre"></h3>
                        <h1><script type="text/javascript">
                      var timeLeft=2*60;
                    </script><b>Time <span id="timer" style="color: red">0.00</span></b></h1>
                        
                    </div>
                    <div class="col-sm-4">
                        <h3 class="text-right">Status: Pending</h3>
                    </div>
                </div>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body">
              <!--  <div class="row">
                    <div class="col-sm-12 mt-4">
                        <p><b>1.   Questions Description</b></p>
                        <ul class="question_option">
                           <li><input type="radio" name="ans1">  Option 1</li>
                           <li><input type="radio" name="ans1">  Option 2</li>
                           <li><input type="radio" name="ans1">  Option 3</li>
                           <li><input type="radio" name="ans1">  Option 4</li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <p><b>2.   Questions Description</b></p>
                        <ul class="question_option">
                           <li><input type="radio" name="ans1">  Option 1</li>
                           <li><input type="radio" name="ans1">  Option 2</li>
                           <li><input type="radio" name="ans1">  Option 3</li>
                           <li><input type="radio" name="ans1">  Option 4</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <p><b>3.   Questions Description</b></p>
                        <ul class="question_option">
                           <li><input type="radio" name="ans1">  Option 1</li>
                           <li><input type="radio" name="ans1">  Option 2</li>
                           <li><input type="radio" name="ans1">  Option 3</li>
                           <li><input type="radio" name="ans1">  Option 4</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <p><b>4.   Questions Description</b></p>
                        <ul class="question_option">
                           <li><input type="radio" name="ans1">  Option 1</li>
                           <li><input type="radio" name="ans1">  Option 2</li>
                           <li><input type="radio" name="ans1">  Option 3</li>
                           <li><input type="radio" name="ans1">  Option 4</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <p><b>5.   Questions Description</b></p>
                        <ul class="question_option">
                           <li><input type="radio" name="ans1">  Option 1</li>
                           <li><input type="radio" name="ans1">  Option 2</li>
                           <li><input type="radio" name="ans1">  Option 3</li>
                           <li><input type="radio" name="ans1">  Option 4</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-info">Submit</button>
                    </div>
                </div> -->
<?php
    if(!empty($index))
    {
      $i=(int)$index;
      $sc = $score;
    }
    else
    {
      $i=0;
      $sc = 0;
    }

?>
<div class="container">
  <div class="row justify-content-center">
    <div class="test_text">
      <h3>Take Test</h3>
    </div>
      <?php if($i<count($data)){ ?>
      <form action="testData" method="post" id="form1">
        @csrf
          <input type="hidden" name="index" value="{{$i}}">
          <input type="hidden" name="sc" value="{{$sc}}">
          <textarea name="question" id="question" cols="30" rows="2">Question :    {{$data[$i]['question']}}</textarea><br>
          <input type="radio" name="option" id="option_a" value="option_a">{{$data[$i]['option_a']}} <br>
          <input type="radio" name="option" id="option_b" value="option_b">{{$data[$i]['option_b']}} <br>
          <input type="radio" name="option" id="option_c" value="option_c">{{$data[$i]['option_c']}} <br>
          <input type="radio" name="option" id="option_d" value="option_d">{{$data[$i]['option_d']}} <br>
          <input type="submit" name="next">
        </form>
      <?php }?>
      </div>
    </div>
  </div>

</body>
              </div>
              

            </div>

         
          </div>
        </div>
      </div>
    </section>
    </div>
  