<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 帕魯資料集
 */
class Pal extends Model
{
    use HasFactory;

    protected $table = 'pals';

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'en_name',
        'zh_name',
        'skill_id',
        'description',
        'meta',
        'food',
        'image1',
        'image2',
    ];

    public function dropItems()
    {
        return $this->hasMany(DropItem::class, 'pal_id', 'id');
    }

    public function attrs()
    {
        return $this->hasMany(PalAttr::class, 'pal_id', 'id');
    }

    public function skill()
    {
        return $this->hasOne(PalSkill::class, 'id', 'skill_id');
    }
}
