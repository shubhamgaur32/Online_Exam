$(document).on('submit','.databaseOperation',function(){
  var url = $(this).attr('action');
  var data = $(this).serialize();
  $.post(url,data,function(fb){
      var resp=$.parseJSON(fb);
      if(resp.status=='true')
      {
          alert(resp.message);
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


$(document).on('click','.categoryStatus',function()
{
    var id=$(this).attr('data-id');
    $.get(BASE_URL+'/admin/categoryStatus/'+id,function(fb){
        alert('Status Successfully Changed');
    })
});

$(document).on('click','.examStatus',function()
{
    var id=$(this).attr('data-id');
    $.get(BASE_URL+'/admin/examStatus/'+id,function(fb){
        alert('Status Successfully Changed');
    })
});

$(document).on('click','.studentStatus',function(){
    var id=$(this).attr('data-id');
    $.get(BASE_URL+'/admin/studentStatus/'+id,function(fb){
        alert('Status Successfully Changed');
    })
});

$(document).on('click','.portalStatus',function(){
    var id=$(this).attr('data-id');
    $.get(BASE_URL+'/admin/portalStatus/'+id,function(fb){
        alert('Status Successfully Changed');
    })
});

$(document).on('click','.questionStatus',function(){
    var id=$(this).attr('data-id');
    $.get(BASE_URL+'/admin/questionStatus/'+id,function(fb){
        alert('Status Successfully Changed');
    })
});