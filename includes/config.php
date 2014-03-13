<?php
//define constants used later
!defined('SITE_ROOT')?define('SITE_ROOT',$_SERVER['DOCUMENT_ROOT']):NULL;
!defined('LIB_PATH')?define('LIB_PATH',SITE_ROOT.'/includes/'):NULL;
!defined('TIME_DIFF')?define('TIME_DIFF',45000):NULL;
!defined('HOST')?define('HOST','changemaker.db.11956393.hostedresource.com'):NULL;
!defined('USER')?define('USER','changemaker'):NULL;
!defined('PASS')?define('PASS','Ch@ngemaker02'):NULL;
!defined('DB')?define('DB','changemaker'):NULL;
!defined('LOG_FILE')?define('LOG_FILE',LIB_PATH."log.txt"):NULL;
!defined('UPLOAD_DIR')?define('UPLOAD_DIR',SITE_ROOT."/images/"):NULL;
!defined('NGO_LOGIN_PAGE')?define('NGO_LOGIN_PAGE',"index.php/#NGOModal"):NULL;
!defined('CORP_LOGIN_PAGE')?define('CORP_LOGIN_PAGE',"index.php/#CorporateModal"):NULL;
?>