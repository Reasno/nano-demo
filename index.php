<?php

use Hyperf\Nano\Factory\AppFactory;
use Hyperf\View\Engine\BladeEngine;
use Hyperf\View\Mode;
use Hyperf\View\RenderInterface;

require_once __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->config([
    'view' => [
        'engine' => BladeEngine::class,
        // 不填写则默认为 Task 模式，推荐使用 Task 模式
        'mode' => Mode::SYNC,
        'config' => [
            'view_path' => BASE_PATH . '/',
            'cache_path' => BASE_PATH . '/',
        ]
    ]
]);
$app->get('/', function (RenderInterface $render) {
    return $render->render('index', ['name' => 'Hyperf']);
});

$app->get('/favicon.ico', function () {
    return '';
});

$app->run();
