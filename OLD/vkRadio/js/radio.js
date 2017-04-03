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
        error: function (event) {
          //если трек не существует, то мы принимаем условие ошибки и запускаем следующий пока не найдем работающий трек
         if(!!event.jPlayer.error.type){
           var data = $.ajax({
              url: "song.php",
              async: false
             }).responseText;
            
            var string = data.split('|');
            $(this).jPlayer("setMedia", {
                mp3: string[0]
            }).jPlayer("play");
         }
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
        swfPath: "/",
        supplied: "mp3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });