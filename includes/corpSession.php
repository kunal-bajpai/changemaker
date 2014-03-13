<?php
    class CorpSession extends Session {
        protected static $userClass='Corporate', $userTable='corporates', $sessionVar='corpId', $loginPage=CORP_LOGIN_PAGE, $userField='username';
    }
    $corpSession = new CorpSession();
?>