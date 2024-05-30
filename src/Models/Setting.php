<?php

namespace Nisimpo\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Setting extends Model
{
    protected $guarded = [];

    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class);
    }

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    public static function getLeftLogo()
    {
        return self::where('title','left logo')->get()->first();
    }

    public static function getRightLogo()
    {

    }

    public static function getAdminPanelLogo()
    {

    }

    public static function getSiteName()
    {

    }
}