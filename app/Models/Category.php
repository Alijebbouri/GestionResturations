<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey ='idCat';
    protected $fillable = ["title","slug"];
    public function menus(){
        return $this->hasMany(Menu::class, 'category_id', 'idCat');
    }
    public function getRouteKeyName(){
        return "slug";
    }
}
