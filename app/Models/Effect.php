<?php

namespace App\Models;

use App\Services\ImagickEffects\AbstractImagickEffect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    use HasFactory;

    public function __construct()
    {
        app()->singleton('imagickEffect', function () {
            $className                = 'App\Services\ImagickEffects\\'.ucfirst($this->route_name);
            return new $className;
        });
        parent::__construct();
    }

    public function getRouteKeyName()
    {
        return 'route_name';
    }

    public function getImagickEffectInstance() : AbstractImagickEffect
    {
        return app('imagickEffect');
    }

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

}
