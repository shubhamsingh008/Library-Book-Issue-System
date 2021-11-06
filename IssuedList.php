<?php  
session_start();
?>
<html>
    <head>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
       <style type="text/css">
        body{
            background-image: url('https://wallpaperaccess.com/full/2324580.jpg ');
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
          table,th,td{
            outline: 1px solid grey;
          }
       </style>
    </head>
<body>
        <h1 style="color: #e7e9bb; text-align: left;">Welcome <?php echo $_SESSION['name'] ?>!</h1>
        <hr style="color: grey; border: 1px solid grey;">
      <h2 style="color: #d6da8b">List of books issued :</h2>
      <table class='table table-dark table-hover' style="text-align: center; outline: 1px solid grey;">
    <thead class='thead-light'>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Book ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Book Author</th>
    </tr>
    </thead>
    <tbody>
      <?php
        include 'DB Connect.php';
        $query="SELECT * FROM books WHERE Student='$_SESSION[name]'";
        $run=mysqli_query($conn,$query);
        $i=1;
        while($fetch=mysqli_fetch_assoc($run)){

      ?>
      <tr>
        <th scope="row"><?php echo $i++; ?></th>
        <td><?php echo $fetch['Book ID']; ?></td>
        <td><?php echo $fetch['Name']; ?></td>
        <td><?php echo $fetch['Author']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
        <p align="right">
        <a href="/NIIT/LogIn.php" style="text-decoration: none;">
        <button type="submit" class="btn btn-grad btn-round" onclick="">Log Out</button></a></p>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript"></script>
</body>
</html>