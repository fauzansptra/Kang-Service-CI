<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected function checkRole($role)
    {
        if (session()->get('role') !== $role) {
            return redirect()->to('/');
        }
    }

    protected function checkRoles(array $roles)
    {
        if (!in_array(session()->get('role'), $roles)) {
            return redirect()->to('/');
        }
    }
}
