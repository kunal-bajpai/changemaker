var xmlVol;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlVol=new XMLHttpRequest();
	}
	else
    {// code for IE6, IE5
        xmlVol=new ActiveXObject("Microsoft.XMLHTTP");
	}
    window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '514334008665907',                        // App ID from the app dashboard
          status     : true,                                 // Check Facebook Login status
          xfbml      : true                                  // Look for social plugins on the page
        });
        FB.Event.subscribe('auth.authResponseChange', function(response) {
            // Here we specify what we do with the response anytime this event occurs. 
            if (response.status === 'connected' || response.status === 'not_authorized') {
                xmlVol.open('POST',"ajax/volLogin.php",true);
                xmlVol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                FB.api('/me', function(response) {
                        var str='user_id='+response.id;
                        str+='&first_name='+response.first_name;
                        str+='&last_name='+response.last_name;
                        str+='&username='+response.username;
                        str+='&email='+response.email;
                        str+='&birthday='+response.birthday;
                        str+='&gender='+response.gender;
                        str+='&location='+response.location.name;
                      xmlVol.send(encodeURI(str));
                      if(document.getElementById("tellus"))
                        document.getElementById("tellus").style.display='none';
                      document.getElementById("dropDown").innerHTML='<li><a href="">My profile</a></li><li><a href="logout.php">Logout</a></li>';
                      document.getElementById("dropDownLabel").innerHTML='Hi, '+response.first_name+'<b class="caret"></b>';
                });
            } 
            else 
            {
                if(document.getElementById("tellus"))
                    document.getElementById("tellus").style.display='block';
                document.getElementById("dropDown").innerHTML='<li><a data-toggle="modal" href="#NGOModal">NGO</a></li><li><a data-toggle="modal" href="#CorporateModal">Corporate</a></li><li><a data-toggle="modal" href="#VolunteerModal">Volunteer</a></li>';
                document.getElementById("dropDownLabel").innerHTML='Sign in<b class="caret"></b>';
                xmlVol.open('GET',"ajax/logout.php",true);
                xmlVol.send();
            }
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