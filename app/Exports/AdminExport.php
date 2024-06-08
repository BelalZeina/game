<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class AdminExport implements FromCollection , WithHeadings, WithMapping, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::whereHasRole("owner")->get();
    }
    public function map($row): array
    {
        return [
            "name"=>$row->name ,
            "phone"=>$row->phone,
        ];
    }
    public function headings(): array
    {
        return [
            'name',
            'phone',
        ];
    }
}
