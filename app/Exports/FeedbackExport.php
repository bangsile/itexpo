<?php

namespace App\Exports;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $stand;

    public function __construct($stand)
    {
        $this->stand = $stand;
    }

    public function collection()
    {
        if ($this->stand == 'all') {
            return Feedback::all()->map(function ($feedback) {
                return [
                    'name' => $feedback->name,
                    'stand' => $feedback->stand,
                    'message' => $feedback->message,
                    'date' => $feedback->created_at->format('d M Y'), // Format sesuai kebutuhan
                    'time' => $feedback->created_at->format('H:i'), // Format sesuai kebutuhan
                ];
            });
        }

        // if ($this->stand == 'admin') {
        return Feedback::where('stand', $this->stand)->get()->map(function ($feedback) {
            return [
                'name' => $feedback->name,
                'message' => $feedback->message,
                'date' => $feedback->created_at->format('d M Y'), // Format sesuai kebutuhan
                'time' => $feedback->created_at->format('H:i'), // Format sesuai kebutuhan
            ];
        });
        // }
        // return User::where('role', $this->role)
        //     ->get()
        //     ->map(function ($user) {
        //         return [
        //             'ID' => $user->id,
        //             'Name' => $user->first_name . ' ' . $user->last_name,
        //             'Email' => $user->email,
        //             'Role' => $user->role,
        //         ];
        //     });
    }

    public function headings(): array
    {
        if ($this->stand == 'all') {
            return ['Nama', 'Stand', 'Feedback', 'Tanggal', 'Jam'];
        }
        return ['Nama', 'Feedback', 'Tanggal', 'Jam'];
    }
    // public function collection()
    // {
    //     return Feedback::all();
    // }
}
