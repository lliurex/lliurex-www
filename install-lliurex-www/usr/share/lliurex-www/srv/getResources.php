<?php
   //include_once 'preg_find.php';
   include_once 'get_locale.php';
   //obtener el locale
   $locale= get_locale();
	
   // buscar links
   $link_dir="./links";
   
	// scanning for common resources
	 $easysites=array();
   foreach (scandir($link_dir) as $dir){
		if (substr ( $dir, strlen($dir)-5,5)==".json" && substr ( $dir, 0,5)!="easy-") ParseFile($link_dir."/".$dir, $locale);
		else array_push($easysites, $dir);
   }
	foreach ($easysites as $dir){
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
	 if ($key=="type") $type=$val;
	 if ($key=="fonticon") $fonticon=$val;
	 if ($key=="name") 
	    $savingname=true;
	 if ($key=="description")
	    $savingname=false;
	 if ($key==$locale)
	    if ($savingname==true) $name=$val;
	    else $description=$val;
      
	 
      } // for each
      
   drawIcon($linkid, $link, $icon, $fonticon,$name, $description, $file, $type);
   
      
   } catch (Exception $e){
      
      
   }
}

function drawIcon($linkid, $link, $icon, $fonticon, $name, $description, $file,$type){
	//echo (gethostname()."<br>");
	
	if ($_SERVER['SERVER_NAME']==$_SERVER['SERVER_ADDR']){
		// if we are acessing remotely by IP, let's modify link to access fine
		$protocol=explode("//", $link)[0];
		$url=explode("//", $link)[1];
		$link=$protocol."//".$_SERVER['SERVER_ADDR']."/".$url;
		//echo($link);
	}
	
   // echo ("$link"."<br>");
	// check if it is a easy site
	$path=explode("/", $file);
	if (substr($path[count($path)-1],0,5)=="easy-" && $icon=="") $icon="easysite.png";
	
	
	if ($icon!="" && $icon!="easysite.png") echo "<div class='grid-item grid-item--width2 ".$type."' content='link-".$linkid."'>";
	else echo "<div class='grid-item grid-item--width1 $type' >";
	//if ($icon!="" && $icon!="easysite.png") echo "<li data-sizex='2' data-sizey='1' >";
	//else echo "<li data-sizex='1' data-sizey='1' >";
    echo "<div class='linkcontainer flip-container' target='$link' id='link-".$linkid."' ontouchstart=\"this.classList.toggle('hover');\">";
        echo "<div class='flipper'>";
            echo "<div class='front' style='background-image:url(icons/".$icon.")'>";
					  if ($icon=="easysite.png") echo "<div class='linktitle' style='color:#ffffff'>".$name."</div>";
            echo "</div>";
            
            echo "<div class='back' style='background-image:url(icons/".$icon.")'>";
					  echo "<div class='linktitle'>".$name."</div>";
					  echo "<div class='hr'></div>";
                echo "<div class='linkdesc'>".$description."</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
    echo "</div>";
	
     
 
   
   
}



?>
 