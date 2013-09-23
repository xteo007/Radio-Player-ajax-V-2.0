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

$pagename = "DeeJay";
$pageid = "346";

include('templates/community/subheader.php');
include('templates/community/header.php');

?>
<style>
body#home #column007 {
width:770px;
}
</style>
<div id='container'>
<div id='content'>
<div id='column007' class='column'><div class='habblet-container '>		
<div class='cbb clearfix green '>
<? include('player/config_radio.php'); ?>	
<h2 class='title'>Radio <?php echo $scdef; ?> Hotel</h2>
<p class='credits-countries-select'>
</p>
</div>
</div>
				<script type='text/javascript'>if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
			 

<?php

include('templates/community/footer.php');

?>