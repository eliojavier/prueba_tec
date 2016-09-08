<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

/**
 * Class File
 * @package App
 */
class File extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'thumbnail_path',
        'display_name',
        'type'
    ];

    protected $baseDir = 'uploads/images';

    /**
     * @return string
     */
    public function getBaseDir()
    {
        return $this->baseDir;
    }

    /**
     * @param string $baseDir
     */
    public function setBaseDir($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function named($name)
    {
        return (new static)->newAs($name);
    }

    public static function namedPdf($name, $type)
    {
        return (new static)->pdfAs($name, $type);
    }


    public function newAs($name)
    {
        $this->display_name = $name;
        $this->name = sprintf('%s-%s', time(), $name);
        $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir . "/thumbs", $this->name);

        return $this;
    }


    public function pdfAs($name, $type)
    {
        $this->display_name = $name;
        $this->name = sprintf('%s-%s', time(), $name . ".pdf");
        $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
        $this->type = $type;
        $this->save();

        return $this;
    }

    public function scopeIsButton($query)
    {
        $query->where('type', 2);
    }

    public function scopeIsLink($query)
    {
        $query->where('type', 3);
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function storePdf(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        return $this;
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function store(UploadedFile $file)
    {
        Image::make($file->getRealPath())
            ->fit(600, 400)
            ->save($this->path);

        $this->makeThumbnail();

        return $this;
    }

    /**
     *
     */
    public function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200, 200)
            ->save($this->thumbnail_path);

    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);
        parent::delete();
    }


}
