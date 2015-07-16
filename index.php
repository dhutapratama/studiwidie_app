<?php
	switch ($_SERVER['HTTP_HOST']) {
		case 'localhost':
			define('ENVIRONMENT', 'development');
			$application_folder = 'web_app';
			break;

		case 'studiwidie.app':
			define('ENVIRONMENT', 'development');
			$application_folder = 'web_app';
			break;

		case 'studiwidie.com':
			define('ENVIRONMENT', 'testing');
			$application_folder = 'web_app';
			break;

		case 'api.localhost':
			define('ENVIRONMENT', 'development');
			$application_folder = 'mobile_app';
			break;

		case 'api.studiwidie.app':
			define('ENVIRONMENT', 'development');
			$application_folder = 'mobile_app';
			break;

		case 'api.studiwidie.com':
			define('ENVIRONMENT', 'testing');
			$application_folder = 'mobile_app';
			break;
		
		default:
			define('ENVIRONMENT', 'production');
			break;
	}
	

	if (defined('ENVIRONMENT'))
	{
		switch (ENVIRONMENT)
		{
			case 'development':
				error_reporting(E_ALL);
			break;
		
			case 'testing':
			case 'production':
				error_reporting(0);
			break;

			default:
				exit('The application environment is not set correctly.');
		}
	}

	$system_path = 'ci_system';
	date_default_timezone_set('Asia/Jakarta');

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter.php';

/* End of file index.php */
/* Location: ./index.php */