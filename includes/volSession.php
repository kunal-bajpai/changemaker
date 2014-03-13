<?php
    class VolSession extends Session {
        protected static $userClass='Volunteer', $userTable='volunteers', $sessionVar='volId', $loginPage=VOL_LOGIN_PAGE, $userField='username';
    }
    $volSession = new VolSession();
?>