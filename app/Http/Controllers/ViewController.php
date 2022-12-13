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
            'Home' => [
                'Home' => '',
            ],
            'Products' => [
                'List Products' => 'products',
                'Add product' => 'products/addProduct',
                'Order product' => 'products/addProduct',
            ], 'Orders' => [
                'List Orders' => 'orders',
                'Add Order' => 'orders/addOrder',
            ],
            'Invoices' => [
                'List Invoices' => 'invoices/',
            ],
            'Purchase Order' => [
                'List PO' => 'purchaseOrders/',
            ],
            'Vendors' => [
                'List Vendors' => 'vendors/',
            ],
            'Customers' => [
                'List Customers' => 'customers/',
            ], 'Sites' => [
                'List Sites' => 'sites/',
            ],
            'Employees' => [
                'List Employees' => 'employees/',
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
