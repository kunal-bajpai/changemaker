<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if($ngoSession->is_logged_in())
        $ngoSession->logout();
    if($corpSession->is_logged_in())
        $corpSession->logout();
    if($volSession->is_logged_in())
        $volSession->logout();        
?>
<html>
    <body>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '514334008665907',                        // App ID from the app dashboard
          status     : true,                                 // Check Facebook Login status
          xfbml      : true                                  // Look for social plugins on the page
        });
        FB.getLoginStatus( function(response) {
            // Here we specify what we do with the response anytime this event occurs. 
            if (response.status === 'connected' || response.status === 'not_authorized')
                FB.logout(function(response) {window.location=document.referrer;});
            else
                window.location=document.referrer;
        });
        // Additional initialization code such as adding Event Listeners goes here
      };
    
      // Load the SDK asynchronously
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>