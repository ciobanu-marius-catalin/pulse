<?php

class Doctrine
{
	public $entityManager = null;

	public function __construct() {
		// load database configuration from CodeIgniter
		require_once APPPATH . 'config/database.php';

		require_once APPPATH . '../vendor/autoload.php';

		$paths = array(APPPATH . 'models');
		$isDevMode = true;

		// Database connection information
		$dbParams = array(
			'driver' => 'pdo_mysql',
			'user' =>     $db['default']['username'],
			'password' => $db['default']['password'],
			'host' =>     $db['default']['hostname'],
			'dbname' =>   $db['default']['database']
		);

		$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		$this->entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);
		
	}
}
