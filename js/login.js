	var xmlNgo,xmlCorp;
	if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlNgo=new XMLHttpRequest();
        xmlCorp=new XMLHttpRequest();
	}
	else
    {// code for IE6, IE5
        xmlNgo=new ActiveXObject("Microsoft.XMLHTTP");
        xmlCorp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlNgo.onreadystatechange=function()
		{
            if (xmlNgo.readyState==4 && xmlNgo.status==200)
            {
                if(xmlNgo.responseText.charAt(0)=='1')
                {
                    document.getElementById("ngoLoginStatus").innerHTML='';
                    if(window.location.href!='http://www.changemaker.be/index.php')
                        location.reload(true);
                    if(document.getElementById("tellus"))
                        document.getElementById("tellus").style.display='none';
                    document.getElementById("dropDown").innerHTML='<li><a href="">My Profile</a></li><li><a href="logout.php">Logout</a></li>';
                    document.getElementById("dropDownLabel").innerHTML='Hi, '+xmlNgo.responseText.substring(1)+'<b class="caret"></b>';
                    document.getElementById("ngoClose").click();
                }
                else
                {
                    document.getElementById("ngoLoginStatus").style.color='red';
                    if(xmlNgo.responseText=='0')
                        document.getElementById("ngoLoginStatus").innerHTML='Incorrect username/password';
                    else
                        document.getElementById("ngoLoginStatus").innerHTML='An error occured. Please try again.';
                }
            }
        };
    xmlCorp.onreadystatechange=function()
        {
            if (xmlCorp.readyState==4 && xmlCorp.status==200)
            {
                if(xmlCorp.responseText.charAt(0)=='1')
                {   
                    document.getElementById("corpLoginStatus").innerHTML='';
                    if(window.location.href!='http://www.changemaker.be/index.php')
                        location.reload(true);
                    if(document.getElementById("tellus"))
                        document.getElementById("tellus").style.display='none';
                    document.getElementById("dropDown").innerHTML='<li><a href="">My Profile</a></li><li><a href="logout.php">Logout</a></li>';
                    document.getElementById("dropDownLabel").innerHTML='Hi, '+xmlCorp.responseText.substring(1)+'<b class="caret"></b>';
                    document.getElementById("corpClose").click();
                }
                else
                {
                    document.getElementById("corpLoginStatus").style.color='red';
                    if(xmlCorp.responseText=='0')
                        document.getElementById("corpLoginStatus").innerHTML='Incorrect username/password!';
                    else
                        document.getElementById("corpLoginStatus").innerHTML='An error occured. Please try again.';
                }
            }
        };    
    document.getElementById('ngoLogin').onclick= function() {
        if((xmlCorp.readyState!=1 || xmlCorp.readyState!=2 || xmlCorp.readyState!=3) && document.getElementById('ngoUsername').value!=='' && document.getElementById('ngoPassword').value!=='')
        {
            xmlNgo.open('POST','/ajax/ngoLogin.php',true);
            xmlNgo.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlNgo.send('username='+document.getElementById('ngoUsername').value+'&password='+document.getElementById('ngoPassword').value);
            document.getElementById('ngoLoginStatus').innerHTML='Authenticating...';
        }
        return false;
	};
    document.getElementById('corpLogin').onclick= function() {
        if((xmlNgo.readyState!=1 || xmlNgo.readyState!=2 || xmlNgo.readyState!=3) && document.getElementById('corpUsername').value!=='' && document.getElementById('corpPassword').value!=='')
        {
            xmlCorp.open('POST','/ajax/corpLogin.php',true);
            xmlCorp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlCorp.send('username='+document.getElementById('corpUsername').value+'&password='+document.getElementById('corpPassword').value);
            document.getElementById("ngoLoginStatus").style.color='black';
            document.getElementById('corpLoginStatus').innerHTML='Authenticating...';
        }
        return false;
    };