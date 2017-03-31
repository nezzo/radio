<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
<head>
    <title>Online radio using jQuery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <link href="dist/skin/blue.monday/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="dist/add-on/jplayer.playlist.min.js"></script>
    <script type="text/javascript" src="dist/jplayer/jquery.jplayer.min.js"></script>
    
 
</head>

<body>
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
        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
        <div class="jp-toggles">
          <button class="jp-repeat" role="button" tabindex="0">repeat</button>
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
    <script type="text/javascript">
    $(document).ready(function(){
 
 $("#jquery_jplayer_1").jPlayer({
         
         ready: function () {
          var data = $.ajax({
              url: "song.php",
              async: false
             }).responseText;
    

          var string = data.split('|');
             $(this).jPlayer("setMedia", {
                mp3: string[0]
            }).jPlayer("play");
        },
        ended: function (event) {  
            var data = $.ajax({
              url: "song.php",
              async: false
             }).responseText;
            
            var string = data.split('|');
            $(this).jPlayer("setMedia", {
                mp3: string[0]
            }).jPlayer("play");
                
             
        },
        
        cssSelectorAncestor: "#jp_container_1",
        swfPath: "/js",
        supplied: "mp3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });
  </script>
</body>

</html>
