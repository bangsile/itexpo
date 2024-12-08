<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'address', 'phone', 'job'];
    public function scopeSearch($query, $search, $name, $address, $job): void
    {
        if ($name == '' && $job == '' && $address == '') {
            $query->where(
                function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")->orWhere('job', 'like', "%{$search}%")->orWhere('address', 'like', "%{$search}%");
                }
            );
        } else {
            $query->where(
                function ($query) use ($search, $name, $address, $job) {
                    $query->when($name, fn($query) => $query->where('name', 'like', "%{$search}%"))
                    ->when($address, fn($query) => $query->orWhere('address', 'like', "%{$search}%"))
                    ->when($job, fn($query) => $query->orWhere('job', 'like', "%{$search}%"));
                }
            );
            // $this->resetPage();
        }
    }
}
