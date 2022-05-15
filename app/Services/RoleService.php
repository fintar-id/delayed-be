<?php

namespace App\Services;

use App\Http\Requests\RoleCreateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RoleService
{

    private $userRepo, $roleRepo;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    public function createRole(RoleCreateRequest $request)
    {
        return $this->roleRepo->createRole($request);
    }

}
