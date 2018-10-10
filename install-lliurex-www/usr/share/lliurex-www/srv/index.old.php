<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="lliurex.css" media="screen" />
	<title>Servidor LliureX</title>
        <script type="text/javascript" src="./lib/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="./js/lliurex.js"></script>
	<!--link rel="stylesheet" href="./awesome-font/css/font-awesome.min.css"-->


	<!--style type="text/css">
	</style-->
	<script type="text/javascript">
	//<![CDATA[
	(function focus_search() {
	function search_select(e) {
		if(e.value.length > 0) {
		e.select();
	        }
		e.select();
	}
	
	    sbi = document.getElementById('sbi');
	sbi.focus();
	    search_select(sbi);
	})();
	//]]>
	</script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="lpanel">
				<ul>
					<div class="hdrbutton"><a href="http://lliurex.net"><img id="llxbt" class="btimg" src="imagen/lliurex.jpg"></a></div>
					<div class="hdrbutton"><a href="http://mestreacasa.gva.es"><img id="mestrebt" class="btimg" src="imagen/mestreacasa.jpg"></a></div>
					<div class="hdrbutton"><a href="http://sai.edu.gva.es"><img id="saibt" class="btimg" src="imagen/sai.gif"></a></div>
					
				</ul>
			</div>
		</div>
		<!-- div id="menu">
			< ?php
 		include_once('get_locale.php');
 		include_once 'preg_find.php';
 		//obtener el locale
 		$locale= get_locale();
 		// buscar title
 		$titles = array();
 		$titles = preg_find("/\.title/", "./");
 		foreach ($titles as $title) {
   			$txt="";
   			// comprobamos si no tiene extension "localizada"
   			if ( ereg("\.title$", $title) ) {
      			// lo mostraremos solamente si no existe version especifica para nuestro "locale"
      			$testfile=$title . "." . $locale ;
			    if ( ! is_file( $testfile ) )
         			$txt = file_get_contents($title);
   				// en caso contrario, se muestra sólo si tiene extension para el "locale" actual
   				} elseif ( ereg("\.title." . $locale, $title) ) {
      				$txt = file_get_contents($title);
   				}
   		echo "<span class='pagetitle'>$txt</span>";
 		}
		?>
		</div -->
		
		<div id="content">
		    <div id="search">
			
			<form method="get" class="search-form" action="http://www.google.com/search" name="search">
				<span class="logo"><a href="http://www.google.com">	</a></span>
				<input name="q" value="" x-webkit-speech="" id="sbi" type="search" />
				<button id="sbtn" type="submit">
					<span id="sspan"></span>
					<span class="acchide">Search</span>
				</button>
				<input name="ie" value="UTF-8" type="hidden" />
				<input name="sa" value="Search" type="hidden" />
				<input name="channel" value="fe" type="hidden" />
				<input name="client" value="browser-ubuntu" type="hidden" />
				<input title="search" name="hl" value="en" type="hidden" />
			</form>
			</div>
			
		    <div id="notice">
					
			<div id="links">
				
			<?php include_once("incluyesitios.php"); ?>
			<!--<div class="textbold"><a href="http://lliurex.net">Web de LliureX</a></div>-->

			</div>
					
			<div id="news">
				<div class="newstittle">LliureX News</div>
				<div id="newscontainer"></div>
				<div class="newstittle">LliureX es fácil... si sabes como</div>
				<div id="newscontainerllx_facil"></div>
			</div>
		</div>
	</div>


	<div id="foot">
		<div class="vers">Running Lliurex <?php $vers = shell_exec('lliurex-version'); echo $vers; ?></div>
	</div>
</body>
</html>
