<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gallery
 * @package App
 */
class Gallery extends Model
{

    /**
     * @var array
     */
    protected $appends = ['display_visibility'];
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'visibility',
        'type',
        'slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(File::class);
    }


    /**
     * @return string
     */
    public function getDisplayVisibilityAttribute()
    {
        return ($this->visibility ? 'oculto' : 'publico');
    }

    /**
     * @internal param $slug
     */
    public function setSlugAttribute()
    {
        $this->attributes['slug'] = str_slug($this->name);
    }

    /**
     * @param File $photos
     * @return Model
     */
    public function addPhoto(File $photos)
    {
        return $this->photos()->save($photos);
    }


    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
