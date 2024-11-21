<?php

namespace App\Models;
use App\Models\Scopes\AncientScope;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
    ];
    public function appforms(): HasMany
    {
        return $this->hasMany(AppFrom::class);
    }
    protected static function booted(): void
    {
        static::addGlobalScope(new AncientScope);
    }
}
