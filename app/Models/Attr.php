<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 屬性資料集(生活屬性 - 例如: 伐木、種植、等等)
 */
class Attr extends Model
{
    use HasFactory;

    protected $table = 'attrs';

    protected $fillable = [
        'en_name',
        'zh_name',
        'number',
        'description',
    ];
}
