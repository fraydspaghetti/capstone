$(document).ready(function(){
$('#forget').on('click',function(){
    console.log('tae');
});

$('#login-user').submit(function(event) {
    event.preventDefault();
    var formdata = $(this).serialize();
  
    $.ajax({
      url: 'includes/user-function.php',
      type: 'post',
      data: formdata,
      dataType: 'json',
      success: function(response) {
        if (response.correct === 'loginsuccess') {
          console.log('saktuh');
        }else{
          console.log('wala');
        }
      },
      error: function(xhr, status, error) {
        console.log(error); // Log any errors that occur during the AJAX request
      }
    });
  });


});