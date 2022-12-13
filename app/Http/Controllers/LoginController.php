<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function Login(Request $request)
    {
        if ($request->isMethod('post')) {


            $EmployeeModel = new Employees();
            $Emp = $EmployeeModel->CheckEmail($request->email);
            if ($Emp == null) {
                return redirect()->back()->with('error', 'Email not found');

            } else {
                $Emp = $EmployeeModel->AttemptLogin($request->email, $request->password);
                if ($Emp == null) {
                    return redirect()->back()->with('error', 'Wrong Password');

                } else {
                    $ses_data = [
                        'id' => $Emp->id,
                        'name' => $Emp->name,
                        'logged_in' => TRUE,
                    ];
                    session($ses_data);

                    return redirect()->to('/');

                }
            }

        } else {
            return view('login');
        }

    }
    public  function Logout(){
        session()->flush();
        return redirect()->to('/');
    }
}
