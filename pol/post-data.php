<?php ?>


<html lang="ar" dir="rtl">
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  
<link rel="stylesheet" href="../static/Navstyle.css" />
  <link rel="stylesheet" href="../static/single-post.css" />
  <a href="../index.html">
      <div class="Navbar"> <p>
        <p > استطلاعات <img src="../static/1.png" class="nav-img">   </p>
        
      </p> </div>
    </a>

  <?php 
  
  session_start();
  $var = $_SESSION['post-data'];
  $fvs=intval(($var[0]["first_choice_voters"]/$var[0]["total_voters"])*100);
  $svs=intval(($var[0]["second_choice_voters"]/$var[0]["total_voters"])*100);
  $fv=$var[0]["first_choice_value"];
  $sv=$var[0]["second_choice_value"];
  $fcvalue=$var[0]["first_choice_voters"];
  $scvalue=$var[0]["second_choice_voters"];
  

  
  
  echo "<div class='post'>
  <div class='single-post' > 
  <p style='font-size:20px;font-family: Tahoma, Geneva, Verdana, sans-serif; font-weight:700; margin-right:20px '>".$var[0]["question"]."</p><p style='font-size:20px;font-family: Tahoma, Geneva, Verdana, sans-serif; font-weight:700; margin-right:0px; '> ".$fv."<div class='progress'>
  <div class='progress-bar ' role='progressbar' style='width:" .$fvs. "%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'>".$fvs."%</div>
</div>"."<p style='font-size:30px;text-align:center;font-weight:700;'>" .$fcvalue ."      أصوات </p><p style='font-size:20px;font-family: Tahoma, Geneva, Verdana, sans-serif; font-weight:700; margin-right:20px '> ".$sv."<div class='progress'>
<div class='progress-bar  bg-danger' role='progressbar' style='width:" .$svs. "%' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'>".$svs."%</div>
</div>
<p style='font-size:30px;text-align:center;font-weight:700;'>" .$scvalue ."      أصوات </p>
</div>";
  
  ?>
</html>
