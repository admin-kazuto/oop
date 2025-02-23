README.md

Project Dependencies

This project uses the following dependencies managed via Composer:

1. bramus/router

Version: 1.6.1

Description: A lightweight and simple object-oriented PHP Router.

Repository: GitHub

License: MIT

Requirements: PHP >= 5.3.0

Keywords: router, routing

2. eftec/bladeone

Version: 4.17.1

Description: A standalone version of the Blade Template Engine from Laravel.

Repository: GitHub

License: MIT

Requirements: PHP >= 7.4, ext-json

Keywords: blade, php, template, view

Optional: eftec/bladeonehtml for form creation

3. graham-campbell/result-type

Version: v1.1.3

Description: Implementation of the Result Type.

Repository: GitHub

License: MIT

Requirements: PHP >= 7.2.5

Keywords: result type

4. phpoption/phpoption

Version: 1.9.3

Description: Option Type for PHP.

Repository: GitHub

License: Apache-2.0

Requirements: PHP >= 7.2.5

Keywords: language, option, type

Installation

Ensure you have Composer installed, then run:

composer install

Usage

bramus/router

$router = new \Bramus\Router\Router();
$router->get('/', function() {
    echo 'Welcome to the home page!';
});
$router->run();

eftec/bladeone

use eftec\bladeone\BladeOne;
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
echo $blade->run('home', ['name' => 'World']);

License

This project uses open-source libraries under the MIT and Apache-2.0 licenses.

composer dump-autoload
dotenv