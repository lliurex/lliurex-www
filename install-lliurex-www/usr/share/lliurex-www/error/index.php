    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="" />
	<meta name="description" content="" />
	<title>LliureX Server</title>
	<LINK REL=StyleSheet HREF="http://error/css/base.css" TYPE="text/css">
</head>

<body >
	<?php
	$source=$_GET['source'];
	switch ($source){
		case "lliurexguard":
			$clientaddr=$_GET['clientaddr'];
			$clientname=$_GET['clientname'];
			$clientuser=$_GET['clientuser'];
			$targetgroup=$_GET['targetgroup'];
			$url=$_GET['url'];
			$error="prohibido";
			$mostrar="<div><center><h1 class='titol'><u>LliurexGuard</u> </h1></center></div><div class='text'><h2>Categoria: <a class='categoria'> ".$targetgroup."</a><br>Lloc bloquejat:<a class='url'> ".$url." </a></h2></div><center><div><img src='http://error/images/valentinguard.png''' /></div></center>";
			
		break;

		case "squid":
			print "page not found";
		break;
		default:
		$mostrar="<div><center><h1 class='titol'>Error no definit<br>Contacta amb l'administrador</h1></center></div>";
		
	}

         //print "source:".$source."; ip:".$clientaddr."; nom:".$clientname."; user:".$clientuser."; grup:".$targetgroup.";url".$url;
	print $mostrar;
	?>
</body>
</html>
