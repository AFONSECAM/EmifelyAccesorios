<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug',
        'icon', 'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    //Funcion para hacer el store del controlador
    public function my_store($request)
    {
        self::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'icon'  => $request->icon,
            'description'  => $request->description
        ]);
    }

    //Funcion para hacer el updadte del controlador
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'icon'  => $request->icon,
            'description'  => $request->description
        ]);
    }
}