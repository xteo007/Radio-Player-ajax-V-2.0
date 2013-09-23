<?php include('config_radio.php'); ?>
<script src="ajax_var.js" language="javascript" type="text/javascript"></script>
<script src="ajax_inc.js" language="javascript" type="text/javascript"></script>
<script>
function play(type) {
var w = 310;
var wmurl = 'ascolta.asx'; //Windows Media Player
var rpurl = 'http://<?php echo $scip; ?>:<?php echo $scport; ?>/'; // QuickTime Player
var qturl = 'http://<?php echo $scip; ?>:<?php echo $scport; ?>/'; // Real Player
var frpurl = 'playlist.xml'; //  Flash Radio Player
var swfurl = 'wimpy/wimpy.swf';
var bg = 'FFFFFF';
var skins = 'skins.xml';
	if( type == 'wm' ) { //Windows Media Player
	document.getElementById("radioplayer").innerHTML = '<object id="NSPlay1" width="'+w+'" height="26" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject"><param name="FileName" value="'+wmurl+'"><param name="ShowControls" value="1"><param name="ShowPositionControls" value="0"><param name="ShowAudioControls" value="1"><param name="ShowTracker" value="0"><param name="ShowDisplay" value="0"><param name="ShowStatusBar" value="0"><param name="ShowGotoBar" value="0"><param name="ShowCaptioning" value="0"><param name="AutoStart" value="1"><param name="AnimationAtStart" value="1"><param name="TransparentAtStart" value="0"><param name="AllowChangeDisplaySize" value="0"><param name="AllowScan" value="0"><param name="EnableContextMenu" value="0"><param name="ClickToPlay" value="0"><param name="Volume" value="0"><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" src="'+wmurl+'" width="'+w+'" height="26"  showcontrols="1" showpositioncontrols="0" showaudiocontrols="1" showtracker="0" showdisplay="0" showstatusbar="0" showgotobar="0" showcaptioning="0" autostart="1" animationatstart="1" transparentatstart="0" allowchangedisplaysize="0" allowscan="0" enablecontextmenu="0" clicktoplay="0" volume="0" name="NSPlay1"></embed> </object>';
	} else if( type == 'qt' ) { // QuickTime Player
	document.getElementById("radioplayer").innerHTML = '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="'+w+'" height="16" codebase="http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0" style="background-color:#000000;"><param name="controller" value="true"><param name="type" value="video/quicktime"><param name="autoplay" value="true"><param name="src" value="'+qturl+'"><param name="pluginspage" value="http://www.apple.com/quicktime/download/indext.html"><embed src="'+qturl+'" width="'+w+'" height="16" autoplay="true" controller="true" pluginspage="http://www.apple.com/quicktime/download/indext.html" target="myself" type="video/quicktime"></embed></object>';
	} else if( type == 'frp' ) { //  Flash Radio Player
	document.getElementById("radioplayer").innerHTML = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,47,0" width="200" height="16" id="wimpy3178"><param name="allowScriptAccess" value="always" /><param name="movie" value="'+swfurl+'" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="noscale" /><param name="salign" value="lt" /><param name="bgcolor" value="'+bg+'" /><param name="flashvars" value="wimpyApp='+frpurl+'&wimpySkin='+skins+'&startPlayingOnload=yes" /><embed src="'+swfurl+'" flashvars="wimpyApp='+frpurl+'&wimpySkin='+skins+'&startPlayingOnload=yes" loop="false" menu="false" quality="high" width="200" height="16" scale="noscale" salign="lt" name="wimpy3178" align="center" bgcolor="'+bg+'" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /> </object>';
	} else if( type == 'rp' ) { // Real Player
	document.getElementById("radioplayer").innerHTML = '<object classid="CLSID:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" width="'+w+'" height="25" id="RVOCX"><param name="SRC" value="'+rpurl+'" ref /><param name="AUTOSTART" value="-1" /><param name="CONTROLS" value="ControlPanel" /><param name="CONSOLE" value="cons" /><param name="SHUFFLE" value="0"><param name="PREFETCH" value="0"><param name="NOLABELS" value="0"><param name="LOOP" value="0"><param name="NUMLOOP" value="0"><param name="CENTER" value="0"><param name="MAINTAINASPECT" value="0"><param name="BACKGROUNDCOLOR" value="#000000"><embed src="'+rpurl+'" type="audio/x-pn-realaudio-plugin" width="'+w+'" height="28" autostart="true" controls="ControlPanel" console="cons"> </embed> </object>';
	} else { // Real Player ( PREDEFINITO )
	document.getElementById("radioplayer").innerHTML = '<object classid="CLSID:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" width="'+w+'" height="25" id="RVOCX"><param name="SRC" value="'+rpurl+'" ref /><param name="AUTOSTART" value="-1" /><param name="CONTROLS" value="ControlPanel" /><param name="CONSOLE" value="cons" /><param name="SHUFFLE" value="0"><param name="PREFETCH" value="0"><param name="NOLABELS" value="0"><param name="LOOP" value="0"><param name="NUMLOOP" value="0"><param name="CENTER" value="0"><param name="MAINTAINASPECT" value="0"><param name="BACKGROUNDCOLOR" value="#000000"><embed src="'+rpurl+'" type="audio/x-pn-realaudio-plugin" width="'+w+'" height="28" autostart="true" controls="ControlPanel" console="cons"> </embed> </object>';
	}
}
function msg(txt) {
document.getElementById("radioplayer").innerHTML = '<p align="center" style="margin-top: 0; margin-bottom: 0"><b><font face="Verdana" size="1" color="#000000">'+txt+'</font></b></p>';
}
</script>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table73">
				<tr>
					<td width="313">
					<div align="center">
						<div align="center">
							<div id="radioplayer">
								<p align="center" style="margin-top: 0; margin-bottom: 0">
								<b>
								<font face="Verdana" size="1">Caricamento 
								player</font></b></p>
							</div>
						</div>
					</div>
					</td>
					<td width="128">
					<table border="0" cellpadding="0" cellspacing="0" width="140" id="table74">
						<tr align="center">
							<td width="35">
							<a href="http://<?php echo $scip; ?>:<?php echo $scport; ?>/listen.pls">
							<img border="0" src="ico_winamp0001.jpg" width="32" height="32" style="display: block"></a></td>
							<td width="35">
							<a onclick="play('rp');return false;" href="#">
							<img border="0" src="realplay.jpg" width="32" height="32" style="display: block"></a></td>
							<td width="35">
							<a onclick="play('wm');return false;" href="#">
							<img border="0" src="ico_wmplayer0001.jpg" width="32" height="32" style="display: block"></a></td>
							<td width="35">
							<a onclick="play('frp');return false;" href="#">
							<img border="0" src="ico_player0001.jpg" width="32" height="32" style="display: block"></a></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td>
            <div id="songa"></div>
            <script type="text/javascript">
            function songa() {
            ajaxinclude("stats.php?temp=songa","songa")
            setTimeout('songa()',90000);
            }
            songa();
            </script>
                    </td>
                </tr>
            </table>
<script>
function cattura_url() {
   var tmp = (location.search.substring(1));
   blocco = tmp.split("&");
   for (i=0;i<blocco.length;i++) {
	   briciola=blocco[i].split("=");
		   if ( briciola[0] == 'type') {
			   type = briciola[1];
			   play(type);
		   } else {
			   play('frp');
		   }
   }
}
cattura_url();
function st() {
st = ajaxvalure('stats.php?temp=st','');
	if (st == 'off') {
	alert('msg');
	msg('Radio offline');
	}
	setTimeout('st()',10000);
}
st();
</script>
			