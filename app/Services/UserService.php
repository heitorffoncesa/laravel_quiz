<?php


namespace App\Services;


use App\Abstracts\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService extends Service
{
    private $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    public function getUsersByType(bool $withTrashed = false)
    {
        return User::when($withTrashed, function ($query) {
                return $query->withTrashed();
            })
            ->get();
    }

    public function getUserByUuid(string $uuid, bool $withTrashed = false): User
    {
        return User::where('uuid', $uuid)
            ->when($withTrashed, function ($query){
                return $query->withTrashed();
            })
            ->first();
    }

    public function saveUser(array $data, ?int $id = null)
    {
        if ($id) $user = User::find($id);
        else {
            $user = new User();
            $user->uuid = Str::uuid();
        }

        $user->role_id = $this->roleService->getRoleBySlug($data['role'])->id;

        if (key_exists('name', $data)) $user->name = $data['name'];
        if (key_exists('email', $data)) $user->email = $data['email'];
        if (key_exists('password', $data)) $user->password = Hash::make($data['password']);

        $user->save();

        return $user;
    }
}
