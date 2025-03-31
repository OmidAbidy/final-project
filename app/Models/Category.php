<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{



    protected $fillable = ['name', 'slug'];
    
    /**
     * Relationship to jobs
     */
    public function clientjobs(): HasMany
    {
        return $this->hasMany(ClientJob::class);
    }
}