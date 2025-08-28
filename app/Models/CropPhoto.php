<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CropPhoto extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['alt'];

    protected $fillable = ['crop_id','photo_url','alt','sort_order'];

    protected $casts = ['alt'=>'array'];

    public function crop() { return $this->belongsTo(Crop::class,'crop_id'); }
}
