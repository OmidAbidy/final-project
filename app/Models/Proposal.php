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
        'delivery_time'
    ];


  public function clientJob(){
    $this->belongsTo(ClientJob::class);
  }

  public function freelancer(){
    $this->belongsTo(User::class);
  }
}
