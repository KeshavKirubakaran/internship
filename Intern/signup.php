<?php
// Create connection
$con = mysqli_connect("localhost","root","shuttle","testReg");



if (isset($_POST['submit'])) {
  // receive all input values from the form
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['1email']; 
  $password = $_POST['pwds'];
  $phone = $_POST['phone']; 
  $experience = $_POST['experience'];
  $pskill = $_POST['primaryskill'];
  $sskill = $_POST['secondaryskill'];
  $cctc = $_POST['currentctc'];
  $ectc = $_POST['expectedctc'];
  $rfc = $_POST['reasonfc'];
  $np = $_POST['noticep'];
  $ifyes = $_POST['ifYes'];
  $cl = $_POST['clocation'];
  $pl = $_POST['plocation'];
  $proof = $_POST['documents'];

 // $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
 // $result = mysqli_query($db, $user_check_query);
 // $user = mysqli_fetch_assoc($result);
  
 /* if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }*/

  // Finally, register user if there are no errors in the form
 // if (count($errors) == 0) {
   //encrypt the password before saving in the database

    $query = "INSERT INTO `registerData`(`firstname`, `lastname`, `phone`, `mail`, `password`, `experience`, `primaryskill`, `secondaryskill`, `currentctc`, `expectedctc`, `reasonforchange`, `noticeperiod`, `offersinhand`, `currentlocation`, `previouslocation`, `document`) VALUES ('$firstname', '$lastname', '$phone', '$email', '$password', '$experience', '$pskill', '$sskill', '$cctc', '$ectc', '$rfc', '$np', '$ifyes', '$cl', '$pl', '$proof')";
    if (mysqli_query($con, $query)) {
    //  $con->query($query) === TRUE
    //echo "New record created successfully";
    
    header('location: login.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
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
<title>Registration</title>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<style type="text/css">
 body {
    background-image: url(bg4.png);
    background-size: 100% 100%;
   
    color: white;
 }
#submit {
    display: none;
}
#ifYesNo {
    display: none;
}
#main-div {
    margin-top: +3em; /*set to a negative number 1/2 of your height*/
  
}
#edu-div {
  
  
}
</style>
<script type="text/javascript">
    document.write(document.getElementById("phone"))
    function validation() {
    var regPass = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/;
    if(document.getElementById("pwd").value.match(regPass)){
      alert("Enter password in correct form");
    
     }
    }


  function emailId(){
    var regEmail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
    if(regEmail.test(document.getElementById("email").value) == false)
    {
    alert("Enter Correct Email");
    document.getElementById("email").innerHTML  = "";
    }
  }


  function lastName(){
    var regFn = /^(?!.*([A-Za-z])\1{2})[A-Za-z]+$/;
    if(document.getElementById("ln").value.match(regFn)){
        if(document.getElementById("ln").value == document.getElementById("fn").value)
      alert("First name and Last name should not be the same");
    document.getElementById("fn").innerHTML  = "";
    }
     else {
        alert("Enter Correct Details : Last Name");
      }
  }


  function firstName(){
    var regFn = /^(?!.*([A-Za-z])\1{2})[A-Za-z]+$/;
     if(!document.getElementById("fn").value.match(regFn)){
      alert("Enter Correct Details : First Name");
    document.getElementById("fn").innerHTML  = "";
    }
  }


  function checkDocument(){
    if (document.getElementById('r1').checked) {
           var regAadhar = /^\d{4}\s\d{4}\s\d{4}$/;
           if(regAadhar.test(document.getElementById("document1").value) == false){
            alert("Enter in Correct form\nxxxx xxxx xxxx");
            document.getElementById("document1").value = "";
           }
       }
       if (document.getElementById('r2').checked) {
           var regPan = /[A-Za-z]{5}\d{4}[A-Za-z]{1}/;
           if(regPan.test(document.getElementById("document1").value) == false){
            alert("Enter in Correct form");
            document.getElementById("document1").value = "";
           }
       }
       if (document.getElementById('r3').checked) {
           var regPassport = /[A-Z]{1}\d{2}\s\d{5}/;
           if(regPassport.test(document.getElementById("document1").value) == false){
              alert("Enter Passport number in Correct form");
            document.getElementById("document1").value = "";           }
       }
      
  }


  function showYes(){
    var y = document.getElementById("ifYesNo");
    y.style.display = "block";
  }


  function showNo(){
    var y = document.getElementById("ifYesNo");
    y.style.display = "none";
  }


    function call(){
     var kcyear = document.getElementsByName("year")[0],
     kcmonth = document.getElementsByName("month")[0],
     kcday = document.getElementsByName("day")[0];
       var d = new Date();
       var n = d.getFullYear();
     for (var i = n; i >= 1950; i--) {
       var opt = new Option();
      opt.value = opt.text = i;
      kcyear.add(opt);
       }
      kcyear.addEventListener("change", validate_date);
       kcmonth.addEventListener("change", validate_date);

      function validate_date() {
      var y = +kcyear.value, m = kcmonth.value, d = kcday.value;
       if (m === "2")
     var mlength = 28 + (!(y & 3) && ((y % 100) !== 0 || !(y & 15)));
 else var mlength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m - 1];
 kcday.length = 0;
 for (var i = 1; i <= mlength; i++) {
     var opt = new Option();
     opt.value = opt.text = i;
     if (i == d) opt.selected = true;
     kcday.add(opt);
 }
     }
   // validate_date();
  }
    function showButton() {
    var y = document.getElementById("submit");
    if(y.style.display == "block"){
        y.style.display = "none";
    }
    else{
        y.style.display = "block";
    }

    }

    window.onload = function() {
   MaskedInput({
      elm: document.getElementById('phone'), // select only by id
      format: '+91 ____-__-____',
      separator: '+91 -'
   });
  
};

