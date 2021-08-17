<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'category_id'
    ];

    public function my_store($request)
    {
        self::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'description'  => $request->description,
            'category_id'  => $request->category_id
        ]);
    }

    //Funcion para hacer el updadte del controlador
    public function my_update($request)
    {
        $this->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->slug, '_'),
            'description'  => $request->description,
            'category_id'  => $request->category_id
        ]);
    }
}