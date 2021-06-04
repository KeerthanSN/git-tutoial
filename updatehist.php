<?php
$fname=$_GET["fn"];
$lname=$_GET["ln"];
$email=$_GET["em"];
$category=$_GET["cat"];
$class=$_GET["cl"];
$flag=$_GET["fl"];

$conn=mysqli_connect("localhost","root","","sales");
if($flag==0)
{

$q="update complaints set status='Not Process Yet' where FNAME='$fname' and LNAME='$lname' and EMAIL='$email' and CAT='$category' and CLASS='$class'";
mysqli_query($conn,$q);
header("location:ahist.php");


}
if($flag==1)
{

$q1="update complaints set status='In Process' where FNAME='$fname' and LNAME='$lname' and EMAIL='$email' and CAT='$category' and CLASS='$class'";
mysqli_query($conn,$q1);
header("location:ahist.php");


}
if($flag==2)
{

$q2="update complaints set status='Closed' where FNAME='$fname' and LNAME='$lname' and EMAIL='$email' and CAT='$category' and CLASS='$class'";
mysqli_query($conn,$q2);
header("location:ahist.php");


}

?>