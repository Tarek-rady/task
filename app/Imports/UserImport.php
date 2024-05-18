<?php

namespace App\Imports;

use App\Models\User;
use Faker\Factory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class UserImport implements ToModel, WithHeadingRow,WithUpserts,WithUpsertColumns,WithValidation
{

    public function model(array $row)
    {

        $password = Str::random(8);
        return new User([
            'name'               => $row['name'],
            'email'              => $row['email'],
            'phone'              => $row['phone'],
            'img'                => 'users/1.png',
            'password'           => bcrypt($password) ,
            'email_verified_at'  => now() ,
            'created_at'         => now()
        ]);
    }

    public function uniqueBy()
    {
        return ['email', 'phone'];
    }

    public function upsertColumns()
    {
        return ['name', 'phone' , 'email'];
    }


    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }
}
