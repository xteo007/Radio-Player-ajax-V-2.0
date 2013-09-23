<meta http-equiv="Refresh" content="10;url=disco.php">
<style type="text/css">
<!--
body,td,th {
	color: #000000;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>

<div align="center">
<?php include('config_radio.php'); ?>
<?php
$ip = $scip;
$porta = $scport;
$open = fsockopen($ip,$porta); 
if ($open) { 
fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
$read = fread($open,1000); 
$text = explode("content-type:text/html",$read); 
$text = explode(",",$text[1]); 
} else { $er="Il Server Risulta OffLine!"; }  
if ($text[1]==1) { $state = "On Line"; } else { $state = "Off Line"; } 
if ($er) { echo $er; exit; } 
?> <?php
if ($text[1]==0) { print "Nessun DeeJay risurlta OnLine <script>window.open(\"javascript:msg('Radio offline');\", '_parent');</script>"; }  
if ($text[1]==1) { print "<b>$text[6]</b>"; }  
?></div>

</body>

</html>
