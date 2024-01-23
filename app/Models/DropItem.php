<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 掉落物品資料集
 */
class DropItem extends Model
{
    use HasFactory;

    protected $table = 'drop_items';

    protected $fillable = [
        'en_name',
        'zh_name',
        'description',
        'comment',
    ];
}
