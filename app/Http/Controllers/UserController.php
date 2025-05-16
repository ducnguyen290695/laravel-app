<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userservice;

    public function __construct(UserService $userservice)
    {
        $this->userservice = $userservice;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userservice->all());
    }

    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->userservice->create($request->validated());
        return response()->json($user, 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json($this->userservice->find($id));
    }

    public function update(UserRequest $request, $id): JsonResponse
    {
        $user = $this->userservice->update($id, $request->validated());
        return response()->json($user);
    }

    public function destroy($id): JsonResponse
    {
        $this->userservice->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
