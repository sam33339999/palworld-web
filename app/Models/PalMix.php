<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 配種資料集
 */
class PalMix extends Model
{
    use HasFactory;

    protected $table = 'pal_mixes';

    protected $fillable = [
        'pal_id_1',
        'pal_id_2',
        'pal_id_result',
    ];
}
