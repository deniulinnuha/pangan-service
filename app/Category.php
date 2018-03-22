<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    public function comodities()
    {
        return $this->hasMany(Comodities::class,'id_categories');
    }
}