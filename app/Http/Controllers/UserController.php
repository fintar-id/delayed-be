<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function login()
    {

    }

    public function register()
    {

    }

    public function forgotPassword()
    {

    }

    public function getProfile()
    {

    }

    public function createRole(RoleCreateRequest $request)
    {

        $data = $this->roleService->createRole($request);

        return $data;
    }
}
