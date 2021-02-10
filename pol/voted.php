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


$sql="UPDATE politics 
SET $choice_str=$choice_str+1,
total_voters=total_voters+1
where id =$id";

$res=$conn->query($sql);
 
$sql2="SELECT * from  politics ORDER BY id DESC";
$res2=$res2=$conn->query($sql2);
$total=[];
if($res2->num_rows>0)
{ //fill the info into this variables 
  while($row=$res2->fetch_assoc())
  { 
    if($row["id"]==$id)
    array_push($total,$row);
  }
}

$_SESSION['post-data'] = $total;

echo "<script> location.href='post-data.php'; </script>";
exit;
?>



