<?php

namespace Amirsz\JsonPlaceholder;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;

class JsonPlaceholder
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com']);
    }

    /**
     * Получить посты пользователя
     * @return mixed
     * @throws GuzzleException
     * @throws \Exception
     * @var int $user
     */
    public function getPostsByUser(int $userId): array
    {
        $response = $this->client->get("/posts", [
            'query' => ['userId' => $userId]
        ]);

        return \json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Получить задания пользователя
     *
     * @return mixed
     * @throws GuzzleException
     * @throws \Exception
     * @var int $user
     */
    public function getTodosByUser(int $userId): array
    {
        $response = $this->client->get("/posts", [
            'query' => ['userId' => $userId]
        ]);

        return \json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Получить всех пользователей
     * @throws GuzzleException
     * @throws \Exception
     */
    public function getUsers(): array
    {
        $response = $this->client->get("/users");

        return \json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Добавить новый пост
     * @throws GuzzleException
     */
    public function addPost(array $post): array
    {
        $response = $this->client->post('/posts', [
            'json' => $post,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Обновить пост
     * @throws GuzzleException
     */
    public function updatePost(int $postId, array $post)
    {
        $response = $this->client->patch("/posts/$postId", [
            'json' => $post,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Удалить пост
     * @throws GuzzleException
     */
    public function deletePost(int $postId): void
    {
        $this->client->delete("/posts/$postId");
    }
}
