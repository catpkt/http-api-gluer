<?php

require __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CatPKT\HttpApiGluer\Gluer;

////////////////////////////////////////////////////////////////

class Main extends TestCase
{

	/**
	 * Method testMain
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function testMain()
	{
		Gluer::make_(
			'https://web/uner'
		,
			'GET'
		,
			[]
		,
			[]
		,
			'catpkt/encryptor-php'
		,
			'catpkt/encryptor-php'
		,
			'ncntaoherkn,wvt9kna,686a1,h4k14)'
		);
	}

}
