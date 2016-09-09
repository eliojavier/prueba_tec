<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * @var array
     */
    protected $appends = ['display_visibility'];
    /**
     * @var array
     */
    
    protected $fillable = [
        'level',
        'name',
        'description',
        'visibility',
        'type',
        'slug'
    ];

    public function photos()
    {
        return $this->hasMany(File::class);
    }

    public function getDisplayVisibilityAttribute()
    {
        return ($this->visibility ? 'oculto' : 'publico');
    }

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