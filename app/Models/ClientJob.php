<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class ClientJob extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'client_jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'categorie_id',
        'title',
        'description',
        'budget_type',
        'budget_amount',
        'is_negotiable',
        'application_deadline',
        'project_deadline',
        'status',
        'visibility',
        'location',
        'experience_level',
        'payment_method',
        'hires_needed',
        'terms'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'posted_date' => 'datetime',
        'application_deadline' => 'datetime',
        'project_deadline' => 'datetime',
        'is_negotiable' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'formatted_posted_date',
        'formatted_budget',
        'is_expired'
    ];


    // ClientJob model
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


    /**
     * Relationships
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'clientjob_id');
    }

    /**
     * Accessors
     */
    protected function formattedPostedDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->posted_date->format('M d, Y'),
        );
    }

    protected function formattedBudget(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->budget_type === 'fixed') {
                    return '$' . number_format($this->budget_amount, 2);
                }
                return '$' . number_format($this->budget_amount, 2) . '/hour';
            },
        );
    }

    protected function isExpired(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->application_deadline->isPast(),
        );
    }

    /**
     * Scopes
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopePublic($query)
    {
        return $query->where('visibility', 'public');
    }

    public function scopeForClient($query, $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    public function scopeWithActiveDeadline($query)
    {
        return $query->where('application_deadline', '>', now());
    }

    /**
     * Business Logic Methods
     */
    public function canBeEdited()
    {
        return $this->status === 'open' && !$this->proposals()->exists();
    }

    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
    }

    public function hasAcceptedProposal()
    {
        return $this->proposals()->where('status', 'accepted')->exists();
    }
}
