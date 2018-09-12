<?php
require_once 'whois.config.php';
require_once 'whois.funcions.php';

$config_current = $config[CONFIG_NAME];
if(array_key_exists('password', $_GET)) {
	if($_GET['password'] != $config_current['cron_password']) die();
} else die();


$domains = $config_current['domains'];

$cache = (array) json_decode(file_get_contents('whois.cache.json'));

foreach($domains as $domain) {
	$changed = false;
	$result = (string) LookupDomain($domain);
	if(array_key_exists($domain, $cache)) {
		$result_old = $cache[$domain];
		if($result != $result_old) {
			$changed = true;
		}
	}
	$cache[$domain] = $result;
	if($changed) {
		if($config_current['log']) {
			$log_str = $domain . " - Domain whois change. NEW WHOIS:\n\r" . $result . "\n\r";
		}
		
		if($config_current['mail']) {
			$mail_body = file_get_contents('whois.mail.tmpl');
			$mail_body = sprintf($mail_body, $result, $result_old);
			$email_to = implode(',', $config_current['emails']);
			mail($email_to, $domain . " - Domain whois change", $mail_body);
		}
		
	} else {
		if($config_current['log']) {
			$log_str = $domain . " - Domain whois not change.\n\r";
		}
	}
	file_put_contents('whois.log', $log_str, FILE_APPEND);
}
file_put_contents('whois.cache.json', json_encode($cache));
