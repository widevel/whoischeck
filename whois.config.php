<?php
//Password to access through cron
//Example: http://www.example.com/dir/whois.cron.php?password=password
$config['default']['cron_password'] = 'password123'; 
//Email to send notifications
$config['default']['emails'][] = 'johndoe@example.com';
//Domains to check
$config['default']['domains'][] = 'domain.com';
$config['default']['log'] = true; 
$config['default']['mail'] = true; 

define('CONFIG_NAME', 'default'); //Config to load