<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {
    }
    public function index(): JsonResponse
    {
        return response()->json($this->registerService->getList(),Response::HTTP_OK);
    }

    public function store(StoreRegisterRequest $request): JsonResponse
    {
        return response()->json($this->registerService->store($request->validated()),Response::HTTP_CREATED);
    }
    public function show($id): JsonResponse
    {
        return response()->json($this->registerService->getById($id),Response::HTTP_OK);
    }
}
