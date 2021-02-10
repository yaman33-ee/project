<?php

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

$sql="SELECT * from  politics ORDER BY id DESC";
$res=$res=$conn->query($sql);
$total=[];
if($res->num_rows>0)
{ //fill the info into this variables 
  while($row=$res->fetch_assoc())
  { 
    array_push($total,$row);
  }
}
?>


<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/votes-style.css" />
    <link rel="stylesheet" href="../static/Navstyle.css" />
    <title>تصويتات السياسة</title>
  </head>
  <body>
    <a href="../index.html">
      <div class="Navbar"> <p>
        <p >  <img src="../static/1.png" class="nav-img">   استطلاعات</p>
        
      </p> </div>
    </a>
    <p style='text-align:center;color:red;font-size:2rem'>* اختر اجابتك ثم اضغط على تصويت  </p>;
  <div class="votes">
    <?php 
    $res_num=0;
    foreach ($total as $poll)  {
            //print_r( $food).'<br>';
           
            echo '<div class="poll" data-id='. $poll["id"].'><p style="line-height:30px;color:black" >'.$poll["question"] ."</p>
            <input type='radio' class='choice' name='res-.$res_num.' checked
            value=".$poll["first_choice_value"].' >'
            .$poll["first_choice_value"]."</input><br>
            <input type='radio' class='choice' name='res-.$res_num.' value=".$poll["second_choice_value"].'>'.$poll["second_choice_value"]."</input><br>
            <button 
            type='button'
            class='vote'
            style='display:block; 
            margin: 12px auto;
            border-radius:6px;
            background-color:#0083B0;
            font-size:30px;
            border:none;
            padding:5px;
            color:white;
            cursor:pointer;'
            value='تصويت'
            id='vote-btn';
            data-id=".$poll["id"] .">تصويت
            </button>
            <form id='myform' action='voted.php' method='post' style='display:flex;width:0;height:0;'>
            <input name='hello' style='opacity:0;'
            id='id' width='0' height='0'  />
            <input name='hello2'
            style='opacity:0;'
            id='answer'  width='0' height='0'/>
            </form>
            </div>"; 
             
            $res_num++;
        }
?>

  </div>
</body>
<?php include 'politics.php'; ?>
</html>