(function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));

    

    
    
 
</script>
</head>
<body>
    
    <div class="container jumbotron col-md-6" style="background: rgba(40, 43, 40, 0.4);" id="main-div">
        <form method="POST" id="reg_form">
            <legend> <center>Registration Form </center> </legend><br>
             <div class="row">
             <div class="form-group col-md-6">
              <label for="firstname">First Name</label>  <a href="#" data-toggle="tooltip" data-placement="right" title="A character should not be repeated more than 3 times."><img src="tooltip.png" width="15px" height="15px"></a>  
              <input type="text" class="form-control" id="fn" onblur="firstName()" required="required" name="firstname" >
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Last Name</label>  <a href="#" data-toggle="tooltip" data-placement="right" title="Should not be same as firstname."><img src="tooltip.png" width="15px" height="15px"></a> 
              <input type="text" class="form-control" id="ln" onblur="lastName()" required="required" name="lastname">
            </div>
            </div>
            <div class="form-group">
              <label for="dob">DOB</label> <br>
              <div class="row-col">Month : <select class="jumbotron"  name="month" onchange="call()" >
               <option value="">select</option>
               <option value="1">Jan</option>
               <option value="2">Feb</option>
               <option value="3">Mar</option>
                <option value="4">Apr</option>
               <option value="5">May</option>
               <option value="6">Jun</option>
               <option value="7">Jul</option>
                <option value="8">Aug</option>
               <option value="9">Sep</option>
               <option value="10">Oct</option>
               <option value="11">Nov</option>
              <option value="12">Dec</option>
              </select >
                  Year: <select class="jumbotron" name="year" onchange="call()">
              <option value="">select</option>
             </select>
              Day : <select class="jumbotron" name="day" >
             <option value="">select</option>
            </select>
               </div>
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <div class="row container">
              <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio2"> MALE</label>
              </div>
              <div class="radio col-4">
                 <label>
                    <input type="radio" name="optradio2"> FEMALE</label>
              </div>
              <div class="radio col-5">
                 <label>
                    <input type="radio" name="optradio2"> TRANSGENDER</label>
              </div>
          </div>
            </div>
            <div class="form-group">
           <label for="phonenumber">Phone Number</label>
           <input id="phone" type="text" class="form-control" name="phone"  pattern="^\+91(\s+)?[0-9]{4}-?[0-9]{2}-?[0-9]{4}$" required>
            </div>
            <div class="form-group">
              <label for="emailid">Email ID</label>  <a href="#" data-toggle="tooltip" data-placement="right" title="Format - adbd@asd.com"><img src="tooltip.png" width="15px" height="15px"></a> 
              <input type="text" class="form-control" id="email" onblur="emailId()" required="required" name="1email">
            </div>
            
            <div class="form-group">
              <label for="pwd">Password</label>  <a href="#" data-toggle="tooltip" data-placement="right" title="1 capital letter, 1 digit and 1 special character. Legnth minimum 8 characters"><img src="tooltip.png" width="15px" height="15px"></a> 
              <input type="password" class="form-control" id="pwd" name="pwds" onblur="validation()" required="required">
            </div>
            
            <div class="form-group" >
              <div id="edu-div">
              <label for="eduqual">Educational Qualification<span style="font-size: 10px;">(max level completed)</span></label>
                 
                   <select class="form-control" id="edulevel">
                     <option>Schooling</option>
                     <option>Ug</option>
                     <option>Pg</option>
                   </select><br>
                   <div class="row">
                    <div class="col-6">
                 <label>Year of passing:</label>
                  <input type="text" class="form-control" id="Eduqual" required="required"></div>
                  <div class="col-6">
                 <label>Percentage</label>
                 <input type="number" step="0.1" class="form-control" id="Eduqual" required="required"></div>
                 </div>
              </div>
              <br>
            
            <div class="form-group">
              <label for="exp">Experience <span style="font-size: 10px;">(in years)</span></label>
              <input type="number" min="0.0" step="0.1" class="form-control" id="exp" name="experience" placeholder="0.0 yrs" required="required">
            </div>
            <div class="form-group">
              <label for="pskill">Primary Skil</label>
              <textarea class="form-control" rows="2" name="primaryskill" id="pskill"></textarea>
            </div>
            <div class="form-group">
              <label for="sskill">Secondary Skill</label>
              <textarea class="form-control" rows="2" name="secondaryskill" id="sskill"></textarea>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
              <label for="cctc">Current ctc</label>
              <input type="number" min="0.0" step="0.1" class="form-control" name="currentctc" id="cctc" placeholder="decimal" required="required">
            </div>
            <div class="form-group col-md-6">
              <label for="ectc">Expected ctc</label>
              <input type="number" min="0.0" step="0.1" class="form-control" name="expectedctc" id="ectc"  placeholder="decimal" required="required">
            </div>
        </div>
            <div class="form-group">
              <label for="rfc">Reason for change</label>
              <textarea class="form-control" rows="3" name="reasonfc" id="rfc"></textarea>
            </div>
            <div class="form-group">
              <label for="np">Notice Period</label>
              <input type="number" class="form-control" name="noticep" id="np" placeholder="in days" required="required">
            </div>
            <div class="form-group">
              <label for="arusn">are you serving notice</label>
              <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio1" onclick="showYes()"> YES</label>
              </div>
              <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio1" onclick="showNo()"> NO</label>
              </div>
            </div>
            <div class="form-group" id="ifYesNo">
              <label for="ifyes">if yes, What are the offers in hand</label>
               <textarea class="form-control" rows="3" name="ifYes" id="ifyes"></textarea>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
              <label for="cl">Current Location</label>
              <input type="text" class="form-control" name="clocation" id="cl">
            </div>
            <div class="form-group col-md-6">
              <label for="pl">Preferred Location</label>
              <input type="text" class="form-control" name="plocation" id="pl">
            </div>
             </div>
            <div class="form-group">
              <label for="document">Pan/Aadhar/Passport</label>  <a href="#" data-toggle="tooltip" data-placement="right" title="Aadhar - xxxx xxxx xxxx . Pan - xxxxx0000x . Passport - X00 00000 ."><img src="tooltip.png" width="15px" height="15px"></a> 
              <div class="row">
               <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio" id="r1" value="aadhar"> Aadhar</label>
              </div>
              <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio" id="r2" value="pan"> Pan Card</label>
              </div>
              <div class="radio col-3">
                 <label>
                    <input type="radio" name="optradio" id="r3" value="passport"> Passport</label>
              </div>
          </div>
              <input type="text" class="form-control" id="document1" name="documents" onblur="checkDocument()" required="required">
            </div>
            <div class="form-check">
              <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="agree" onclick="showButton()"> Agree to terms and conditions
              </label>
            </div><br>
            <center>
            <button type="submit" class="btn btn-info" id="submit" name="submit">Submit</button>
            </center>
        </form>
    
</div>

</body>
</html>