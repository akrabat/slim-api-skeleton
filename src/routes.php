<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-API-Skeleton '/' route");

    // Render index view
    return $response->withJson(['hello' => 'world']);
});
