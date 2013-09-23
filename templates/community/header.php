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
 
if (!defined("IN_HOLOCMS")) { header("Location: index.php"); exit; }

if(empty($body_id)){
$body_id = "home";
}

?>
<body id="<?php echo $body_id; ?>" class="<?php if(!$logged_in){ echo "anonymous"; } ?> ">
<div id="overlay"></div>

<div id="header-container">
	<div id="header" class="clearfix">
		<h1><a href="index.php"></a></h1>
       <div id="subnavi">
			<div id="subnavi-user">
                            <?php if($logged_in){ ?>
				<ul>
					<li id="myfriends"><a href="#"><span>I miei Amici</span></a><span class="r"></span></li>
					<li id="mygroups"><a href="#"><span>I miei Gruppi</span></a><span class="r"></span></li>
					<li id="myrooms"><a href="#"><span>Le mie Stanze</span></a><span class="r"></span></li>
				</ul>
                            <?php } elseif(!$logged_in){ ?>
                                <div class="clearfix">&nbsp;</div>
                                <p>
				    <a href="client.php" id="enter-hotel-open-medium-link" target="client" onClick="openOrFocusHabbo(this); return false;">Entra nello <?php echo $sitename; ?></a>
                                </p>
                            <?php } ?>
<?php if($online == "online" && $logged_in){ ?>
				    <a href="client.php" id="enter-hotel-open-medium-link" target="client" onClick="openOrFocusHabbo('client.php'); return false;">Entra nello <?php echo $sitename; ?></a>
<?php } elseif($logged_in){ ?>
					<div id="hotel-closed-medium"><?php echo $sitename; ?> è offline</div> 
<?php } ?>
			</div>
        <?php if(!$logged_in){ ?>
            <div id="subnavi-login">
                <form action="index.php?anonymousLogin" method="post" id="login-form">
            		<input type="hidden" name="page" value="<?php echo $pageid; ?>" />
                    <ul>
                        <li>
                            <label for="login-username" class="login-text"><b>Nome <?php echo $shortname; ?></b></label>
                            <input tabindex="1" type="text" class="login-field" name="username" id="login-username" />
		                    <a href="#" id="login-submit-new-button" class="new-button" style="float: left; display:none"><b>Entra</b><i></i></a>
                            <input type="submit" id="login-submit-button" value="Entra" class="submit"/>
                        </li>
                        <li>
                            <label for="login-password" class="login-text"><b>Password</b></label>
                            <input tabindex="2" type="password" class="login-field" name="password" id="login-password" />
                            <input tabindex="3" type="checkbox" name="_login_remember_me" value="true" id="login-remember-me" />
                            <label for="login-remember-me" class="left">Ricorda i miei dati</label>
                        </li>
                    </ul>
                </form>
                <div id="subnavi-login-help" class="clearfix">
                    <ul>
                        <li class="register"><a href="forgot.php" id="forgot-password"><span>Ho dimenticato la pass/ il nome del mio <?php echo $shortname; ?></span></a></li>
                    	<li><a href="register.php"><span>Registrati gratis!</span></a></li>
                    </ul>
                </div>
<div id="remember-me-notification" class="bottom-bubble" style="display:none;">
	<div class="bottom-bubble-t"><div></div></div>
	<div class="bottom-bubble-c">
					Selezionando 'Ricorda i miei dati' il tuo accesso rimarrà attivo fino a quando non cliccherai su 'Esci'. Ti consigliamo di non marcare questa casella se ti sei connesso da un computer pubblico o condiviso. 
	</div>
	<div class="bottom-bubble-b"><div></div></div>
</div>
            </div>
        </div>
		<script type="text/javascript">
			LoginFormUI.init();
			RememberMeUI.init("right");
		</script>
        <?php } else { ?>
            <div id="subnavi-search">
                <div id="subnavi-search-upper">
                <ul id="subnavi-search-links">
                    <li><a href="./iot/go.php" target="habbohelp" onClick="openOrFocusHelp(this); return false">Aiuto</a></li>
					<li><a href="logout.php?reason=site" class="userlink">Esci</a></li>
				</ul>
                </div>
                <form name="tag_search_form" action="user_profile.php" class="search-box clearfix">
					<a id="search-button" class="new-button search-icon" href="#" onClick="$('search-button').up('form').submit(); return false;"><b><span></span></b><i></i></a>					
					<input type="text" name="tag" id="search_query" value="Cerca <?php echo $shortname; ?>.." class="search-box-query search-box-onfocus" style="float: right"/>
				</form>
                <script type="text/javascript">SearchBoxHelper.init();</script>
            </div>
        </div>
        <script type="text/javascript">
		L10N.put("purchase.group.title", "Create a group");
        </script>
        <?php } ?>
