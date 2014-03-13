document.getElementById('addProjectForm').onsubmit=function() {
    
    if(document.getElementById('projectName').value==='')
    {
        document.getElementById('projectError').innerHTML="Project name is required";
        return false;
    }   
    
    if(document.getElementById('projectFundsAcqd').value==='')
        document.getElementById('projectFundsAcqd').value='0';
    if(document.getElementById('projectFundsReqd').value==='')
        document.getElementById('projectFundsReqd').value='0';
    if(document.getElementById('projectVolsAcqd').value==='')
        document.getElementById('projectVolsAcqd').value='0';
    if(document.getElementById('projectVolsReqd').value==='')
        document.getElementById('projectVolsReqd').value='0';
        
    if(parseInt(document.getElementById('projectFundsAcqd').value.replace(',',''))>parseInt(document.getElementById('projectFundsReqd').value.replace(',','')))
    {
        document.getElementById('projectError').innerHTML="You have more funds than you need. You don't need us :)";
        return false;
    }
    if(parseInt(document.getElementById('projectVolsAcqd').value.replace(',',''))>parseInt(document.getElementById('projectVolsReqd').value.replace(',','')))
    {
        document.getElementById('projectError').innerHTML="You have more volunteers than you need. You don't need us :)";
        return false;
    }
}