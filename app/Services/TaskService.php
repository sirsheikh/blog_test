<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function __construct(private Task $task)
    {
    }

    public function getList(): array|Collection
    {
        return $this->task->orderByDesc("created_at")->get();
    }

    public function update($id,bool $isCompleted): array|Collection|Task
    {
        $data = $this->task->findOrFail($id);
        $data->update(['is_completed' => $isCompleted]);
        return $data;
    }

    public function store(array $data): array|Collection|Task
    {
        return $this->task->create([
            'title' => $data['title'],
            'is_completed' => $data['is_completed'] ?? false,
        ]);
    }
}
