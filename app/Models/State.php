<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class State extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name','iso_code'];
    protected $casts = ['name'=>'array'];

    public function getNameEnAttribute() { return $this->getTranslation('name','en'); }

    public function crops() { return $this->belongsToMany(Crop::class,'crop_states'); }
}
