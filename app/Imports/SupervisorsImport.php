<?php

namespace App\Imports;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SupervisorsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $data = [
            'name' => $row['name'],
            'phone' => $row['phone'],
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ];
        $admin = Admin::updateOrCreate(
            ['phone' => $row['phone']],
            $data
        );
        $role=Role::where("name", $row['role'])->first();
        $admin->syncRoles([$role->id]);
        return $admin;
    }
    public function rules(): array
    {
        return [
            'name'=>"required",
            'phone'=>"required|unique:admins,phone",
            'role' => 'required|exists:roles,name', 
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'phone.unique' => 'رقم الهاتف موجودة في قاعدة البيانات.',
            // Add other validation rules as needed
        ];
    }

}
