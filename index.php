<?php
ob_start();
require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), "@");

/**
 * Home ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "HomeController@home");

/**
 * Auth ROUTES
 */
$route->group(null);
$route->get("/entrar", "AuthController@login");
$route->post("/entrar", "AuthController@login");
$route->get("/sair", "AuthController@logout");
$route->get("/recuperar", "AuthController@forget");
$route->post("/recuperar", "AuthController@forget");
$route->get("/recuperar/{code}", "AuthController@reset");
$route->post("/recuperar/resetar", "AuthController@reset");

/**
 * USER ROUTES
 */

$route->get("/usuario/cadastrar", "Web@register");
$route->post("/usuario/cadastrar", "Web@register");

/**
 * COMPANY ROUTES
 */
$route->group(null);
$route->get("/instituicao", "CompanyController@search");
$route->get("/consultar", "CompanyController@search");


/**
 * SECTORS ROUTES
 */
$route->get("/setores", "SectorController@search");

/**
 * DOCUMENTS ROUTES
 */

$route->group("/documento");
$route->get("/novo-registro", "DocumentController@register");
$route->get("/consultar", "DocumentController@search");
$route->get("/consultar/p/{page}", "DocumentController@search");
$route->get("/grafico", "DocumentController@graphic");
$route->get("/status-para-documentos", "DocumentController@graphic");
$route->get("/tipos-de-documentos", "DocumentController@graphic");



/**
 * SECTORS ROUTES
 */

/**
 * ERROR ROUTES [400, 404,405, 501]
 */
$route->namespace("Source\App")->group("/ops");
$route->get("/{errcode}", "ErrorController@error");

/**
 * ROUTE
 */
$route->dispatch();


/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
