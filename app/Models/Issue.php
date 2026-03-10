<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'issues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $fillable = [
    'title',
    'source',
    'finding',
    'category',
    'priority',
    'status',
    'reported_by',
    'implementation_deadline',
    'date_reported',
    'resolution_notes',
    'date_resolved',
];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_reported' => 'date',
        'date_resolved' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope to filter by status
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to filter by priority
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $priority
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByPriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Scope to filter by category
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope to filter open issues
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'Open');
    }

    /**
     * Scope to filter in progress issues
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', 'In Progress');
    }

    /**
     * Scope to filter resolved issues
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeResolved($query)
    {
        return $query->whereIn('status', ['Resolved', 'Closed']);
    }

    /**
     * Scope to filter unresolved issues (Open or In Progress)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnresolved($query)
    {
        return $query->whereIn('status', ['Open', 'In Progress']);
    }

    /**
     * Check if issue is resolved
     *
     * @return bool
     */
    public function isResolved()
    {
        return in_array($this->status, ['Resolved', 'Closed']);
    }

    /**
     * Check if issue is open
     *
     * @return bool
     */
    public function isOpen()
    {
        return $this->status === 'Open';
    }

    /**
     * Check if issue is in progress
     *
     * @return bool
     */
    public function isInProgress()
    {
        return $this->status === 'In Progress';
    }

    /**
     * Check if issue is critical
     *
     * @return bool
     */
    public function isCritical()
    {
        return $this->priority === 'Critical';
    }

    /**
     * Check if issue is high priority
     *
     * @return bool
     */
    public function isHighPriority()
    {
        return in_array($this->priority, ['High', 'Critical']);
    }

    /**
     * Get the days since the issue was reported
     *
     * @return int
     */
    public function getDaysSinceReported()
    {
        return $this->date_reported->diffInDays(now());
    }

    /**
     * Get the days to resolve (if resolved)
     *
     * @return int|null
     */
    public function getDaysToResolve()
    {
        if ($this->date_resolved) {
            return $this->date_reported->diffInDays($this->date_resolved);
        }
        return null;
    }
}