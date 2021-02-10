<?php ?>


<html lang="ar" dir="rtl">
<meta charset="UTF-8"  />
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
  //print_r( $var);
  $fvs=intval(($var[0]["first_choice_voters"]/$var[0]["total_voters"])*100);
  $svs=intval(($var[0]["second_choice_voters"]/$var[0]["total_voters"])*100);
  $fv=$var[0]["first_choice_value"];
  $sv=$var[0]["second_choice_value"];
  $fcvalue=$var[0]["first_choice_voters"];
  $scvalue=$var[0]["second_choice_voters"];
  $flag=false;
  if($var[0]["images"])
  {
    $image=base64_encode($var[0]["images"]);
    $flag=true;
  }

  //echo $image;
  
  
  
  echo $svs;
  ?>
  
 


  <div class='post'>
   <div class='single-post' >
   <div class="post-image" style="margin-top:-40px;">
<?php 

if($flag) 
echo '<img src="data:image/jpeg;base64,'. $image .'" height= 50% width = 100%/>';
else echo "<p style='color:red;font-size:40px;text-align:center;padding:20;'>لا يوجد صور لعرضها "

?>
</div> 
  <p style="text-align:center;margin-top:30px;"><?php echo $var[0]["question"]; ?></p>
  <p style="text-align:center"> <?php echo $fv?> </p>
  <div class='progress'>
  <div class='progress-bar ' role='progressbar' style="width:<?php echo $fvs;?>%; aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'">
  <?php echo $fvs."%";?>
  </div>
</div><!--end progress-bar-->
<p style='font-size:30px;text-align:center;font-weight:700;'>
<?php echo $fcvalue;?>       أصوات 
</p>
<p style="text-align:center"> <?php echo $sv?> </p>
<div class='progress'>
<div class='progress-bar  bg-danger' role='progressbar' 
style="width:<?php echo $svs;?>%" aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'>
<?php echo $svs."%";?>
</div>
</div>

<p style='font-size:30px;text-align:center;font-weight:700;'>
<?php echo $scvalue;?>      أصوات </p>

</div>

</div>
</html>

