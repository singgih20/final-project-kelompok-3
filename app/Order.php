<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
   
    public function getRouteKeyName()
    {
        return 'invoice_number';
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function books()
    {
        return $this->belongsTo('App\Book', 'book_id', 'id');
    }

     // UUID STUFF
     protected static function boot()
     {
         parent::boot();
         static::creating(function ($model) {
             if (!$model->getKey()) {
                 $model->{$model->getKeyName()} = (string) \Str::uuid();
             }
         });
     }
 
     public function getIncrementing()
     {
         return false;
     }
 
     /**
      * Get the auto-incrementing key type.
      *
      * @return string
      */
     public function getKeyType()
     {
         return 'string';
     }   
}
