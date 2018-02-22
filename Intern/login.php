<?php

$con = mysqli_connect("localhost","root","shuttle","testReg");

if (isset($_POST['submit'])) {
  // receive all input values from the form
 
  $email = $_POST['email'];
  $password = $_POST['password'];
   
    $query = "SELECT password, mail FROM registerData where mail = '$email' ";
     $result = mysqli_query($con, $query);
     $users = mysqli_fetch_row($result);
    if(!$users){
      echo '<script language="javascript">';
        echo 'alert("No user found")';
        echo '</script>';
    }
    else{
       if ($users[0] === $password) {
      
      $_SESSION["username"] = $users[1];
      header('location: home.php');
      exit();
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Wrong Password")';
        echo '</script>';
       }
     }
  //}
}


?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<title>Login</title>
<style type="text/css">
 body {
    background-image: url(bg4.png);
    background-size: 100% 100%;
    color: white;
 }
 #div-main {
     position:fixed;
    top: 50%;
    left: 50%;

    width:30em;
    height:23em;
    margin-top: -10em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em;
 }
</style>
<script type="text/javascript">
    function noBack() { window.history.forward(); }
    noBack();
    window.onload = noBack;
    window.onpageshow = function (evt) { if (evt.persisted) noBack(); }
    window.onunload = function () { void (0); }
</script>
<script type="text/javascript">


  function emailId(){
    var regEmail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
    if(regEmail.test(document.getElementById("fn").value) == false)
    {
    alert("Enter Correct Email");
    document.getElementById("email").innerHTML  = "";
    }
  }

  function validation() {
    var regPass = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/;
    if(document.getElementById("ln").value.match(regPass)){
      alert("Enter password in correct form");
    
     }
    }
</script>
</head>
<body>
	
	<div class="container jumbotron col-md-5" style="background: rgba(40, 43, 40, 0.4);" id="div-main">
		<form method="POST">
            <legend> <center>Login </center> </legend>
             <div class="form-group">
              <label for="email">Email Id</label>
              <input type="email" class="form-control" name="email" id="fn" onblur="emailId()">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="ln" onblur="validation()">
            </div>
            <center>
            <button type="submit" class="btn btn-info" id="submit" name="submit">Submit</button>
            
        </form>
	</div>
	</center>
</body>
</html>