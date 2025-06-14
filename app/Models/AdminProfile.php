<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'about',
        'cover_pic',
        'facebook',
        'twitter',
        'instagram',
        'linkedin'
    ];
}
