<?php>
/*
some changes
*/
#
$path = '/home/user/ddccffvv/www/google/zend/library';
#
$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once 'Zend/Loader.php';


Zend_Loader::loadClass('Zend_Gdata');

Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_HttpClient');
Zend_Loader::loadClass('Zend_Gdata_Calendar');

$body = filter_input(INPUT_POST, 'Body', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo "<html><head></head><body>";
echo $body;

list($user, $pass, $content) = explode(" ", $body, 3);

$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;

$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);

$gdataCal = new Zend_Gdata_Calendar($client);

$event = $gdataCal->newEventEntry();
$event->content = $gdataCal->newContent($content);
$event->quickAdd = $gdataCal->newQuickAdd('true');
$newEvent = $gdataCal->insertEvent($event);
?>

