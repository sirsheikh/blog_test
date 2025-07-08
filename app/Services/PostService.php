<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function __construct(private Post $post)
    {
    }

    public function getList(): array|Collection
    {
        return $this->post->orderByDesc("created_at")->get();
    }

    public function getById($id): array|Collection|Post
    {
        return $this->post->findOrFail($id);
    }

    public function store(array $data): array|Collection|Post
    {
        return $this->post->create($data);
    }
}
