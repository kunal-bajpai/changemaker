<?php
class Log{
protected static $logFile=LOG_FILE;
public static function log_action($action)
{
	global $session;
	$user=$session->logged_in_user();
	file_put_contents(static::$logFile,strftime("%Y/%d/%m %H:%M:%S",time()+TIME_DIFF)." ".$user->user.": ".$action."<br/>\r\n",FILE_APPEND);
}

public static function show_logs()
{
	return file_get_contents(static::$logFile);
}

public static function clear_logs()
{
	global $session;
	$user=$session->logged_in_user();
	file_put_contents(static::$logFile,strftime("%Y/%d/%m %H:%M:%S",time()+TIME_DIFF)." ".$user->user.": Logs cleared.<br/>\r\n");
}

}
?>