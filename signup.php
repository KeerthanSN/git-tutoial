<html>
<head>
<title>Sign Up</title>
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <style>
	body
{
    font-family: Tahoma, Geneva, sans-serif;
    color: #fff;
    background:url("abcd.jpg");
    background-size: cover;
}
.signup
{
    background:rgba(44, 62, 80, 0.7);
	padding:40px;
	width:250px;
	margin:auto;
	margin-top:80px;
	height:430px;
	margin-left:180px;
	margin:0 auto;
	margin-top:90px;
}
form
{
    width: 240px;
    text-align: center;
}
input
{  
    width: 240px;
    text-align: center;
    background: transparent;
    border: none;
    border-bottom: 1px solid #fff;
    font-family: 'Play', sans-serif;
    font-size: 16px;
    font-weight: 200px;
    padding: 10px 0;
    transition: border 0.5s;
    outline: none;
    color: #fff;
}
button[type=submit]
{
    border: none;
    width: 190px;
    background: white;
    color: #000;
    font-size: 16px;
    line-height: 25px;
    padding: 10px 0;
    border-radius: 15px;
    cursor: pointer;
}
button[type=submit]:hover
{
    color: #fff;
    background-color: black;
}
h2
{
    color: #000; 
}
::placeholder {
    color:aliceblue;
    opacity: 0.8;
}
    </style>
</head>

<body>
<div class="signup">
    <form action="signup.php" method="POST">
    <h2 style="color: #fff;">Sign Up</h2>
    <input type="text" name="fname" placeholder="First Name" required><br><br>
	<input type="text" name="lname" placeholder="Last Name"><br><br>
	<input type="text" name="email" placeholder="Email address" required><br><br>
    <input type="password" name="pass" placeholder="Password" required><br><br>      
    <button type="submit" name="submit">Sign Up</button><br><br>
        Already have account?<a href="login.php" style="font-family: 'Play', sans-serif; color: yellow;">&nbsp;Log In</a>
    </form> 
</div>	
</body>
<?php
$conn = mysqli_connect("localhost","root","","sales");
if(!$conn)
{
	echo "Database connection faild...";
}
if(isset($_POST['submit']))
{
	$fname = $lname = $email = $password = '';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$sql = "INSERT INTO user(firstname,lastname,email,password,flag) VALUES ('$fname','$lname','$email','$password',1)";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
	header("Location:login.php");}
	else
	{
		echo "Error";
	}
}
?>
</html>
