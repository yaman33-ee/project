<?php
    session_start();
    
    if (!isset($_SESSION['loggedin']) || $_SESSION["loggedin"]!=true) {
      echo $_SESSION["loggedin"];
        echo "Please Login again";
        header("Location: signin.php");
die();
    }
    else {
        $now = time(); 
        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! ";
            header("Location: signin.php");
        }
        
      }
?>


<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/Navstyle.css" />
    <link rel="stylesheet" href="add_vote.css" />
    
    <title>اضافة تصويت</title>
  </head>
  <body>
    <a href="../index.html">
      <div class="Navbar"> <p>
        <p >  <img src="../static/1.png" class="nav-img">   استطلاعات</p>
        
      </p> </div>
    </a>

    <p style="text-align:center;font-size:20px">  أنت الآن تضيف استطلاع في قسم -> 
    <span id="section" style="color:blue">  
    <?php 
     
      if($_SESSION["section"]==="sports")echo "رياضة";
      if($_SESSION["section"]==="economics")echo "اقتصاد";
      if($_SESSION["section"]==="politics")echo "سياسة";


    ?>
    
      </span> </p>

    <div class="inputs">
  <form action="add_vote2.php" method="POST" class="add-form"   enctype="multipart/form-data"
  id="theForm">
  
    
    <div class="question" >
   
      <p> السؤال </p>
      <p style="font-size:17px;color:red;text-align:right;margin-right:20px;display:none" id="empty-question"> *رجاءا قم بتعبئة هذا الحقل  </p>
      <textarea cols="12" rows="10" placeholder="اكتب سؤالك هنا " name="question" id="question"></textarea>
    </div>

    

    <div class="options" >
      <p> الخيارات </p>
      <p style="font-size:17px;color:red;text-align:right;margin-right:20px;display:none" id="empty-options"> * رجاءا قم بتعبئة الخيارات كاملة  </p>
      <div class="two-options">
        <label> الخيار الأول </label>
        <input type="text" name="firstoption" id="firstoption">
        <label> الخيار الثاني </label>
        <input type="text" name="secondoption"
        id="secondoption">
      </div>
      <p style="color:red;font-size:20px;padding:10px;text-align:right;"> *لا يسمح بأكثر من خيارين  </p>
      </div><!--end options here -->

      

      <div class="image-picker">
    <label ><h4 style="text-align:center;margin-top:-20px;">
      اضافة صورة للتوضيح (اختياري) 
    </h4>
    </label>
    <br>
    <div class="element">
    <i class="fa fa-upload fa-3x"style="font-size:100px;text-align:center;" ></i><span class="name">No file selected</span>
    <input id="img_src" type="file" name="image" accept="image/*"
    onchange="loadFile(event)">
    <br> 
    <img  style="border:1px dotted darkblue;margin-top:-20px;" width="80px" height="80px" id="output"/>
    </div><!--end element div-->
   
   
    </div><!--end image-picker-->
 

    

   
   
  </form>
  <button  class="submit-button"     id="add_vote_submit_button"> أضف تصويت </button>
</div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script>


var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  $("i").click(function () {
  $("input[type='file']").trigger('click');
});

$('input[type="file"]').on('change', function() {
  var val = $(this).val();
  
  $(this).siblings('span').text(val);
})


document.querySelector(".submit-button").addEventListener("click",checkinput)


function checkinput(e)
{
  
const question_value=document.querySelector("#question").value;
const first_option_value=document.querySelector("#firstoption").value;
const second_option_value=document.querySelector("#secondoption").value;
//console.log(question_value)
if(question_value ==="")
document.querySelector("#empty-question").style.display="block";
else
document.querySelector("#empty-question").style.display="none";
if(first_option_value ==="" || second_option_value==="")
document.querySelector("#empty-options").style.display="block";
else 
document.querySelector("#empty-options").style.display="none";
if(question_value !=="" && first_option_value !=="" 
&& second_option_value!=="" )
document.getElementById('theForm').submit();
}



  </script>
</html>
