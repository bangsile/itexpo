<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Guest::select( 'name', 'gender', 'address', 'phone', 'job', 'created_at')->get();
        return Guest::all()->map(function ($guest) {
            return [
                'name' => $guest->name,
                'gender' => $guest->gender,
                'address' => $guest->address,
                'phone' => $guest->phone,
                'job' => $guest->job,
                'date' => $guest->created_at->format('d M Y'), // Format sesuai kebutuhan
                'time' => $guest->created_at->format('H:i'), // Format sesuai kebutuhan
            ];
        });
    }
    public function headings(): array
    {
        return ['Nama', 'Jenis Kelamin', 'Alamat', 'No. HP', 'Pekerjaan', 'Tanggal', 'Jam'];
    }
}
