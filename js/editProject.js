document.getElementById('editProjectForm').onsubmit=function() {

    if(document.getElementById('editProjectName').value==='')
    {
        document.getElementById('editProjectError').innerHTML="Project name is required";
        return false;
    }   

    if(document.getElementById('editProjectFundsAcqd').value==='')
        document.getElementById('editProjectFundsAcqd').value='0';
    if(document.getElementById('editProjectFundsReqd').value==='')
        document.getElementById('editProjectFundsReqd').value='0';
    if(document.getElementById('editProjectVolsAcqd').value==='')
        document.getElementById('editProjectVolsAcqd').value='0';
    if(document.getElementById('editProjectVolsReqd').value==='')
        document.getElementById('editProjectVolsReqd').value='0';

    if(parseInt(document.getElementById('editProjectFundsAcqd').value.replace(',',''))>parseInt(document.getElementById('editProjectFundsReqd').value.replace(',','')))
    {
        document.getElementById('editProjectError').innerHTML="You have more funds than you need. You don't need us :)";
        return false;
    }
    
    if(parseInt(document.getElementById('editProjectVolsAcqd').value.replace(',',''))>parseInt(document.getElementById('editProjectVolsReqd').value.replace(',','')))
    {
        document.getElementById('editProjectError').innerHTML="You have more volunteers than you need. You don't need us :)";
        return false;
    }
    
};