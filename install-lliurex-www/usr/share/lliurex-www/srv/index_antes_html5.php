<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	
	<script type="text/javascript" src="lib/jquery-3.1.1.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/isotope.pkgd.min.js"></script>

	
	<script type="text/javascript" src="js/index.js"></script>
	
	<title>Servidor LliureX</title>
    
</head>
<body>
	
	<div id="headerbg"><div id="header"> </div></div>
	
	<!--div class="col-md-1"></div> <!-- left container -->
	<div class="container" id="mainContainer">
		
		
		<!--div id="main"-->

			<!-- Google Search -->
			<div class="row">
			<div id="search" class="col-md-10 col-md-offset-1">
			<form method="get" class="search-form form-inline" action="http://www.google.com/search" name="search">
				<span class="google"><a href="http://www.google.com">	</a></span>
				<input name="q" value="" x-webkit-speech="" id="sbi" type="search" class="form-control" size="40"/>
				<button id="sbtn" type="submit" class="btn btn-primary">
					<span id="sspan"></span>
					<span class="acchide glyphicon glyphicon-search"></span><span>&nbsp;Busca</span>
				</button>
				<input name="ie" value="UTF-8" type="hidden" />
				<input name="sa" value="Search" type="hidden" />
				<input name="channel" value="fe" type="hidden" />
				<input name="client" value="browser-ubuntu" type="hidden" />
				<input title="search" name="hl" value="en" type="hidden" />
			</form>
			</div> <!-- end Google Search -->
			</div> <!-- row -->
			
			
			<div class="row" style="margin-bottom: 48px;">
				<div class="linkTypeSelector">
					<!--div class="linkTypeIcon" target="*"></div-->
					<?php
					$lang=$_SERVER["HTTP_ACCEPT_LANGUAGE"];
					if (stristr($lang,"es_ES") || stristr($lang,"es") || stristr($lang,"es_ES.UTF-8")  ){
						$admin="Herramientas de administración";
						$links="Enlaces";
						$rsc="Recursos educativos";
					} else{
						$admin="Eines d'administració";
						$links="Enllaços";
						$rsc="Recursos educatius";
						
					}
					echo('
						<div class="linkTypeIcon" i18n="true" target=".admin" style="background-image:url(icons/admin.png)" title="'.$admin.'" data-toggle="tooltip"></div>
						<div class="linkTypeIcon" i18n="true" target=".resources" style="background-image:url(icons/resources.png)" title="'.$rsc.'" data-toggle="tooltip"></div>
						<div class="linkTypeIcon" i18n="true" target=".links" style="background-image:url(icons/links.png)" title="'.$links.'" data-toggle="tooltip"></div>
						');
					?>
				</div>
			</div>
		
		<div id="links" class="row">
			<div class="grid col-md-10 col-md-offset-1" id="linksContainer">
			<?php include_once("getResources.php"); ?>
			<!--?php include_once("getStaticSites.php"); ?-->
			</div>
		
		</div>
		
		<div id="footer" class="row">
			
		</div>
	</div>
	<!--div class="col-md-1"></div> <!-- right container -->
    
    <!--div class="flip-container" ontouchstart="this.classList.toggle('hover');">
	<div class="flipper">
		<div class="front">
            hola
			<!-- front content -- >
		</div>
		<div class="back">
            adios
			<!-- back content -- >
		</div>
	</div>
	</div-->
    
    
    
</body>
</html>