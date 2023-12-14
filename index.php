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
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "Web@home");

//auth
$route->group(null);
$route->get("/entrar", "Web@login");
$route->post("/entrar", "Web@login");
$route->get("/cadastrar", "Web@register");
$route->post("/cadastrar", "Web@register");
$route->get("/recuperar", "Web@forget");
$route->post("/recuperar", "Web@forget");
$route->get("/recuperar/{code}", "Web@reset");
$route->post("/recuperar/resetar", "Web@reset");

/**
 * COMPANY ROUTES
 */
$route->group("/instituicao");
$route->get("/consultar", "Company@search");

/**
 * DOCUMENT ROUTES
 */

$route->group("/documento");
$route->get("/novo-registro", "Document@register");
$route->get("/buscar", "Document@search");
$route->get("/buscar/p/{page}", "Document@search");


/**
 * ERROR ROUTES [400, 404,405, 501]
 */
$route->namespace("Source\App")->group("/ops");
$route->get("/{errcode}", "Web@error");

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
