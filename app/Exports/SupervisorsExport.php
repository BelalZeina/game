<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class SupervisorsExport implements FromCollection, WithHeadings, WithMapping, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::whereDoesntHave('roles', function($query) {
                    $query->where('name', 'owner');
                })->get();
    }
    public function map($row): array
    {
        return [
            "name"=>$row->name ,
            "phone"=>$row->phone,
            "role"=>$row->roles()->first()->name,
        ];
    }
    public function headings(): array
    {
        return [
            'name',
            'phone',
            'role',
        ];
    }
}
