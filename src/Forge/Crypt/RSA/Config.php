<?php

namespace Forge\Crypt\RSA;


// http://php.net/manual/en/function.openssl-pkey-new.php
class Config {

	protected $digest_alg = 'sha512';

	public function setDigest($value) {
		$this->digest_alg = $value;
		return $this;
	}

	public function getDigest() {
		return $this->digest_alg;
	}
	
	protected $private_key_bits = 4096;

	public function setBits($value) {
		$this->private_key_bits = $value;
		return $this;
	}

	public function getBits() {
		return $this->private_key_bits;
	}

	protected $private_key_type = OPENSSL_KEYTYPE_RSA;

	public function setType($value) {
		$this->private_key_type = $value;
		return $this;
	}

	public function getType() {
		return $this->private_key_type;
	}
}