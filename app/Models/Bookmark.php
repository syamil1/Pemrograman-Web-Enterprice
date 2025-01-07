<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'resep_id'];

    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
