<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use App\Services\TaskService;
use Illuminate\Http\Request;
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

    public function store(Request $request): JsonResponse
    {
        return response()->json($this->taskService->store($request->validated()),Response::HTTP_CREATED);
    }
    public function update($id,bool $isCompleted): JsonResponse
    {
        return response()->json($this->taskService->update($id,$isCompleted),Response::HTTP_CREATED);
    }
}
