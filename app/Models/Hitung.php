<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hitung extends Model
{
    use HasFactory;
    protected $table = 'Hitung';
    protected $guarded = ['id'];
}
