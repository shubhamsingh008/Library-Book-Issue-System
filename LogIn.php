<?php  
session_start();
if(isset($_POST['submit'])){
  $_SESSION['Logged']="No";
  $emailid = $_POST['emailid'];
  $password = $_POST['password'];
  $QueryPwd="";
  $message="";
  include'DB Connect.php';
    $query = "SELECT * FROM students WHERE Email='$emailid' AND Password='$password'";
    $data = mysqli_query($conn, $query);
        if($info = mysqli_fetch_array($data))
        {
        $QueryPwd=$info['Password'];        
        $_SESSION['emailid']=$info['Email'];
                if( $password ==$QueryPwd ) {
                $_SESSION['Logged_expert']="Yes";
                $_SESSION['ID']=$info['ID'];
                $_SESSION['name']=$info['Full Name'];
               ?>
               <script>
                   alert('Successfully Logged in!');
               </script>
               <?php
                echo "<meta http-equiv='refresh' content='0;url=IssuedList.php'>";
                header("Location: IssuedList.php");
            }
        else{
            ?><script type="text/javascript">
  alert("Invalid Username/Password! Please try again!");
</script>
<?php
            unset($_SESSION['emailid']);
            $message="Password not matched";
            echo "<meta http-equiv='refresh' content='0;url=LogIn.php'>";
            //header("Location: LogIn.php");
            }

}
        else{
            ?><script type="text/javascript">
  alert("Invalid Username/Password! Please try again!");
</script>
<?php
            unset($_SESSION['emailid']);
            $message="Password not matched";
            echo "<meta http-equiv='refresh' content='0;url=LogIn.php'>";
            }
}

?>
<html>
    <head>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
       <style type="text/css">
        body{
            background-image: url('https://wallpaperaccess.com/full/1812936.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            padding: 20px;
            }
          label{
            color: #e7e9bb;
          }
          h1{
            text-shadow: 4px 3px #000;
          }    
          .container{
          height: 100%;
          align-content: center;
          }
          .card{
          height: 380px;
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
          background-color: #e7e9bb;
          color: black;
          border:0 !important;
          }
          input:focus{
          outline: 0 0 0 0  !important;
          box-shadow: 0 0 0 0 !important;
          }
          option{
            max-width: 90%;
            text-align: center ;
            }  
         .btn-grad {background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB  51%, #403B4A  100%)}
         .btn-grad {
            padding: 15px 45px;
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
        <h1 style="color: #e7e9bb;">Student Login</h1>
      </div>
      <div class="card-body">
            <form id='myform' action="#" method="POST">
              <label for="email">Email Address</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="text" class="form-control" id="emailid" name="emailid" placeholder="Email Address" onkeyup="statehandle()">
            </div>
            <label for="password">Password</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup="statehandle()">
            </div>  
            <br>
            <button type="submit" class="btn btn-grad btn-block btn-round" name="submit" id="submit" disabled="disabled">Log In</button>
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
  const email = form.elements['emailid'];
  const password = form.elements['password'];
  var submit=document.getElementById('submit');
  submit.disabled=true;  
  function statehandle() {
    if(ValidateEmail()==true&&passcheck()==true)
      submit.disabled=false;
    else
      submit.disabled=true;
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
    if(password.value.trim().length>=6)
      return true;
    else
      return false;
  }
</script>
</body>
</html>