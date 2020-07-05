jQuery(document).ready(function( $ ) {

    if (typeof Notification !== "undefined" ) {
      Notification.requestPermission().then(function (result) {
        if (result === 'denied') {
          console.log('Permission wasn\'t granted. Allow a retry.');
          return;
        }
        if (result === 'default') {
          console.log('The permission request was dismissed.');
          return;
        }

        cronVerifyNotification();
      });
    }

    function cronVerifyNotification() {
        setInterval(function() {
            $.ajax({
                type: 'POST',
                url: url_ajax,
                data: {action: 'handles_admin_notifications_orders'},
                dataType: "json",
                success: function(res) {
                    showNotification(res);
                },
                error: function(error) {
                    console.error('error get notificacao', error);
                }
          });
        
        }, 10000);
    }
    
       
    
    function showNotification(res) {
        if (res.length > 0) {
            let options = {
                body: descricao,
                sound: url_sound_notification
            }
            let n = new Notification(titulo, options);
            n.sound;
            
            $("<audio controls loop class='otm_audio'></audio>").attr({
            'src': url_sound_notification,
            'autoplay': 'autoplay'
            }).appendTo("body");

            n.onclick = function (event) {
              event.preventDefault();
              $('.otm_audio').remove();
            };
            
            n.onclose = function (event) {
                event.preventDefault();
                $('.otm_audio').remove();
            };

            setTimeout(() => {
                $('.otm_audio').remove();
            }, 5000);
        }
    }
  });
  
  
  