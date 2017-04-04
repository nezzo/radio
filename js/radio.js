$(document).ready(function(){
 
 $("#jquery_jplayer_1").jPlayer({
 
      ready: function () {
          var data = $.ajax({
              url: "song.php",
              async: false
             }).responseText;

         
        var string = data.split('|');
             $(this).jPlayer("setMedia", {
                mp3: string[0],
                title:string[1],
                poster:string[2]
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
      
      //удаляем мертвые ссылки по имени
      $.ajax({
               url : 'song.php',
               type : 'POST',
               dataType:'text',
               data :{
                idDel:string[3]
            },
             success:function(data){
        
           },
             error:function (xhr, ajaxOptions, thrownError){
                console.log(thrownError); //выводим ошибку
            }
              
           });
      
	setTimeout(function(){
	  $(this).jPlayer("setMedia", {
              mp3: string[0],
              title:string[1],
              poster:string[2]
          }).jPlayer("play");
	  
	},2000);
    }
      },
        ended: function (event) {  
            var data = $.ajax({
              url: "song.php",
              async: false
             }).responseText;
            
            var string = data.split('|');
            $(this).jPlayer("setMedia", {
                mp3: string[0],
                title:string[1],
                poster:string[2]
            }).jPlayer("play");
                
             
        },
        
        cssSelectorAncestor: "#jp_container_1",
        swfPath: "/",
        supplied: "mp3",
  //размер картинки
        size: {
            width: "422px",
            height: "422px"
        },
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });