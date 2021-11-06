<?php
  include 'DB Connect.php';
  if(isset($_POST['submit'])){
    $query="INSERT INTO `students`(`ID`, `First Name`, `Last Name`,`Email`,`Password`,`Phone`) VALUES ('NULL','".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['phno']."')";
    $run=mysqli_query($conn,$query);
    $query="UPDATE `students` SET `Full Name`=CONCAT(`First Name`,' ',`Last Name`)";
    $run2=mysqli_query($conn,$query);
  }
?>
<html>
    <head>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
       <style type="text/css">
        body{
            background-image: url('https://static.toiimg.com/photo/80507427.cms');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            padding: 20px;
            }
          label{
            color: #ffc312;
          }
          h1{
            text-shadow: 4px 3px #000;
          }    
          .container{
          height: 100%;
          align-content: center;
          }
          .card{
          height: 720px;
          margin-top: auto;
          margin-bottom: auto;
          width: 400px;
          background-color: rgba(0,0,0,0.5) !important;
          }
          .card-header{
            background-color: rgba(0, 0, 0, 0.8)!important;
          }
          .input-group-prepend span{
          width: 40px;
          background-color: #FFC312;
          color: black;
          border:0 !important;
          }
          input:focus{
          outline: 0 0 0 0  !important;
          box-shadow: 0 0 0 0 !important;
          }
         .btn-grad {background-image: linear-gradient(to right, #FF512F 0%, #DD2476  51%, #FF512F  100%)}
         .btn-grad {
            padding: 10px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; 
            color: #fff;
            text-decoration: none;
          }
         
       </style>
    </head>
<body>
  <div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h1 style="color: #ffcc66;">Sign Up!</h1>
      </div>
      <div class="card-body">
            <form id='myform' action="#" method="POST">
              <label for="f_name">First Name</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name" onkeyup="statehandle()">
            </div>
            <label for="l_name">Last Name</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" onkeyup="statehandle()">
            </div>  
            <label for="email">Email Address</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" onkeyup="statehandle()">
            </div>
            <label for="phno">Phone Number</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="form-control" id="phno" name="phno" placeholder="Phone Number" onkeyup="statehandle()">
            </div>
            <label for="password">Password (must be 6 digits long)</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup="statehandle()">
            </div>
            <label for="cpassword">Confirm Password</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" onkeyup="statehandle()">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="checkbox" onclick="enablesubmit(this)">
              <label class="form-check-label" for="checkbox">I accept all the terms and conditions</label>
            </div>
            <button type="submit" class="btn btn-grad btn-block btn-round" name="submit" id="submit" disabled="disabled">Create Account</button>
          </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  const form = document.getElementById('myform');
  const fname = form.elements['f_name'];
  const lname = form.elements['l_name'];
  const pass = form.elements['password'];
  const cpass = form.elements['cpassword'];
  const email = form.elements['email'];  
  var box= document.getElementById('checkbox');
  var submit=document.getElementById('submit');
  submit.disabled=true;
  function statehandle() {
    if(fname.value.trim()!=""&&lname.value.trim()!=""&&ValidateEmail()==true&&box.checked==true&&passcheck()==true&&validatePhone()==true)
      submit.disabled=false;
    else
      submit.disabled=true;
  }
  function enablesubmit(val) {
    if(val.checked==true)
    {
        if(fname.value.trim()!=""&&lname.value.trim()!=""&&ValidateEmail()==true&&box.checked==true&&passcheck()==true&&validatePhone()==true)
          submit.disabled=false;
        else
          submit.disabled=true;
    }
    else
      submit.disabled=true;
  }
  function validatePhone(){
    var len=form.elements['phno'].value;
    if(len.length==10)
      return true;
    else
      return false;
  }
  function ValidateEmail()  {  
    const emailRegex =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const checker = email.value.trim();
    if (!emailRegex.test(checker)) {
      return false;
    }
    return true;
  } 
  function passcheck()
  {
    if(pass.value.trim()==cpass.value.trim()&&pass.value.trim().length>=6)
      return true;
    else
      return false;
  }
</script>
</body>
</html>