<?php

declare( strict_types= 1 );

namespace CatPKT\HttpApiGluer\serializers;

use CatPKT\Encryptor as CE;
use Fenzland\HttpApiGluer as F_;

////////////////////////////////////////////////////////////////

class Encryptor extends F_\serializers\ASerializer
{

	/**
	 * Method encode
	 *
	 * @access public
	 *
	 * @param  mixed $data
	 *
	 * @return string
	 */
	public function encode( $data ):string
	{
		return $this->encryptor->encrypt( $data );
	}

	/**
	 * Method decode
	 *
	 * @access public
	 *
	 * @param  string $encoded
	 *
	 * @return mixed
	 */
	public function decode( string$encoded )
	{
		return $this->encryptor->decrypt( $data );
	}

	/**
	 * Constructor
	 *
	 * @access public
	 *
	 * @param  CE\IEncryptor $encryptor
	 */
	public function __construct( CE\IEncryptor$encryptor )
	{
		$this->encryptor= $encryptor;
	}

	/**
	 * Var encryptor
	 *
	 * @access protected
	 *
	 * @var    Encryptor
	 */
	protected $encryptor;

}
