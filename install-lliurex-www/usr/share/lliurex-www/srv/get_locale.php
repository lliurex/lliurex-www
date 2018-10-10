<?php

function get_locale() {

  $linea=$_SERVER["HTTP_ACCEPT_LANGUAGE"];
  //echo "locale:".$linea;

  if (stristr($linea,"valencia") || stristr($linea,"ca") || stristr($linea,"qcv")  )
    $locale="valencia";
  else
    $locale="es";

  return $locale;

}
?>
