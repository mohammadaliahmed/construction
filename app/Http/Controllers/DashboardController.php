<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class DashboardController extends ViewController
{


    public function Dashboard()
    {

        $id = session('id');
        $Employee = new Employees();
        $Employee = $Employee->GetEmployee($id);
        return $this->LoadView('dashboard', ['Employee'=>$Employee]);

    }
}
