<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Imagick;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    public function delete()
    {
        Storage::delete([
            'originals/'.$this->filename,
            'originals/new'.$this->filename,
            'public/temp/'.$this->filename,
            'public/temp/new'.$this->filename,
        ]);

        parent::delete();
    }

    public function getUrl()
    {
        return Storage::url('public/temp/'.$this->filename);
    }
}
