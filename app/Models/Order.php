<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->hasMany(OrderSection::class);
    }

    public function survey_photos()
    {
        return $this->hasMany(SurveyPhoto::class);
    }

    public function design_photos()
    {
        return $this->hasMany(OrderDesign::class);
    }

    public function working_pictures()
    {
        return $this->hasMany(WorkingPicture::class);
    }

    public function production_photos()
    {
        return $this->hasMany(ProductionPhoto::class);
    }
}
