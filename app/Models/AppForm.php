<?php

namespace App\Models;
use App\Models\Scopes\AncientScope;

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
    protected static function booted(): void
    {
        static::addGlobalScope(new AncientScope);
    }
}
