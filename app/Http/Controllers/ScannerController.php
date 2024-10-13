<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\User;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    function cekPengunjung(Request $request)
    {
        $result = User::where('id', $request->id)->first();
        if ($result == null) {
            return redirect()->back()->with('error', 'Pengunjung tidak ditemukan');
        }
        return redirect()->back()->with('pengunjung', $result);
    }

    function updateBadge(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'stand' => 'required',
        ]);

        $result = Badge::where('user_id', $request->id)->update([
            $request->stand => true,
        ]);
        if ($result == null) {
            return redirect()->back()->with('error', 'Pengunjung tidak ditemukan');
        }
        return redirect('/kelola-lencana')->with('success', 'Lencana telah diberikan');
    }
}
