<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <h1>Log In</h1>
  <form>
    <div class="row">
      <div class="col-sm-12">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-3">
        <input type="submit" value="Log In">
      </div>
    </div>
  </form>
</div>


<script>
     $(function () {

       $('form').on('submit', function (e) {
         e.preventDefault();
         $.ajax({
           type: 'post',
           url: 'loginuser.php',
           data: $(this).serialize(),
           success: function (data) {
             console.log(data);
             // data = json_decode(data);
             if(data == false){
                alert('invalid email or password');
              }else{
               // alert(data);
               alert("Log In Successful");
               window.location.href = "./groups.php?user_id="+data;
             }

           }
         });

       });

     });
</script>
