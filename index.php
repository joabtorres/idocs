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
$route->get("/sobre", "Web@about");

//blog
$route->group("/blog");
$route->get("/", "Web@blog");
$route->get("/p/{page}", "Web@blog");
$route->get("/{uri}", "Web@blogPost");
$route->post("/buscar", "Web@blogSearch");
$route->get("/buscar/{terms}/{page}", "Web@blogSearch");
$route->get("/em/{category}/", "Web@blogCategory");
$route->get("/em/{category}/{page}", "Web@blogCategory");

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

//options
$route->get("/confirma", "Web@confirm");
$route->get("/obrigado/{email}", "Web@success");

//services
$route->get("/termos", "Web@terms");


/**
 * DOCUMENT
 */

$route->group("/documentos");
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
