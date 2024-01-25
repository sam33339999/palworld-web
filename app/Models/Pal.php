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

    protected $fillable = [
        'pal_id',
        'en_name',
        'zh_name',
        'skill_id',
        'description',
        'meta',
        'food',
        'image1',
        'image2',
    ];

    public function drops()
    {
        return $this->belongsToMany(DropItem::class);
    }

    public function attrs()
    {
        return $this->belongsToMany(Attr::class);
    }

    public function skill()
    {
        return $this->hasOne(PalSkill::class, 'id', 'skill_id');
    }
}
