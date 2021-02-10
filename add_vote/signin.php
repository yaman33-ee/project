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
$sql="SELECT * FROM `signin` ";
$res2=$res2=$conn->query($sql);

$total=[];

if ($res2->num_rows) {
  while($row=$res2->fetch_assoc())
  { 
    
    array_push($total,$row);
  }
}








?>


<!DOCTYPE html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="../static/Navstyle.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>تسجيل الدخول</title>
  </head>
<a href="../index.html">
  <div class="Navbar"> <p>
    <p >  <img src="../static/1.png" class="nav-img">   استطلاعات</p>
    
  </p> </div>
</a>
<div>
<?php  //print_r($total); ?>
</div>
<div class="signin">

<div class="title">
  <p></p>
  <p> تسجيل الدخول </p>
</div>
<div class="w3-panel w3-blue" id="why" style="display:none">
  <h4>
 هذا الرقم غير صحيح , يرجى المحاولة مرة أخرى
</h4>
</div>

<div class="id">
<div id="numberwarning"  style="color:red;text-align:right;margin-right:90px;display:none">
الرجاء ادخال أرقام فقط *
</div>


<input type="text" name="id-text"  id="id-text" required>
<label> رقم تسجيل الدخول </label>

</div>
   
<div class="section">
        <p class="section-title"> القسم </p>
        <p style="color:red;text-align: right;margin-right:30px" >
           <span>فضلا : لا تنسى  اختيار القسم </span>
           <span>*</span> </p>
        <div class="section-options">
        <label>
           <input type="radio" name="section" value="sports" checked >
          <img src="https://i.pinimg.com/originals/d0/4c/24/d04c240fada114f48bd33a51d5d8d0a9.gif">
          <p style="text-align: center;"> رياضة </p>
        </label>

        <label>
          <input type="radio" name="section" value="economics" >
         <img src="https://cdn.dribbble.com/users/596181/screenshots/3695108/moneh1.gif">
         <p style="text-align: center;"> اقتصاد </p>
       </label>

       <label>
        <input type="radio" name="section" value="politics" >
       <img src="https://media0.giphy.com/media/l2JhJTOnLk1aX4gG4/giphy.gif">
       <p style="text-align: center;"> سياسة </p>
     </label>
    </div>
      </div><!--end section here -->
      <button  class="signin-submit-button"> تسجيل الدخول</button>
    </div><!--end sigin here -->

    <form action="setloggedin.php" method="POST" id="sec-info" style="display:none">

    <input name="sec" type="text" id="sec2">
    </form>
   
</html>


<script>

document.querySelector(".signin-submit-button").addEventListener("click",checkinputs)

function checkinputs()
{
  //check if it is anumber
  const id= document.querySelector("#id-text").value;
  var is_number=Number.isInteger(parseInt(id));
  var radios = document.getElementsByName('section');
var section=getsection();
  function getsection()
  {
  for (var i = 0; i < radios.length; i++) {
  if (radios[i].checked) {
    // do whatever you want with the checked radio
    return (radios[i].value);
  }
}
  }
  //console.log(id,is_number,section)
  if(!is_number)document.querySelector("#numberwarning").style.display="block";
  else 
  {
    var ids_array = <?php echo json_encode($total); ?>;
    
    var flag=false;
    for(var i=0 ;i<ids_array.length;i++)
    { 
      
      if(ids_array[i]["sec"]===section && ids_array[i]["id"]==id)
      flag=true
    };
    if(flag===false)
    {
      document.querySelector("#why").style.display="block";
    }
    else{
      document.querySelector("#sec2").value=section;
      document.querySelector("#sec-info").submit();
      
  
    }
  }
}
</script>