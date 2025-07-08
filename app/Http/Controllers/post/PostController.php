<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }
    public function index(): JsonResponse
    {
        return response()->json($this->postService->getList(),Response::HTTP_OK);
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        return response()->json($this->postService->store($request->validated()),Response::HTTP_CREATED);
    }
    public function show($id): JsonResponse
    {
        return response()->json($this->postService->getById($id),Response::HTTP_OK);
    }
}
