
<?php 
$email=base64_decode($_GET['em']);
$fname=base64_decode($_GET['fn']);
$lname=base64_decode($_GET['ln']);
?>

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
		margin-top:27%;
		font-family: 'Varela Round', sans-serif;
		position:relative;
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
					<li class="active" ><a href="#"><?echo "$fname"." "."$lname";?></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="temp.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<aside>
    <div id="sidebar"  class="nav-collapse " style="height:93%;margin-top:-1%;position:absolute;">
        <ul class="sidebar-menu" id="nav-accordion">                    
            <p class="centered">

				<img src="noimage.png"  class="img-circle" width="70" height="70" >
				</p>
                <li class="sub-menu">
                    <a href="ucomp.php" ><i class="fa fa-book"></i>
                          <span>Register Complaint</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="uhist.php" class="active"><i class="fa fa-tasks"></i>
                        <span>Complaint History</span>
                    </a>
                      
                </li>
                 
        </ul>
    </div>
</aside>
	<section id="container" >
	
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your Complaint History</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">Complaint Number</th>
                                  <th style="text-align: center">Category</th>
                                  <th style="text-align: center">Class</th>
                                  <th style="text-align: center">Status</th>  
                              </tr>
                              </thead>
                              <tbody>
								<?php
									$conn = mysqli_connect("localhost","root","","sales");

									if(!$conn)
									{
										echo "Database connection faild...";
									}

									$query="select * from complaints where EMAIL='$email'";
									$result=mysqli_query($conn,$query);	
									$c=mysqli_num_rows($result);
									if($c>0)
									{
										while($row=mysqli_fetch_assoc($result))
										{
											
									?>
                              <tr>
                                  <td align="center"><?php echo $row["ID"]; ?></td>
                                  <td align="center"><?php echo $row["CAT"]; ?></td>
                                 <td align="center"><?php echo $row["CLASS"]; ?></td>
                                  <td align="center"><?php echo $row["status"]; ?></td>
                                </tr>
								<?php
										}
									}
									else
									{
										?>
											<tr><td colspan="4" align="center" style="color:red;"><b>No Complaint History Found..!</b></td></tr>
										<?php
									}
								?>                              
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
	
	<nav class="navbar navbar-inverse" id="fnav">
    <div class="container">
        <div class="navbar-footer">
			<ul class="list-inline sicon icon-circle" id="navbar-footer">
				<li>Contact Us : </li>
				<li><a href="https://www.instagram.com/sush.hegde/" class='fab fa-instagram'></a></li>
				<li><a href="https://in.linkedin.com/in/thanush-bangera-7ba97217a" class='fab fa-linkedin-in'></a></li>
				<li><a href="https://www.facebook.com/sushvith.ahegde" class='fab fa-facebook-messenger'></a></li>
				<li>&copy;TechSupport 2019</li>
			<ul>
        </div>
        
    </div>
</nav>

</body>

</html>