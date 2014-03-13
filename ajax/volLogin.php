<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']))
    {
        if($ngoSession->is_logged_in())
            $ngoSession->logout();
        if($corpSession->is_logged_in())
            $corpSession->logout();
        if(is_array($_POST))
                foreach($_POST as $key=>$value)
                    if($value=='undefined')
                        $_POST[$key]='';
        $vol=Volunteer::find_by_username($_POST['username']);
        if(!isset($vol))
        {
            $vol=new Volunteer();
            $vol->get_values();
            list($month, $day, $year) = explode('/', $_POST['birthday']);
            $vol->birthday=mktime(0,0,0,$month,$day,$year);
            $vol->save();
        }
        $volSession->login($vol);
    }
?>