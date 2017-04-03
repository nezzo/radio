<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    

    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="js/radio.js"></script>
    <script src="https://yastatic.net/share2/share.js" async="async"></script>
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?143"></script>

    <script type="text/javascript">
      VK.init({apiId: 5959378, onlyWidgets: true});
    </script>

<div class="container-fluid">    
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div class="row">
  <div class="col-md-12">
   <div class="col-md-8">
   <div class="image_player">
  <img src="image/anime.jpg" />
  </div>
      <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
      <div class="jp-type-single">
	<div class="jp-gui jp-interface">
	  <div class="jp-volume-controls">
	    <button class="jp-mute" role="button" tabindex="0">mute</button>
	    <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
	    <div class="jp-volume-bar">
	      <div class="jp-volume-bar-value"></div>
	    </div>
	  </div>
	  <div class="jp-controls-holder">
	    <div class="jp-controls">
	      <button class="jp-play" role="button" tabindex="0">play</button>
	      <button class="jp-stop" role="button" tabindex="0">stop</button>
	    </div>
	    <div class="jp-progress">
	      <div class="jp-seek-bar">
		<div class="jp-play-bar"></div>
	      </div>
	    </div>
      </div>
	</div>
	<div class="jp-details">
	  <div class="jp-title" aria-label="title">&nbsp;</div>
	</div>
	<div class="jp-no-solution">
	  <span>Update Required</span>
	  To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
	</div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="widget_group">
      <!-- VK Widget -->
      <div id="vk_groups"></div>
      <script type="text/javascript">
      VK.Widgets.Group("vk_groups", {mode: 3}, 144066405);
      </script>
    </div>
  </div>
</div>

</div>
<div class="row">
  <div class="col-md-12">
     <div class="shar">
      <div class="text_sharing"><p>Понравилось приложение ? поделитесь с друзьями:)</p></div>
      <div class="ya-share2 sharing" data-services="vkontakte,twitter,facebook,gplus,blogger,linkedin,odnoklassniki,telegram" data-counter></div>
    </div>
    <!-- Put this div tag to the place, where the Comments block will be -->
    <div id="vk_comments"></div>
    <script type="text/javascript">
    VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
    </script>
  </div>
</div>

</div>

