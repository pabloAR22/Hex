<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepository {

    public function findById(int $id) {
        return User::find($id);
    }

    public function getAll() {
        return User::all();
    }

    public function create($userData) {
        $user = new User([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => Hash::make($userData->password),
        ]);

        $user->save();

        return $user;
    }

    public function update($id, $userData) {
        $user = User::findOrFail($id);

        $user->name = $userData->name;
        $user->email = $userData->email;
        $user->password = Hash::make($userData->password);
        $user->save();

        return $user;
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        $user->delete();
        return $user;
    }
}