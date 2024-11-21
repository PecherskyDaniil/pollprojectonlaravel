<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AppForm extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected function casts(): array
    {
        return [
            'secret' => 'hashed',
        ];
    }
}
