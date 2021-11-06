<head>
	<title>Linking Database</title>
</head>
<body>
<?php 
//mysqli_connect("Server name","DB Username","DB Password","DB Name")
$conn=mysqli_connect('localhost','root','','project');
if($conn->connect_error){
	die("Connection failed : ".$conn->connect_error);
}
?>
</body>