<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ten',
        'tien',
        'mota',
        'hinh'
    ];
}
