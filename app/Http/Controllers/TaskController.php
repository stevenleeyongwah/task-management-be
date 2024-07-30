<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct() 
    {

    }

    /**
     * Get tasks
     */
    public function getTasks(Request $request) 
    {
        $tasks = Task::all();

        $taskArr = [];
        foreach ($tasks as $task) {
            array_push($taskArr, [
                "id" => $task->id,
                "name" => $task->name,
                "completed" => $task->completed
            ]);
        }

        return $taskArr;
    }

    /**
     * Get tasks
     */
    public function createTask(Request $request) 
    {
        $name = $request->name;

        $task = Task::create([
            "name" => $name
        ]);

        return [
            "id" => $task->id,
            "name" => $task->name,
            "completed" => $task->completed
        ];
    }

    /**
     * Get tasks
     */
    public function markTaskAsCompleted(Request $request, $id) 
    {
        $completed = $request->completed;

        $task = Task::find($id);

        $task->update([
            "completed" => $completed
        ]);

        return [
            "id" => $task->id,
            "name" => $task->name,
            "completed" => $task->completed
        ];
    }
}

