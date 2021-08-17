<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    //Funcion para hacer el store del controlador
    public function my_store($request)
    {
        self::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'description'  => $request->description
        ]);
    }

    //Funcion para hacer el updadte del controlador
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'description'  => $request->description
        ]);
    }
}