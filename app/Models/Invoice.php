<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function boot ()
    {
        parent::boot();
        static::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }
    public function products () : BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity' , 'price']);
    }

    public function user () :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
