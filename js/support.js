window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '514334008665907',                        // App ID from the app dashboard
          status     : true,                                 // Check Facebook Login status
          xfbml      : true                                  // Look for social plugins on the page
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
    var xmlSupport;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlSupport=new XMLHttpRequest();
	}
	else
    {// code for IE6, IE5
        xmlSupport=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlSupport.onreadystatechange=function()
		{
            if (xmlSupport.readyState==4 && xmlSupport.status==200)
            {
                if(xmlSupport.responseText=='1')
                {
                    document.getElementById('support').style.display='none';
                    document.getElementById('unsupport').style.display='block';
                }
                else
                    if(xmlSupport.responseText=='0')
                    {
                        document.getElementById('support').style.display='block';
                        document.getElementById('unsupport').style.display='none';
                    }
            }
        };
    function changeSupport(what,id,action)
    {
        xmlSupport.open('POST','/ajax/support.php',true);
        xmlSupport.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlSupport.send('action='+action+'&id='+id+'&what='+what);
        if(action==1)
        {
            if(what=='ngo')
                var obj={ngo:"http://www.changemaker.be/ngo.php?id="+id};
            if(what=='cause')
                var obj={cause:"http://www.changemaker.be/cause.php?id="+id};
            if(what=='project')
                var obj={project:"http://www.changemaker.be/project.php?id="+id};
             FB.getLoginStatus( function(response) {
                // Here we specify what we do with the response anytime this event occurs. 
                if (response.status === 'connected')
                {
                    FB.api(
                    '/me/changemaker_be:support',
                    'post',
                    obj,
                    function(response) {
                       
                    });
                }
            });
        }
        // Additional initialization code such as adding Event Listeners goes here
      }