<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$servername="localhost";
$username="root";
$password="";
$dbname="test";
//connect the db propelly 
$conn= new mysqli($servername,$username,$password,$dbname,"3306");

if($conn->connect_error)
{
  die("Connection Failed ".$conn->connect_error );
}
$conn->set_charset("utf8");
function val($data)
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
//echo print_r($_POST,true);

//get the vields and check them 
$question=val($_POST["question"]);
$firstoption=val($_POST["firstoption"]);
$secondoption=val($_POST["secondoption"]);
$section= $_SESSION["section"];
$imgContent= 10;
if($_FILES["image"]["name"])
{
$fileName = basename($_FILES["image"]["name"]); 
 $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
 $image = $_FILES['image']['tmp_name'];
 $imgContent = addslashes(file_get_contents($image)); 
}
 


echo $question;
echo $firstoption;
echo $secondoption;
echo $section;


if($imgContent!=10) 

{

$sql="INSERT INTO $section (question,first_choice_value,second_choice_value,images)
values('$question','$firstoption','$secondoption','$imgContent' );";


if($section=="sports")   echo "<script> location.href='../sports/index.php'; </script>";
if($section=="economics")   echo "<script> location.href='../eco/index.php'; </script>";
if($section=="politics")   echo "<script> location.href='../pol/index.php'; </script>";

$res=$conn->query($sql);
}


else
{
  
$sql2="INSERT INTO $section (question,first_choice_value,second_choice_value)
values('$question','$firstoption','$secondoption' );";


if($section=="sports")   echo "<script> location.href='../sports/index.php'; </script>";
if($section=="economics")   echo "<script> location.href='../eco/index.php'; </script>";
if($section=="politics")   echo "<script> location.href='../pol/index.php'; </script>";

$res2=$conn->query($sql2);



}


$conn->close();




?>