<?php
//если обращаться на прямую то приложение закрываем (нужны данные)
 if($_GET['api_id'] != 5959378){
    exit();
 }
?> 
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    

    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="js/radio.js"></script>
    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
    <script src="https://yastatic.net/share2/share.js"></script>
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?143"></script>

    <script type="text/javascript">
      VK.init({apiId: 5959378, onlyWidgets: true});
    </script>

<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
  <div class="col-md-8 left_block_player-8">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
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

  <div class="col-md-4 right_block_player-2">
    <div class="widget_group">
      <!-- VK Widget -->
      <div id="vk_groups"></div>
      <script type="text/javascript">
      VK.Widgets.Group("vk_groups", {mode: 3,width: "300", height: "300"}, 144066405);
      </script>
   
    </div>
    <div class="sponsor_group">
      <p>Музыка с групп:</p>
      <ol>
  <li><a href="https://vk.com/clubmusicbesttlt">Клубная музыка | Новинки Музыки 2017</a></li>
  <li><a href="https://vk.com/public_of_music">Клубная музыка</a></li>
  <li><a href="https://vk.com/exp.music3">Музыка</a></li>
  <li><a href="https://vk.com/best_0_0_music">Лучшая Музыка • Новинки 2017</a></li>
  <li><a href="https://vk.com/exclusive_muzic">Новинки Музыки 2017</a></li>
  <li><a href="https://vk.com/zitati_zhizni">В моих наушниках...</a></li>
  <li><a href="https://vk.com/musictrendy">MUSIC TRENDY 2017</a></li>
  <li><a href="https://vk.com/play.music">Музыка</a></li>
      </ol>
    </div>
 </div>
</div>

</div>
 
 
</div>
</div>