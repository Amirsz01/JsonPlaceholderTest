<?php

use Amirsz\JsonPlaceholder\JsonPlaceholder;

require 'vendor/autoload.php';

$json = new JsonPlaceholder();

try {

    $users = $json->getUsers();

    $posts = $json->getPostsByUser(current($users)['id']);

    $todos = $json->getTodosByUser(current($users)['id']);

    $result = $json->addPost([
        "title" => 'foo',
        "body" => 'bar',
        "userId" => 1,
    ]);

    $result = $json->updatePost(1, [
        "title" => 'foo',
        "body" => 'bar',
        "userId" => 1,
    ]);

    $json->deletePost(1);

} catch (\Throwable $throwable) {
    echo $throwable->getMessage();
}
