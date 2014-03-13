<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    if(isset($_POST['username']))
    {
        $ngo=Ngo::find_by_username($_POST['username']);
        if(isset($ngo))
            echo 0;
        else
            echo 1;
    }
    else
        echo 0;
?>