<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CropCategory extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name','description'];
    protected $casts = ['name'=>'array','description'=>'array'];
    protected $fillable = ['name','description'];

    public function getNameEnAttribute() { return $this->getTranslation('name','en'); }

    public function crops() { return $this->hasMany(Crop::class,'category_id'); }
}
