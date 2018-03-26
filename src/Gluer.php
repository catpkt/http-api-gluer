<?php

declare( strict_types= 1 );

namespace CatPKT\HttpApiGluer;

use CatPKT\Encryptor as CE;
use Fenzland\HttpApiGluer as F_;
use Fenzland\DataParser\Transformer;

////////////////////////////////////////////////////////////////

class Gluer extends F_\Gluer
{

	/**
	 * Static method make_
	 *
	 * @static
	 * @access public
	 *
	 * @param  string $url
	 * @param  string $method
	 * @param  array  $request_transformer_meta
	 * @param  array  $response_transformer_meta
	 * @param  string $request_content_type
	 * @param  string $response_content_type
	 * @param  string $encrypt_key
	 *
	 * @return parent
	 */
	static public function make_(
		string $url
	,
		string $method
	,
		array  $request_transformer_meta
	,
		array  $response_transformer_meta
	,
		string $request_content_type
	,
		string $response_content_type= null
	,
		string $encrypt_key= null
	,
		string $encrypt_method= null
	):parent
	{
		return new static(
			$url
		,
			$method
		,
			Transformer::make_( $request_transformer_meta )
		,
			Transformer::make_( $response_transformer_meta )
		,
			$request_content_type
		,
			$response_content_type??$request_content_type
		,
			new CE\Encryptor( ...array_filter( [ $encrypt_key, $encrypt_method, ] ) )
		);
	}

	/**
	 * Static method make_
	 *
	 * @access public
	 *
	 * @param  string      $url
	 * @param  string      $method
	 * @param  Transformer $request_transformer
	 * @param  Transformer $response_transformer
	 * @param  string      $request_content_type
	 * @param  string      $response_content_type
	 */
	public function __construct(
		string         $url
	,
		string         $method
	,
		Transformer    $request_transformer
	,
		Transformer    $response_transformer
	,
		string         $request_content_type
	,
		string         $response_content_type= null
	,
		?CE\IEncryptor $encryptor= null
	)
	{
		$this->url=                   $url;
		$this->method=                $method;
		$this->request_transformer=   $request_transformer;
		$this->response_transformer=  $response_transformer;
		$this->request_content_type=  $request_content_type;
		$this->response_content_type= $response_content_type??$request_content_type;

		if( $encryptor ) $this->registerSerializer( 'catpkt/encryptor-php', new serializers\Encryptor( $encryptor ) );
	}

}
