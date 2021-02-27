<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    function unique_idd(){
        $first = 'STUDENTID';
        $second = uniqid();

        return ($first.$second);
    }
    public function passid(){
        $first = 'PASSID';
        $second = uniqid();

        return ($first.$second);
    }

    public function model(array $row)
    {
        return new User([
            'user_type' => 'student',
            'name' => $row['full_name'],
            'email' => $row['email'],
            'unique_id' => $this->unique_idd,
            'reg_no'=> $row['reg_no'],
            'picture' => 'avatar.png',
            'sex' => $row['sex'],
            'dob' => $row['birth_day']."/".$row['birth_month']."/".$row['birth_year'],
            'state_of_origin' => $row['state_of_origin'],
            'login' => 0,
            'password' => $this->passid
        ]);
    }
}
