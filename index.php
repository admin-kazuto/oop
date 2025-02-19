<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
use Dotenv\Dotenv;
require __DIR__ . '/vendor/autoload.php';
// Load biến môi trường từ .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
include __DIR__.'/routes/router.php';

