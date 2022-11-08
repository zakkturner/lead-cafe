<?php

namespace App\Exports;

use App\Models\Prospect;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProspectsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array{
        return[
            'id',
            'contact',
            'company',
            'phone_one',
            'phone_two',
            'address',
            'website',
            'email',
            'position',
            'notes',
        ];
    }

    public function collection()
    {
        return Prospect::all();
    }
}
