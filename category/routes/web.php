<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Routing\RouteCollectorProxy;
    use App\Controllers\CategoryController;

    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->group('/category', function (RouteCollectorProxy $group) {
        $group->get('', [CategoryController::class, 'index']);
        $group->post('', [CategoryController::class, 'create']);
        $group->get('/{id}', [CategoryController::class, 'show']);
        $group->put('/{id}', [CategoryController::class, 'update']);
        $group->delete('/{id}', [CategoryController::class, 'delete']);
    });