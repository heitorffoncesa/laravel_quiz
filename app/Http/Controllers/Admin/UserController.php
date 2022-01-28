<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index(Request $request)
    {
        $usersOfSystem = $request->has('type') && $request->input('type') == 'system';

        $users = $this->userService->getUsersByType($usersOfSystem);

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $uuid)
    {
        $user = $this->userService->getUserByUuid($uuid);

        return view('admin.users.show')->with([
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
