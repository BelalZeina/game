<?php

namespace App\Imports;

use App\Models\Admin;
use App\Models\Level;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AdminImport implements ToModel, WithHeadingRow, WithValidation
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
        $levels=Level::all()->pluck("id");
        $admin->levels()->sync($levels);
        $admin->syncRoles([1]);
        return $admin;
    }
    public function rules(): array
    {
        return [
            'name'=>"required",
            'phone'=>"required|unique:admins,phone",
            // Add other validation rules as needed
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
