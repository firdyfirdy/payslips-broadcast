<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaySlip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_urut',
        'employee_id',
        'bulan',
        'gaji_pokok',
        'total_lembur',
        'potongan',
        'gaji_bersih'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
