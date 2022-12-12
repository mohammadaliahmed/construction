<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function LoadView($PartialView, $PartialData = [])
    {
        $id = session('id');
        $Employee = new Employees();
        $Employee = $Employee->GetEmployee($id);
        $nav = [
            'Products' => [
                'List Products' => 'products',
                'Add product' => 'products/addProduct',
                'Order product' => 'products/addProduct',
            ],
            'Employees' => [
                'List Employee' => 'employees/',
                'Add Employee' => 'employees/addEmployee',
            ],
            'Account' => [
                'Settings' => 'settings/',
                'Logout' => 'logout',
            ],
        ];
        $Data = $PartialData + [
                'Employee' => $Employee,
//                'showMakeMeAvailable' => $showMakeMeAvailable,
                'nav' => $nav
            ];

        $Data['Header'] = view('header', $Data);
        $Data['Sidebar'] = view('sidebar', $Data);
        $Data['Page'] = view($PartialView, $Data);


        return view('index', $Data);

    }
}
