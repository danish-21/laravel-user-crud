<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
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
        return $users;

    }
    function update($id) {

    }
    function destroy($id) {

    }
    // View Function
    function show() {

    }
}
