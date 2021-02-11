<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal - Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    .signUp_container{
    width: 60%;
    height: 450px;
    border: 1px solid;
    border-radius: 35px;
    padding: 35px;
    margin-left: 20%;
    margin-top: 150px;
    margin-bottom: 10%;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="signUp_container">
            <div class="signUp_title">
                <h3 class="text-center">Portal Login</h3>
                <hr>
            </div>
            <form action="{{ url('portal/loginSub') }}" class="databaseOperation">
            <div class="signUp_form">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        {{ csrf_field() }}
                           <label>Enter Email</label>
                           <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                           <label>Enter Password</label>
                           <input type="password" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                          <button class="btn btn-info btn-block">Login</button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                          OR
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p class="text-center"><a class="btn btn-primary " href="{{url('portal/signup')}}">Signup</a></p>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).on('submit','.databaseOperation',function(){
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url,data,function(fb){
        var resp=$.parseJSON(fb);
        if(resp.status=='true')
        {
            //alert(resp.message);
            setTimeout(function(){
                window.location.href=resp.reload;
            },1000);
        }
        else
        {
            alert(resp.message); 
        }
    });
    return false;  
    });
</script>
</html>