<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SoilType extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name','description'];
    protected $fillable = ['name','description'];
    protected $casts = ['name'=>'array','description'=>'array'];

    // convenience accessor for Filament selects:
    public function getNameEnAttribute() { return $this->getTranslation('name','en'); }

    public function crops() { return $this->belongsToMany(Crop::class,'crop_soil_types'); }
}
