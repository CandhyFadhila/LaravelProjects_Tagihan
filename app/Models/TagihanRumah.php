<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanRumah extends Model
{
    use HasFactory;

    public $table = 'kelola_tagihan';

    protected $guarded = ['id'];
}
