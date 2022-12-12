<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public function CheckEmail($Email)
    {
        return $this->where('email', $Email)->first();
    }

    public function GetEmployee($Id)

    {
        return $this->find($Id);

    }

    public function AttemptLogin($Email, $Password)
    {
        return $this
            ->where('email', $Email)
            ->where('password', md5($Password))
            ->first();
    }
}
