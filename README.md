HTTP API Gluer with Encryptor
================================

Preliminary see: [fenzland/data-parser](https://github.com/Fenzland/data-parser)

## Usage

```bash
composer require catpkt/http-api-gluer
```

Create instance of Gluer.

```php
use Fenzland\HttpApiGluer\Gluer;
use Fenzland\DataParser\Transformer;
use CatPKT\Encryptor\Encryptor

$gluer= new Gluer(
	'https://url'           // URL of API.
,
	'POST'                  // Method of API.
,
	$request_transformer    // instance of Transformer.
,
	$response_transformer   // instance of Transformer.
,
	'catpkt/encryptor-php'  // content type of request
,
	'catpkt/encryptor-php'  // content type of response (optional if same with content type of request)
,
	$encryptor              // instance of Encryptor
);

// or

$gluer= Gluer::make_(
	'https://url/{path_param}'
,
	'POST'
,
	$request_transformer_meta           // meta array of Transformer.
,
	$response_transformer_meta          // meta array of Transformer.
,
	'catpkt/encryptor-php'
,
	'catpkt/encryptor-php'
,
	'encrypt-key--with-32-byte-length'  // encrypt key (optional, but require if using 'catpkt/encryptor-php')
,
	'AES-256-CBC'                       // encrypt method (optional, 'AES-256-CBC' as default)
);

```

Call api.

```php
$result= $gluer->call( $data );
```
