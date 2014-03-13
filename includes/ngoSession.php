<?php
    class NgoSession extends Session {
        protected static $userClass='Ngo', $userTable='ngos', $sessionVar='ngoId', $loginPage=NGO_LOGIN_PAGE, $userField='username';
    }
    $ngoSession = new NgoSession();
?>