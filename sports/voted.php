<?php
if (!isset($_SESSION)) { session_start(); }
$servername="localhost";
$username="root";
$password="";
$dbname="test";
//connect the db propelly 
$conn= new mysqli($servername,$username,$password,$dbname,"3306");
$conn->set_charset("utf8");

$id=$_POST["hello"];
$choice_num =$_POST["hello2"];

if($choice_num==0)$choice_str="first_choice_voters";
else $choice_str="second_choice_voters";

//echo $id."<br>";
//echo $choice_str."<br>";


$sql="UPDATE sports 
SET $choice_str=$choice_str+1,
total_voters=total_voters+1
where id =$id";

$res=$conn->query($sql);
 
$sql2="SELECT * from  sports where id=$id";
$res2=$res2=$conn->query($sql2);
$total=[];
if($res2->num_rows>0)
{ //fill the info into this variables 
  while($row=$res2->fetch_assoc())
  { 
    
    array_push($total,$row);
  }
}

$_SESSION['post-data'] = $total;
//print_r($_SESSION["post-data"]);
echo "<script> location.href='post-data.php'; </script>";
exit;
?>



