<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
      protected $fillable = [];
    
      public function customers()
    {
        return $this->belongsTo(Role::class , 'role_id');
    }
    
     public function customer()
    {
        return $this->belongsTo(Citie::class , 'citie_id');
    }


}
