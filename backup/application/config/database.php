<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

$origin_url = $_SERVER['HTTP_HOST'];
switch ($origin_url) {
	case 'studiwidie.app':
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'z';
		$db['default']['password'] = 'z';
		$db['default']['database'] = 'zadmin_studiwidie';
		break;
	
	default:
		# code...
		break;
}

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */