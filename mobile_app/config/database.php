<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

switch ($_SERVER['HTTP_HOST']) {
	case 'api.studiwidie.app':
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'z';
		$db['default']['password'] = 'z';
		$db['default']['database'] = 'zadmin_studiwidie';
		break;

	case 'api.studiwidie.com':
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'dhutapra_studiwi';
		$db['default']['password'] = 'mydatabase';
		$db['default']['database'] = 'dhutapra_studiwidie';
		break;

	case 'api.localhost':
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'root';
		$db['default']['password'] = '';
		$db['default']['database'] = 'studiwidie';
		break;
	
	default:
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'root';
		$db['default']['password'] = '';
		$db['default']['database'] = '';
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