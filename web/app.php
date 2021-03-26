<?php
//header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: x-requested-with, Content-Type, origin, authorization, accept, client-security-token");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT, PATCH");
ini_set('display_errors',1);
ini_set('log_errors', 1);
ini_set('error_log',  __DIR__ . '/../config/error_log.txt');
error_reporting(E_ALL);
$baseurl = "/mafacture/back/web/";
require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env' );

require_once( __DIR__ ."/../config/routes.php");
