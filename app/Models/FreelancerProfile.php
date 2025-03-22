<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skills',
        'hourly_rate',
        'rating',
        'availability',
        'bio', // Added
        'experience', // Added
        'portfolio_link', // Added
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

