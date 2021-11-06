<?php
  include 'DB Connect.php';
  if(isset($_POST['submit'])){
           $query="INSERT INTO `books`(`ID`, `Book ID`, `Name`, `Author`,`Student`) VALUES ('NULL','".$_POST['b_id']."','".$_POST['b_name']."','".$_POST['author']."','".$_POST['student']."')";
    $run=mysqli_query($conn,$query);
  }
?>
<html>
    <head>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
       <style type="text/css">
        body{
            background-image: url('https://wallpapercave.com/wp/wp2806059.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            padding: 20px;
            }
          label{
            color: #a8d9f0;
          }
          h1{
            text-shadow: 4px 3px #000;
          }    
          .container{
          height: 100%;
          align-content: center;
          }
          .card{
          height: 550px;
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
          background-color: #26a0da;
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

         .btn-grad {background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%)}
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
        <h1 style="color: #26a0da;">Book Issue Form</h1>
      </div>
      <div class="card-body">
            <form id='myform' action="#" method="POST">
              <label for="b_id">Book ID</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
              </div>
              <input type="text" class="form-control" id="b_id" name="b_id" placeholder="Book ID" onkeyup="statehandle()">
            </div>
            <label for="b_name">Book Name</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-book"></i></span>
              </div>
              <input type="text" class="form-control" id="b_name" name="b_name" placeholder="Book Name" onkeyup="statehandle()">
            </div>  
            <label for="author">Book Author</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" id="author" name="author" placeholder="Author Name" onkeyup="statehandle()">
            </div>
            <label for="student">Student Name</label>
              <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <select name='student' id='student' onchange="statehandle()">  
              <option value="">----------------- Student Name ----------------- </option>
              <?php
                $query="SELECT * FROM students";
                $run=mysqli_query($conn,$query);
                $i=1;
                while($fetch=mysqli_fetch_assoc($run)){
              ?>
                <option value="<?php echo $fetch["Full Name"];?>">
                <?php echo $fetch["Full Name"];?>
                </option>
                <?php 
                  }
                ?> 
            </select>
            </div>
            <br>
            <button type="submit" class="btn btn-grad btn-block btn-round" name="submit" id="submit" disabled="disabled">Issue Book</button>
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
  const b_id = form.elements['b_id'];
  const b_name = form.elements['b_name'];
  const author = form.elements['author'];
  const student = form.elements['student'];
  var submit=document.getElementById('submit');
  submit.disabled=true;  
  function statehandle() {
    if(b_id.value.trim()!=""&&b_name.value.trim()!=""&&author.value.trim()!=""&&student.value.trim()!="")
      submit.disabled=false;
    else
      submit.disabled=true;
  }
</script>
</body>
</html>