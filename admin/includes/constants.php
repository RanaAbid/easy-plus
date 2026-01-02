<?php
$sys_env = "production"; //development, production
$protocol = "https://";//   https:// or http://
$web_dir = "";
$url = $_SERVER['SERVER_NAME'];
$url_arr_2 = explode(".",$url);
$app = $url_arr_2[0];
if (strpos($app, 'localhost') !== false or strpos($app, '127.0.0.1') !== false) {
  $sys_env = "development"; //development, production
  $protocol = "http://";//   https:// or http://
  $web_dir = "projects/easy-plus-u/admin/";
}
$actual_url = $protocol.$url;
$app_path = $protocol . $_SERVER['HTTP_HOST'] . "/".$web_dir;
$root_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $web_dir;
date_default_timezone_set('Europe/London');

?>