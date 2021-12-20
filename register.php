<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <h1>Register</h1>
  <form>
    <div class="row">
      <div class="col-sm-12">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" id="name" required>
      </div>
    </div>
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
      <div class="col-sm-12">
        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" id="address" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <label for="number"><b>Phone Number</b></label>
        <input type="number" placeholder="Enter Phone Number" name="number" id="number" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <input type="submit" value="Register">
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
           url: 'registeruser.php',
           data: $(this).serialize(),
           success: function (data) {
             if(data  != null){
               alert(data);
               alert("You have been Registered");
               window.location.href = "./groups.php?user_id="+data;
             }else{
               alert("Email already Exists");
             }

           }
         });

       });

     });
   </script>
