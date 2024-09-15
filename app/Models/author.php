<?php

namespace App\Models;

use App\Models\Scopes\activeScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Void_;
use Str;

class author extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function books(){
        return $this->hasMany(book::class);
    }

    protected static function booted() :void {
    //   static::creating(function($author){
    //     $author->slug = Str::slug($author->name);
    //   });

    //   static::deleting(function($author){
    //       $author->books()->delete();
    //   });

    //   ********GLOBAL QUERY SCOPE  **********

    static::addGlobalScope(activeScope::class);

       static::addGlobalScope('userdetails',function(Builder $builder){
        $builder->where('id','<',4);
       });
    }

  //  ****************local query scope *******************************
    public function scopeActive($query,$no){
        return $query->whereRaw('id > ?',[$no]);
    }
    
}
