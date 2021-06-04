<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location:login.php");
}
else
{
	$id=$_SESSION['id'];
	$email=$_SESSION['email'];
	$fname=$_SESSION['fname'];
	$lname=$_SESSION['lname'];
}
?>
<?php
if(isset($_POST['submit']))
{
	$cat=$_POST['category'];
	$class=$_POST['complaintype'];
	$comp=$_POST['complaindetails'];
	
	$conn=mysqli_connect("localhost","root","","sales");
	$query1="select * from complaints where FNAME='$fname' and LNAME='$lname' and EMAIL='$email' and CAT='$cat' and CLASS='$class' and COMP='$comp'";
	$result=mysqli_query($conn,$query1);
	$c=mysqli_num_rows($result);
	if($c==0)
	{	
		$timestamp = date('Y-m-d H:i:s');
		$query="insert into complaints(FNAME,LNAME,EMAIL,CAT,CLASS,COMP,status,time)values('$fname','$lname','$email','$cat','$class','$comp','Not Process Yet','$timestamp')";
		mysqli_query($conn,$query);
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Project</title>
  <style>
	#brand{
		font-family: "Times New Roman", Times, serif;
		font-style: italic;
		margin-top:-2%;
		color:#ffffff;
	}
	body {
		font-family: 'Varela Round', sans-serif;
	}
	#navbar-footer{
		margin-top:1%;
		color:#ffffff;
		text-align:center;
		font-size:20px;
		font-family: "Times New Roman", Times, serif;
		font-style: italic;
	}
	#myCarousel{
		margin-top:-2%;
	}
	#hnav{
		margin-bottom:1%;
		font-family: 'Varela Round', sans-serif;
	}
	#fnav{
		margin-top:4%;
		font-family: 'Varela Round', sans-serif;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
	
	
</head>
<body>
	<nav class="navbar navbar-inverse" id="hnav">
		<div class="container-fluid" >
			<div class="navbar-header col-lg-3">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="index.html"><h2 id="brand">Technical Support</h2></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-left col-lg-6">
					<li><a href="index.html">Home</a></li>
					<li class="active" ><a href="#"><?php echo "$fname"." "."$lname";?></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="temp.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<section id="container" >
	<aside>
    <div id="sidebar"  class="nav-collapse " style="height:93%;margin-top:-1%;position:absolute;">
        <ul class="sidebar-menu" id="nav-accordion">
              
                           
            <p class="centered">

				<img src="noimage.png"  class="img-circle" width="70" height="70" >
				</p>
                <li class="sub-menu">
                    <a href="ucomp.php" class="active"><i class="fa fa-book"></i>
                          <span>Register Complaint</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="uhist.php?em=<?php echo base64_encode($email);?>&fn=<?php echo base64_encode($fname);?>&ln=<?php echo base64_encode($lname);?>"><i class="fa fa-tasks"></i>
                        <span>Complaint History</span>
                    </a>
                      
                </li>
                 
        </ul>
    </div>
</aside>
      <section id="main-content" >
	  
          <section class="wrapper">
          	<h3><i class="fa fa-angle"></i>Register Complaint</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">

                      

                    <form class="form-horizontal style-form" method="post" name="complaint" action="" >

						<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
							<select name="category" id="category" class="form-control"  required="">
                             <option value="">Select Category</option>
							<?php
									$conn=mysqli_connect("localhost","root","","sales");
									$sql=mysqli_query($conn,'SELECT cat FROM categorytable');
									while($rw=mysqli_fetch_assoc($sql)) {
							?>
							  <option value="<?php echo $rw['cat'];?>"><?php echo $rw['cat'];?></option>
								<?php
									}
									?>
							</select>
						</div>
					</div>

					<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Class</label>
					<div class="col-sm-4">
					<select name="complaintype" class="form-control" required="">
						<option value=""> Select</option>
						<?php
								$conn=mysqli_connect("localhost","root","","sales");
								$sql=mysqli_query($conn,'SELECT cl FROM class');
								while($rw=mysqli_fetch_assoc($sql)) {
						?>
						<option value="<?php echo $rw['cl'];?>"><?php echo $rw['cl'];?></option>
						<?php
						}
						?>
					</select> 
					</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Complaint Details</label>
						<div class="col-sm-6">
						<textarea  name="complaindetails" required="required" cols="10" rows="8" class="form-control" maxlength="2000"></textarea>
						</div>
					</div>

            <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</div>
			</div>

            </form>
            </div>
        </div>
    </div>   	
</section>
</section>
	
	<nav class="navbar navbar-inverse" id="fnav">
    <div class="container">
        <div class="navbar-footer">
			<ul class="list-inline sicon icon-circle" id="navbar-footer">
				<li>Contact Us : </li>
				<li><a href="https://www.instagram.com/_jithin.das_/" class='fab fa-instagram'></a></li>
				<li><a href="https://in.linkedin.com/in/thanush-bangera-7ba97217a" class='fab fa-linkedin-in'></a></li>
				<li><a href="https://www.facebook.com/sushvith.ahegde" class='fab fa-facebook-messenger'></a></li>
				<li>&copy;TechSupport 2019</li>
			<ul>
        </div>
        
    </div>
</nav>

</body>
</html>