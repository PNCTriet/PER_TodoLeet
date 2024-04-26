<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
class TasksController extends Controller
{
    public function index() {
        //$userId = Auth::user()->id;
        $tasks = Task::orderBy('completed_at')
            ->orderBy('id', 'DESC')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
        return view('tasks.index');
    }

    public function create() {
        return view('tasks.create');
    }

    // public function store() {
    //     request()->validate([
    //         'description' => 'required|max:255',
    //     ]);

    //     Task::create([
    //         'description' => request('description'),
    //     ]);

    //     return redirect('/');
    // }

    public function store() {
        // Validate request
        request()->validate([
            'description' => 'required|max:255',
        ]);

        // Lấy id của user đang đăng nhập
        $userId = Auth::user()->id;

        // Tạo task mới với user_id và description từ request
        Task::create([
            'user_id' => $userId,
            'description' => request('description'),
        ]);

        // Chuyển hướng người dùng sau khi thêm task thành công
        return redirect('/');
    }

    public function update($id) {
        $task = Task::where('id', $id)->first();

        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }

    // Delete a task
    public function delete($id) {
        $task = Task::where('id', $id)->first();

        $task->delete();

        return redirect('/');
    }
}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;

// class TasksController extends Controller
// {
//     public function index() {
//         // Lấy tất cả các task của người dùng đang đăng nhập
//         $tasks = auth()->user()->tasks()->orderBy('completed_at')
//             ->orderBy('id', 'DESC')
//             ->get();

//         return view('tasks.index', [
//             'tasks' => $tasks,
//         ]);
//     }

//     public function create() {
//         return view('tasks.create');
//     }

//     public function store() {
//         request()->validate([
//             'description' => 'required|max:255',
//         ]);

//         // Tạo một task mới và liên kết nó với người dùng đang đăng nhập
//         auth()->user()->tasks()->create([
//             'description' => request('description'),
//         ]);

//         return redirect('/');
//     }

//     public function update($id) {
//         $task = Task::where('id', $id)->first();

//         $task->completed_at = now();
//         $task->save();

//         return redirect('/');
//     }

//     // Xóa một task
//     public function delete($id) {
//         $task = Task::where('id', $id)->first();

//         $task->delete();

//         return redirect('/');
//     }
// }


?>