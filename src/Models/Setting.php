<?php

namespace Nisimpo\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;
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