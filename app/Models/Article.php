<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable, HasFactory;
    
    protected $fillable =[
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function readDuration()
    {
        $totalWords = str_word_count($this->body);
        $minutesToRead = round($totalWords / 200);
        if($minutesToRead<1){
            return 1;
        }
        return intval($minutesToRead);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
        {
        return [
            'id' =>$this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
