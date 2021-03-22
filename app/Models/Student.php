<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['NIM', 'Nama', 'Kelas', 'Nilai'];
    use HasFactory;
}
