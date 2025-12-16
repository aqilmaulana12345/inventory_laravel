<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','user_id','price','stock'];

    public function category() { return $this->belongsTo(Category::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function transactions() { return $this->hasMany(Transaction::class); }

    public function currentStock()
    {
        $purchases = $this->transactions()->where('type','purchase')->sum('quantity');
        $sales = $this->transactions()->where('type','sale')->sum('quantity');
        return $this->stock + $purchases - $sales;
    }
}
