<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers(){
        return User::all();
    }

    public function getUserByUserId($user_id){
        return $this->user->where('user_id', $user_id)->first();
    }

    public function getProfileByAuth(){
        return $this->user->find(Auth::id());
    }

}
