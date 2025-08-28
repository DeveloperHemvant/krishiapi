<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crop extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name','description','seeding_time','harvest_time'];

    protected $fillable = [
        'category_id','name','description','seeding_time','harvest_time',
        'primary_image','total_days','active'
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'seeding_time' => 'array',
        'harvest_time' => 'array',
    ];

    // convenience accessor for Filament lists
    public function getNameEnAttribute() {
        return $this->getTranslation('name','en');
    }
    public function category() { return $this->belongsTo(CropCategory::class,'category_id'); }
    public function photos() { return $this->hasMany(CropPhoto::class,'crop_id')->orderBy('sort_order'); }
    public function soilTypes() { return $this->belongsToMany(SoilType::class,'crop_soil_types'); }
    public function states() { return $this->belongsToMany(State::class,'crop_states'); }
}
