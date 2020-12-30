<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailBroadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'email',
        'status',
        'message'
    ];
}
