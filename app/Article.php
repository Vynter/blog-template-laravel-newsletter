<?php

namespace App;


use Carbon\Carbon; //me
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cache;
// import the Intervention Image Manager Class
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Article extends Model
{
    protected $guarded = [];
    protected $filliable = ['id', 'title', 'sub_title', 'slug', 'body', 'published_at', 'image']; //les champ qui devront étre remplis



    /*
    |----------------------------------------------------------------------------------------------------
    |spécial controlleur pour le slug
    |----------------------------------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*
    |----------------------------------------------------------------------------------------------------
    |accesor
    |----------------------------------------------------------------------------------------------------
    */
    public function getDatePublicationAttribute()

    {
        //return Carbon::parse($this->published_at)->format('d/m/Y');
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    public function getTitleSearchedAttribute()
    {
        $q = request('q');
        return str_replace($q, '<mark>' . $q . '</mark>', $this->title);
    }

    public function getSubTitleSearchedAttribute()
    {
        $q = request('q');
        return str_replace($q, '<mark>' . $q . '</mark>', $this->sub_title);
    }

    /*
    |----------------------------------------------------------------------------------------------------
    |mutatos
    |----------------------------------------------------------------------------------------------------
    */

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->title);
    }

    public function setImageAttribute()
    {   //traitement sur l'image
        $img = Image::make(request('image')->getRealPath())->fit(1440, 470);
        //lepath de l'image
        $image_name = 'image/' . time() . '-' . request('image')->getClientOriginalName();
        //stockage
        Storage::put($image_name, (string) $img->encode());
        //attribution du nom au cham de base de donner
        $this->attributes['image'] = $image_name;


        //$this->attributes['image'] = request('image')->storeAs('image', time() . '-' . request('image')->getClientOriginalName());
    }
    /*
    |----------------------------------------------------------------------------------------------------
    |relation
    |----------------------------------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |----------------------------------------------------------------------------------------------------
    |scope
    |----------------------------------------------------------------------------------------------------
    */

    public function scopeRecherche($query, $q)
    {

        return $query->where('title', 'like', "%$q%")->orWhere('sub_title', 'like', "%$q%")->orWhere('body', 'like', "%$q%");
    }


    public function scopeHome($query)
    {
        $q = request('q');
        $page = request('page');

        return Cache::remember('home-page-' . $q . '-' . $page, 60 * 20, function () use ($query, $q) {
            return $query->recherche($q)
                ->latest('id')
                ->with('user')->paginate(10);
        });
    }
}