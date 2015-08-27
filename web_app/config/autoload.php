<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'session');
$autoload['helper'] 	= array('url', 'studiwidie');
$autoload['config'] 	= array();
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'initial', 
							'render', 
							'm_administrator', 
							'm_users',
							'm_mata_pelajaran',
							'm_soal',
							'm_learning',
							'm_log_tryout',
							'm_log_jawaban',
						);
