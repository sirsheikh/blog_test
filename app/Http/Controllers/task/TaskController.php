<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }
    public function index(): JsonResponse
    {
        return response()->json($this->taskService->getList(),Response::HTTP_OK);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        return response()->json($this->taskService->store($request->validated()),Response::HTTP_CREATED);
    }
    public function update($id,UpdateTaskRequest $request): JsonResponse
    {
        return response()->json($this->taskService->update($id,$request->validated()),Response::HTTP_CREATED);
    }
}
