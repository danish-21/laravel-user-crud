<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
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
        dd($user);
        $user->save();



//        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

     function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        // Perform the delete operation
        $user->delete();

        // Redirect to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    // View Function
    function show() {

    }
    function edit($id) {
        $users = User::find($id);
        return view('users.usersUpdate', compact('users'));
    }
    function create() {
        return view('users.usersAdd');
    }
}
