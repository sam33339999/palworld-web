<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 技能資料集 - 帕魯的自身技能
 */
class PalSkill extends Model
{
    use HasFactory;

    protected $table = 'pal_skills';

    protected $fillable = [
        'en_name',
        'zh_name',
        'description',
        'type',
    ];
}
