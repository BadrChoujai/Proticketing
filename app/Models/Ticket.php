<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'description',
        'status_id',
        'user_id',
        'categorie_id',
        'priority_id',
        'citie_id',
        'it_agent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function it_agent()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
    public function citie()
    {
        return $this->belongsTo(Citie::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
