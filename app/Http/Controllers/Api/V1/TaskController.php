<?php

namespace App\Http\Controllers\Api\V1;

use App\Action\Api\V1\TaskFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\StoreRequest;
use App\Http\Requests\Api\Task\UpdateRequest;
use App\Http\Resources\Api\TaskResource;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskFilter $filter):array
    {
        return TaskResource::collection($filter->handle())->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): TaskResource
    {
        $task = Task::query()->create($request->validated());
        $task = $task->fresh();
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Task $task): TaskResource
    {
        $task->update($request->validated());
        $task = $task->fresh();
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
