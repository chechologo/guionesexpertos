<?php
	$aviso=$_REQUEST['aviso'];
	$plataforma=$_REQUEST['plataforma'];
	$sintoma=$_REQUEST['sintoma'];
	$soporte1=$_REQUEST['soporte1'];
	$soporte2=$_REQUEST['soporte2'];
	$soporte3=$_REQUEST['soporte3'];
	$soporte4=$_REQUEST['soporte4'];
	$notas=$_REQUEST['notas'];
	
	$aviso="<h3>AVISO:\t".$aviso."</h3>\t\t";
	$plataforma="<b>\nDECOS AFECTADOS</b>:\t".$plataforma;
	$sintoma="\t\t<br><br><b>SINTOMA:\t</b>".$sintoma;
	$marcacion="<b>ESCENARIOS DE MARCACION:</b><br\t\t>
				1. Primera vez que el cliente se comunica por este aviso <font color=\"#0000ff\">SOP PLT</font><br>\t\t
				2. Cliente se ha comunicado en mas de una ocasion por este aviso <font color=\"#0000ff\"> DIS AVF</font>";
	$soporte1="\t\t1. ".$soporte1;
	$soporte="\t\t<br><br><b>PROCESO DE SOPORTE:</b><br>".$soporte1;
	if(!empty($soporte2))
	{
		$soporte2="\t\t<br>2. ".$soporte2;
		$soporte=$soporte.$soporte2;
	}
	if(!empty($soporte3))
	{
		$soporte3="\t\t<br>3. ".$soporte3;
		$soporte=$soporte.$soporte3;
	}
	if(!empty($soporte4))
	{
		$soporte4="\t\t<br>4. ".$soporte4;
		$soporte=$soporte.$soporte4;
	}
	$notas=". Dejar en observacion la nota <font color=\"#ff0700\">".$notas."</font><br><br>";
	$guion=$aviso.$plataforma.$sintoma.$soporte.$notas.$marcacion;

	$fp=fopen("archivos/guion.txt", "w");
	if(!$fp)
	{
		echo"NO se pudo abrir archivo";
	}
	else
	{
		fwrite($fp, $guion);
		fclose($fp);
	}

	// Definimos el nombre de archivo a descargar.
	$filename = "guion.txt";
	// Ahora guardamos otra variable con la ruta del archivo
	$file = "archivos/".$filename;
	// Aquí, establecemos la cabecera del documento
	header("Content-Description: Descargar archivo");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Type: application/force-download");	
	readfile($file);
?>