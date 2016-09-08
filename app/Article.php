<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{

    /**
     * @var string
     */
    protected $table = "articles";

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'published_date',
        'body',
        'author'
    ];

    /**
     * @var array
     */
    protected $dates = ['published_date'];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $date
     * Mutators manipulate data before insert on db
     */
    public function setPublishedDateAttribute($date)
    {
        $this->attributes['published_date'] = Carbon::parse($date);
    }

    /**
     * @param $date
     * @return string
     */
    public function getPublishedDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    /**
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_slug($slug);
    }

    /**
     * @param $query
     * Scopes are used for creating custom queries
     * Gets all articles/posts that are currently published
     */
    public function scopePublished($query)
    {
        $query->where('published_date', '<=', Carbon::now());
    }


    /**
     * @param $query
     */
    public function scopePublic($query)
    {
        $query->where('visibility', 1);
    }

    /**
     * @param $query
     */
    public function scopePrivate($query)
    {
        $query->where('visibility', 0);
    }


    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
