<?php
include('config_radio.php');

$scfp = fsockopen("$scip", $scport, &$errno, &$errstr, 30);
 if(!$scfp) {
  $scsuccs=1;
echo''.$scdef.' is Offline'; 
 }
if($scsuccs!=1){
 fputs($scfp,"GET /admin.cgi?pass=$scpass&mode=viewxml HTTP/1.0\r\nUser-Agent: SHOUTcast Song Status (Mozilla Compatible)\r\n\r\n");
 while(!feof($scfp)) {
  $page .= fgets($scfp, 1000);
 }
######################################################################################################################
/////////////////////////part 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//define  xml elements
 $loop = array("STREAMSTATUS", "BITRATE", "SERVERTITLE", "CURRENTLISTENERS", "MAXLISTENERS", "BITRATE");
 $y=0;
 while($loop[$y]!=''){
  $pageed = ereg_replace(".*<$loop[$y]>", "", $page);
  $scphp = strtolower($loop[$y]);
  $$scphp = ereg_replace("</$loop[$y]>.*", "", $pageed);
  if($loop[$y]==SERVERGENRE || $loop[$y]==SERVERTITLE || $loop[$y]==SONGTITLE || $loop[$y]==SERVERTITLE)
   $$scphp = urldecode($$scphp);

// uncomment the next line to see all variables
//echo'$'.$scphp.' = '.$$scphp.'<br>';
  $y++;
 }
//end intro xml elements
######################################################################################################################
######################################################################################################################
/////////////////////////part 2\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//get song info and history
 $pageed = ereg_replace(".*<SONGHISTORY>", "", $page);
 $pageed = ereg_replace("<SONGHISTORY>.*", "", $pageed);
 $songatime = explode("<SONG>", $pageed);
 $r=1;
 while($songatime[$r]!=""){
  $t=$r-1;
  $playedat[$t] = ereg_replace(".*<PLAYEDAT>", "", $songatime[$r]);
  $playedat[$t] = ereg_replace("</PLAYEDAT>.*", "", $playedat[$t]);
  $song[$t] = ereg_replace(".*<TITLE>", "", $songatime[$r]);
  $song[$t] = ereg_replace("</TITLE>.*", "", $song[$t]);
  $song[$t] = urldecode($song[$t]);
  $dj[$t] = ereg_replace(".*<SERVERTITLE>", "", $page);
  $dj[$t] = ereg_replace("</SERVERTITLE>.*", "", $pageed);
$r++;
 }
//end song info
fclose($scfp);
}

//display stats
$temp = $_GET[temp];
if ($temp == 'info') {
	if($streamstatus == "1"){
	//you may edit the html below, make sure to keep variable intact
	echo'<center><font face="Verdana" size="2"><b>DJ</b></font>
	<br />
	<font face="Verdana" size="2">'.$servertitle.'<br>
	<b>Ascoltatori</b></font>
	<br />
	<font face="Verdana" size="2">'.$currentlisteners.' / '.$maxlisteners.'<br>
	<b>Velocita</b></font>
	<br />
	<font face="Verdana" size="2">'.$bitrate.'kbps</font></center>';
	}
	if($streamstatus == "0")
	{
	//you may edit the html below, make sure to keep variable intact
	echo'<center><font face="Verdana" size="2"><b>DJ</b></font>
	<br />
	<font face="Verdana" size="2">No DJ<br>
	<b>Ascoltatori</b></font>
	<br />
	<font face="Verdana" size="2">0 / '.$maxlisteners.'<br>
	<b>Velocita</b></font>
	<br />
	<font face="Verdana" size="2">'.$bitrate.'kbps</font></center>';
	}
} else if ($temp == 'song') {
	if($streamstatus == "1"){
	//you may edit the html below, make sure to keep variable intact
	echo'<font face="Verdana" size="2"><span class="boldtype2">Avete ascoltato</span></font><br />
	1) <font face="Verdana" size="2"><span class="boldtype3">'.$song[1].'</span></font><br />
	2) <font face="Verdana" size="2"><span class="boldtype3">'.$song[2].'</span></font><br />
	3) <font face="Verdana" size="2"><span class="boldtype3">'.$song[3].'</span></font><br />
	4) <font face="Verdana" size="2"><span class="boldtype3">'.$song[4].'</span></font>';
	
	}
	if($streamstatus == "0")
	{
	//you may edit the html below, make sure to keep variable intact
	echo'<font face="Verdana" size="2"><span class="boldtype2">Avete ascoltato</span></font><br />
	1) <font face="Verdana" size="2"><span class="boldtype3">'.$song[1].'</span></font><br />
	2) <font face="Verdana" size="2"><span class="boldtype3">'.$song[2].'</span></font><br />
	3) <font face="Verdana" size="2"><span class="boldtype3">'.$song[3].'</span></font><br />
	4) <font face="Verdana" size="2"><span class="boldtype3">'.$song[4].'</span></font>';
	}
} else if ($temp == 'st') {
	if($streamstatus == "1"){
	//you may edit the html below, make sure to keep variable intact
	echo'on';
	}
	if($streamstatus == "0")
	{
	//you may edit the html below, make sure to keep variable intact
	echo'off';
	}
} else if ($temp == 'songa') {
	if($streamstatus == "1"){
	//you may edit the html below, make sure to keep variable intact
	echo'<font face="Verdana" size="2"><span class="boldtype2">Avete ascoltato</span></font><br />
	1) <font face="Verdana" size="2"><span class="boldtype3">'.$song[1].'</span></font><br />
	2) <font face="Verdana" size="2"><span class="boldtype3">'.$song[2].'</span></font>';	
	}
	if($streamstatus == "0")
	{
	//you may edit the html below, make sure to keep variable intact
	echo'<font face="Verdana" size="2"><span class="boldtype2">Avete ascoltato</span></font><br />
	1) <font face="Verdana" size="2"><span class="boldtype3">'.$song[1].'</span></font><br />
	2) <font face="Verdana" size="2"><span class="boldtype3">'.$song[2].'</span></font>';
	}
} else { echo 'ID Template non valida !!!'; }
?>
