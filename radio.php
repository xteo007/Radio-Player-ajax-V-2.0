<?php
/*===================================================+
|| # HoloCMS - Website and Content Management System
|+===================================================+
|| # Copyright © 2008 Meth0d. All rights reserved.
|| # http://www.meth0d.org
|+===================================================+
|| # HoloCMS is provided "as is" and comes without
|| # warrenty of any kind. HoloCMS is free software!
|+===================================================*/

$allow_guests = true;

include('core.php');
include('includes/session.php');

$tmp = getContent('mod_staff-enabled');
if($tmp !== "1"){
        header("Location: index.php"); exit;
}

$pagename = "Radio";
$pageid = "345";

include('templates/community/subheader.php');
include('templates/community/header.php');
include('player/config_radio.php');
?>
<style>
body#home #column007 {
width:770px;
}
</style>
<style>
body#home #column006 {
width:540px;
}
</style>
<style>
body#home #column005 {
width:230px;
}
</style>
<div id='container'>
<div id='content'>
<div id='column007' class='column'><div class='habblet-container '>		
<div class='cbb clearfix green '>
	
<h2 class='title'>Radio <?php echo $scdef; ?> Hotel</h2>
<p class='credits-countries-select'>
<?php include('player/index.php'); ?>
</p>
</div>
</div>
<div class='habblet-container '>		
<div class='cbb clearfix green '>
	
<h2 class='title'>Status Radio</h2>
<p class='credits-countries-select'>
<?php include('player/status.php'); ?>
</p>
</div><center>Code by <a href="http://www.sciax2.it/forum/member.php?u=6525">xteo007</a></center>
</div>
</div>

				<script type='text/javascript'>if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
			 

<?php

include('templates/community/footer.php');

?>