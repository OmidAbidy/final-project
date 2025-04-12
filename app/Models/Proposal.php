<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $primaryKey = 'proposal_id';
    
    protected $fillable = [
        'freelancer_id',
        'clientjob_id',
        'bid_amount',
        'description',
        'status',
        'delivery_time',
        'shortlisted',
    ];


    public function clientJob()
    {
        return $this->belongsTo(ClientJob::class, 'clientjob_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }
}
