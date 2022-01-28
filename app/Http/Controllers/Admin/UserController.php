<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private $userService, $roleService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $users = $this->userService->getUsersByType(true);

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = $this->roleService->getRoles();

        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validator($request, false, null);

        $user = $this->userService->saveUser($request->all());

        return redirect()
            ->route('admin.users.show', $user->uuid);
    }

    public function show(string $uuid)
    {
        $user = $this->userService->getUserByUuid($uuid, true);

        return view('admin.users.show')->with([
            'user' => $user
        ]);
    }

    public function edit(string $uuid)
    {
        $user = $this->userService->getUserByUuid($uuid, true);
        $roles = $this->roleService->getRoles();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, string $uuid): RedirectResponse
    {
        $user = $this->userService->getUserByUuid($uuid);

        $this->validator($request, true, $user);

        $this->userService->saveUser($request->all(), $user->id);

        return redirect()
            ->route('admin.users.show', $user->uuid);
    }

    public function destroy(string $uuid): RedirectResponse
    {
        $user = $this->userService->getUserByUuid($uuid);

        $this->userService->deleteEntity($user);

        return redirect()
            ->route('admin.users.show', $user->uuid);
    }

    public function activate(string $uuid)
    {
        $user = $this->userService->getUserByUuid($uuid, true);

        $this->userService->restoreEntity($user);

        return redirect()
            ->route('admin.users.show', $user->uuid);
    }

    /**
     * @param Request $request
     * @param bool $isUpdate
     * @param User|null $user
     * @throws ValidationException
     */
    private function validator(Request $request, bool $isUpdate, ?User $user): void
    {
        if ($isUpdate)
            $rules = [
                'role' => 'required|exists:roles,slug',
                'name' => 'required|string',
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('users', 'email')->ignore($user->id)
                ]
            ];
        else
            $rules = [
                'role' => 'required|exists:roles,slug',
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|confirmed'
            ];

        $this->validate($request, $rules);
    }
}
