<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function __construct(private User $user)
    {
    }

    public function getList(): array|Collection
    {
        return $this->user->orderByDesc("created_at")->get();
    }

    public function getById($id): array|Collection|User
    {
        return $this->user->findOrFail($id);
    }

    public function store(array $data): array|Collection|User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->user->create($data);
    }
}