<ul id="navi">
        <?php if($pageid > 0 && $pageid < 4 || $pageid == "myprofile" && $logged_in == true){ ?>
        <li class="selected"><strong><?php echo $name; ?></strong><span></span></li>
        <?php } elseif($logged_in == true){ ?>
        <li class=" "><a href="index.php"><?php echo $name; ?></a><span></span></li>
        <?php } elseif($logged_in !== true){ ?>
        <li id="tab-register-now"><a href="register.php" target="_self">Registrati adesso!</a><span></span></li>
        <?php } ?>

        <?php if($pageid == 4 || $pageid > 3  && $pageid < 6 || $pageid == "profile" || $pageid == "com" || $pageid == "8" || $pageid == "forum"){ ?>
        <li class="selected"><strong>Community</strong><span></span></li>
        <?php } else { ?>
        <li class=" "><a href="community.php">Community</a><span></span></li>
        <?php } ?>

<?php if($pageid == 345 || $pageid >346 && $pageid <347){ ?>
<li class="selected"><strong>Radio</strong><span></span></li>
<?php } else { ?>
<li class=" "><a href="radio.php">Radio</a><span></span></li>
<?php } ?>

        <?php if($pageid == 6 || $pageid > 5  && $pageid < 8){ ?>
        <li class="selected"><strong>Crediti</strong><span></span></li>
        <?php } else { ?>
        <li class=" "><a href="credits.php">Crediti</a><span></span></li>
        <?php } ?>

<?php if($pageid == 9 || $pageid > 9 && $pageid < 9){ ?>
<li class="selected"><strong>Badge Shop</strong><span></span></li>
<?php } else { ?>
<li class=" "><a href="badge_shop.php">Distintivi</a><span></span></li>
<?php } ?>


        <?php if($pageid == 801 || $pageid > 800  && $pageid < 802){ ?>
        <li class="selected"><strong>Giochi</strong><span></span></li>
        <?php } else { ?>
        <li class=" "><a href="gamble.php">Giochi</a><span></span></li>
        <?php } ?>


        <?php if($user_rank > 5 && $logged_in == true){ ?>
        <li id="tab-register-now"><a href="housekeeping.php" target="_self"><b>Housekeeping</b></a><span></span></li>
        <?php } ?>
</ul>

	<div id="habbos-online"><div class="rounded"><span><?php echo $online_count; ?> <?php echo $shortname; ?> online</span></div></div>
	</div>
</div>

<div id="content-container">

