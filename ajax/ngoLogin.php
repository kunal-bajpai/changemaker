<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/init.php");
    $user=new Ngo();
    $user->password=$_POST['password'];
    $user->username=$_POST['username'];
        if($user->authenticate())
        {
            $ngoSession->login($user);
            echo '1'.$user->username;
        }
        else
            echo 0;
?>