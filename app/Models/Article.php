<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','url'];

    public static function slugGenerator($string){
        $slug = Str::slug($string, '-') ;
        $original_slug = $slug;
        $c = 1;
        $exists = Article::where('slug', $slug)->first();

        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = Article::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