<div id="navi2-container" class="pngbg">
    <div id="navi2" class="pngbg clearfix">

	<ul>
        <?php if($pageid > 0 && $pageid < 4 || $pageid == "myprofile"){ ?>
                <?php if($pageid == "1"){ ?>
                <li class="selected">
    				Homepage
                <?php } else { ?>
                <li class="">
    				<a href="index.php">Homepage</a>
                <?php } ?>
        		</li>

                <?php if($pageid == "myprofile"){ ?>
                <li class="selected">
    				La mia Pagina
                <?php } else { ?>
                <li class="">
    				<a href="user_profile.php?name=<?php echo $rawname; ?>">La mia Pagina</a>
                <?php } ?>
        		</li>

                <?php if($pageid == "2" && $logged_in){ ?>
                <li class="selected">
    				Impostazioni Account
                <?php } elseif($logged_in){ ?>
                <li class="">
	    			<a href="account.php">Impostazioni Account</a>
                <?php } ?>
    	    	</li>

		<li class="last">
				<a href="club.php"><?php echo $shortname; ?> Club</a>
		</li>
        <?php } else if($pageid == 4 || $pageid > 3  && $pageid < 6 || $pageid == "profile" || $pageid == "com" || $pageid == "8" || $pageid == "forum"){ ?>
                <?php if($pageid == "com"){ ?>
                <li class="selected">
    				Community
                <?php } else { ?>
                <li class=" ">
	    			<a href="community.php">Community</a>
                <?php } ?>
                <?php if($pageid == "4"){ ?>
                <li class="selected">
    				News
                <?php } else { ?>
                <li class=" ">
	    			<a href="news.php">News</a>
                <?php } ?>
                <?php if($pageid == "8"){ ?>
                <li class="selected">
    				Staff
                <?php } else { ?>
                <li class=" ">
	    			<a href="staff.php">Staff</a>
                <?php } ?>
                <?php if($pageid == "forum"){ ?>

<?php } ?>
                <?php if($pageid == "8"){ ?>
                <li class="selected">
    				Richiesta Staff
                <?php } else { ?>
                <li class=" ">
	    			<a href="app.php">Richiesta Staff</a>
                <?php } ?>
                <?php if($pageid == "forum"){ ?>

                <li class="selected">
    				Forum
                <?php } else { ?>
                <li class=" ">
	    			<a href="forum.php">Forum</a>
                <?php } ?>
                <?php if($pageid == "5"){ ?>
                <li class="selected last">
    				Tag
                <?php } else { ?>
                <li class=" last">
	    			<a href="tags.php">Tag</a>
                <?php } ?>
        <?php } else if($pageid == 345 || $pageid == 346|| $pageid == 347 || $pageid == 348){ ?>
                <?php if($pageid == "345"){ ?>
                <li class="selected">
    				Radio
                <?php } else { ?>
                <li class=" ">
	    			<a href="radio.php">Radio</a>
                <?php } ?>
                <?php if($pageid == "346"){ ?>
                <li class="selected">
    				DeeJay
                <?php } else { ?>
                <li class=" ">
	    			<a href="deejay.php">DeeJay</a>
                <?php } ?>
                <?php if($pageid == "347"){ ?>
                <li class="selected">
    				Orari
                <?php } else { ?>
                <li class=" ">
	    			<a href="orari.php">Orari</a>
                <?php } ?>
                <?php if($pageid == "348"){ ?>
                <li class="selected">
    				Dventa un DJ
                <?php } else { ?>
                <li class=" ">
	    			<a href="diventadj.php">Dventa un DJ</a>
                <?php } ?>
        <?php } else if($pageid == "6" || $pageid > 5 && $pageid < 8 || $pageid == "6b"){ ?>
                <?php if($pageid == "6"){ ?>
                <li class="selected ">
    				Crediti
                <?php } else { ?>
                <li class=" ">
	    			<a href="credits.php">Crediti</a>

<?php } ?>
                <?php if($pageid == "Rari"){ ?>
                <li class="selected ">
    				Rari
                <?php } else { ?>
                <li class=" last">
	    			<a href="collect.php">Rari</a>


                <?php } ?>
                <?php if($pageid == "7"){ ?>
                <li class="selected last">
    				<?php echo $shortname; ?> Club
                <?php } else { ?>
                <li class=" last">
	    			<a href="club.php"><?php echo $shortname; ?> Club</a>
                <?php } ?>
        <?php } ?>
    	    	</li>
</ul>

	
	</div>
</div>

<?php if($notify_maintenance){ ?>
<div align="center" style="color: red; background-color: white; border: 1px solid black; padding:2px; width: 75%"><b>Alert:</b> Il sito è momentaneamente Spento!</div>
<?php } ?>