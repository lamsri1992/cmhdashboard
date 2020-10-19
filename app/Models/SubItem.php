<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubItem extends Model
{
    protected $fillable = [
        'sub_name',
        'sub_src',
        'sub_group',
        'sub_order',
        'sub_active',
        'sub_width',
        'sub_height',
    ];
}
