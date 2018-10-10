<?php
   //include_once 'preg_find.php';
   include_once 'get_locale.php';
   //obtener el locale
   $locale= get_locale();
   
   // buscar links
   $link_dir="./links";
   
   foreach (scandir($link_dir) as $dir){
      if (substr ( $dir, strlen($dir)-5,5)==".json")
	 ParseFile($link_dir."/".$dir, $locale);
   }
   
function ParseFile($file, $locale){
   $string = file_get_contents($file);
   
   $json=json_decode($string,true);

   try{
      $jsonIterator = new RecursiveIteratorIterator(
			   new RecursiveArrayIterator($json, TRUE),
   			RecursiveIteratorIterator::SELF_FIRST);
	 
      $savingname=false; // flag to ask if we are parsing name or description
   
      foreach ($jsonIterator as $key => $val) {
	 if ($key=="linkid") $linkid=$val;
	 if ($key=="link") $link=$val;
	 if ($key=="icon") $icon=$val;
	 if ($key=="fonticon") $fonticon=$val;
	 if ($key=="name") 
	    $savingname=true;
	 if ($key=="description")
	    $savingname=false;
	 if ($key==$locale)
	    if ($savingname==true) $name=$val;
	    else $description=$val;
      
	 
      } // for each
      
   drawIcon($linkid, $link, $icon, $fonticon,$name, $description);
   
      
   } catch (Exception $e){
      
      
   }
}

   
function drawIcon($linkid, $link, $icon, $fonticon, $name, $description){
   
    echo "<div class='linkcontainer' id='link-".$linkid."'>";
     if ($fonticon=="" || !is_file($fonticon))	  
	    echo "<div class='toplink'><p><i class='fonticon ".$fonticon."' style='text-align:center; margin-left: 60px; margin-top:30px important!;'></i></p>";
       else
	  echo "<div class='toplink'><p><i class='icon-camera-retro icon-large'></i></p>";		  
       echo "</div>";
    echo "<div class='bottomlink'>";
       echo "<div class='linktitle'>".$name."</div>";
	  echo "<div class='linkdesc'>".$description."</div>";
	  echo "</div>";
 
    echo "</div>";
 
 echo "<script>
 $('#link-".$linkid."').bind('click', function( event ){
    location.href='".$link."';
         });
 </script>";
   
   
}


?>
 