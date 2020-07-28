<?php

// ### Run server ###
// docker run --rm -p 3000:3000 thecodingmachine/gotenberg:6

// ### Install client ###
// composer require php-http/guzzle6-adapter
// composer require thecodingmachine/gotenberg-php-client

require __DIR__.'/../vendor/autoload.php';
use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\OfficeRequest;

$client = new Client('http://localhost:3000', new \Http\Adapter\Guzzle6\Client());
# ... or the following if you want the client to discover automatically an installed implementation of the PSR7 `HttpClient`.
$client = new Client('http://localhost:3000');

$files = [
    DocumentFactory::makeFromPath('document.docx', 'resources/document.docx'),
];
$request = new OfficeRequest($files);
$dest = '../converted/result.jpg';
$client->store($request, $dest);
