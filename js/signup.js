	var xmlNgoSU,xmlCorpSU,ngoUsername=false,corpUsername=false,ngoPassMatch=false,corpPassMatch=false;
	if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlNgoSU=new XMLHttpRequest();
        xmlCorpSU=new XMLHttpRequest();
	}
	else
    {// code for IE6, IE5
        xmlNgoSU=new ActiveXObject("Microsoft.XMLHTTP");
        xmlCorpSU=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlNgoSU.onreadystatechange=function()
		{
            if (xmlNgoSU.readyState==4 && xmlNgoSU.status==200)
            {
                if(xmlNgoSU.responseText=='1')
                {
                    document.getElementById("ngoSignupStatus").style.color='green';
                    document.getElementById("ngoSignupStatus").innerHTML='Username available.';
                    ngoUsername=true;
                }
                else
                {
                    document.getElementById("ngoSignupStatus").style.color='red';
                    document.getElementById("ngoSignupStatus").innerHTML='Username taken. Please choose another one.';
                    ngoUsername=false;
                }
            }
        };
    xmlCorpSU.onreadystatechange=function()
        {
            if (xmlCorpSU.readyState==4 && xmlCorpSU.status==200)
            {
                if(xmlCorpSU.responseText=='1')
                {
                    document.getElementById("corpSignupStatus").style.color='green';
                    document.getElementById("corpSignupStatus").innerHTML='Username available.';
                    corpUsername=true;
                }
                else
                {
                    document.getElementById("corpSignupStatus").style.color='red';
                    document.getElementById("corpSignupStatus").innerHTML='Username taken. Please choose another one.';
                    corpUsername=false;
                }
            }
        };    
    document.getElementById('ngoUsernameSU').onblur= function() {
        if(document.getElementById('ngoUsernameSU').value!=='')
        {
            xmlNgoSU.open('POST','/ajax/ngoUsername.php',true);
            xmlNgoSU.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlNgoSU.send('username='+document.getElementById('ngoUsernameSU').value);
            document.getElementById("ngoSignupStatus").style.color='black';
            document.getElementById('ngoSignupStatus').innerHTML='Checking availability...';
        }
        else
        {
            ngoUsername=false;
            document.getElementById("ngoSignupStatus").style.color='red';
            document.getElementById('ngoSignupStatus').innerHTML='Username required';
        }
	};
    document.getElementById('corpUsernameSU').onblur= function() {
        if(document.getElementById('corpUsernameSU').value!=='')
        {
            xmlCorpSU.open('POST','/ajax/corpUsername.php',true);
            xmlCorpSU.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlCorpSU.send('username='+document.getElementById('corpUsernameSU').value);
            document.getElementById("corpSignupStatus").style.color='black';
            document.getElementById('corpSignupStatus').innerHTML='Checking availability...';
        }
        else
        {
            corpUsername=false;
            document.getElementById("corpSignupStatus").style.color='red';
            document.getElementById('corpSignupStatus').innerHTML='Username required';
        }
    };
    document.getElementById('ngoRepPass').onblur=function() {
        if(document.getElementById('ngoPassSU').value!=='')
            if(document.getElementById('ngoRepPass').value == document.getElementById('ngoPassSU').value)
            {
                ngoPassMatch=true;
                document.getElementById("ngoPassMatch").style.color='green';
                document.getElementById('ngoPassMatch').innerHTML='Passwords matched';
            }
            else
            {
                ngoPassMatch=false;
                document.getElementById("ngoPassMatch").style.color='red';
                document.getElementById('ngoPassMatch').innerHTML='Passwords mismatched';
            }
    }
    document.getElementById('ngoPassSU').onblur=document.getElementById('ngoRepPass').onblur;
    document.getElementById('corpRepPass').onblur=function() {
        if(document.getElementById('corpPassSU').value!=='')
            if(document.getElementById('corpRepPass').value == document.getElementById('corpPassSU').value)
            {
                corpPassMatch=true;
                document.getElementById("corpPassMatch").style.color='green';
                document.getElementById('corpPassMatch').innerHTML='Passwords matched';
            }
            else
            {
                corpPassMatch=false;
                document.getElementById("corpPassMatch").style.color='red';
                document.getElementById('corpPassMatch').innerHTML='Passwords mismatched';
            }
    }
    document.getElementById('corpPassSU').onblur=document.getElementById('corpRepPass').onblur;
    document.getElementById('ngoSignupForm').onsubmit=function() {
        if(!ngoUsername || !ngoPassMatch)
            return false;
        else
            return true;
    }
    document.getElementById('corpSignupForm').onsubmit=function() {
        if(!corpUsername || !corpPassMatch)
            return false;
        else
            return true;
    }