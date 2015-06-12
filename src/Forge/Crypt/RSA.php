<?php

namespace Forge\Crypt;

use Forge\Crypt\RSA\Config;
use Forge\Crypt\Exception;

class RSA {

	private $config;

	protected $privateKey;
	
	protected $publicKey;

	public function __construct($config = null) {
		
		$this->config = $config;
		if (!$this->config) {
			$this->config = new Config();
		}

		if (!$this->config instanceof Config) {
			throw new Exception('Incorrect config', Exception::STATUS_CODE_400);
		}
	}


	public function create() {
		// Create the private and public key
		$res = openssl_pkey_new($this->config);

		// Extract the private key from $res to $privKey
		openssl_pkey_export($res, $this->privateKey);

		// Extract the public key from $res to $pubKey
		$publicKey = openssl_pkey_get_details($res);
		$this->publicKey = $publicKey['key'];
	}


}