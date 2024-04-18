<?php

namespace App\Controllers;

use App\Models\TaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class DeleteTaskController
{
    private TaskModel $model;
    private PhpRenderer $renderer;
        public function __construct(TaskModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

        public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $idToDelete = $args['id'];
        $this->model->deleteTask($idToDelete);
        return $response->withHeader('Location', '/completedTasks')->withStatus(302);
    }

}