<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index(Request $request)
    {
        //TODO The primary purpose of when is to conditionally add constraints to the query. In this case it checks if the 'q' parameter exists in the request
        $users = User::when($request->has('q'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('email', 'like', '%' . $request->q . '%')
                ->orWhere('mobile', 'like', '%' . $request->q . '%');
        })->paginate(10);

        return view('users.usersList', compact('users'));
    }


    function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        $users = User::create([
            'name' => $data['name'],
            'email'=>$data['email'],
            'mobile'=> $data['mobile'],
            'status' => $data['status'],
        ]);
        return redirect()->route('users.index');

    }
    public function update(UserUpdateRequest $request, $id) {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'] ?? $user->name;
        $user->mobile = $validatedData['mobile'] ?? $user->mobile;
        $user->email = $validatedData['email'] ?? $user->email;
        $user->status = $validatedData['status'] ?? $user->status;
        $user->save();
        return redirect()->route('users.index');
    }

     function destroy($id)
    {
        // Find the user by ID
        $users = User::findOrFail($id);
        if (!$users) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
        $users->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    // View Function
    function edit($id) {
        $users = User::findOrFail($id);
        return view('users.usersUpdate', compact('users'));
    }
    function create() {
        return view('users.usersAdd');
    }
}
