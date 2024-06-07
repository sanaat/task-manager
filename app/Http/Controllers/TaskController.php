<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\tasks\TaskCollection;
use App\Http\Resources\tasks\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
      return response()->json(['response' => ['status' => true, 'data' => new TaskCollection($tasks)]], JsonResponse::HTTP_OK);

    }

    public function store(StoreTaskRequest $request)
    {

        $task = auth()->user()->tasks()->create($request->all());
        return response()->json(['response' => ['status' => true, 'data' => new TaskResource($task)]], JsonResponse::HTTP_CREATED);

    }

    public function show($id)
    {
        $task= Task::find($id);
        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['response' => ['status' => false, 'message' => 'Task not found or you do not have permission to view this task']], 404);
        }
        return response()->json(['response' => ['status' => true, 'data' => new TaskResource($task)]], 200);

    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::find($id);
        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['response' => ['status' => false, 'message' => 'Task not found or you do not have permission to update this task']], 404);
        }

        $task->update($request->all());
        return response()->json(['response' => ['status' => true, 'data' => new TaskResource($task)]], 200);

    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['response' => ['status' => false, 'message' => 'Task not found or you do not have permission to delete this task']], 404);
        }

        $task->delete();
        return response()->json(null, 204);
    }
}
