<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'vat_number',
        'phone_prefix',
        'phone',
        'pec',
        'billing_address',
        'billing_city',
        'billing_zip',
        'billing_province',
        'billing_country',
        'billing_recipient_code',
        'website',
        'linkedin',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


        /**
     * Get the projects for the client.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the followups for the client, ordered by most recent first.
     */
    public function followups()
    {
        return $this->hasMany(ClientFollowup::class)->orderByDesc('contacted_at');
    }

    /**
     * Check if the client is a lead (not yet converted).
     */
    public function isLead(): bool
    {
        return $this->status === 'lead';
    }

    /**
     * Build the WhatsApp wa.me URL from phone prefix + phone.
     * Returns null if no phone is set.
     */
    public function whatsappUrl(): ?string
    {
        if (!$this->phone) {
            return null;
        }

        $number = preg_replace('/\D/', '', ($this->phone_prefix ?? '') . $this->phone);

        return "https://wa.me/{$number}";
    }


    /**
     * Scope a query to only include active clients.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include leads.
     */
    public function scopeLeads($query)
    {
        return $query->where('status', 'lead');
    }

    /**
     * Scope a query to only include prospects.
     */
    public function scopeProspects($query)
    {
        return $query->where('status', 'prospect');
    }

    /**
     * Scope a query to only include archived clients.
     */
    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    /**
     * Get payload for edit form (only editable fields + id).
     */
    public function toFormPayload(array $extra = []): array
    {
        return array_merge(
            $this->only(array_merge(['id'], $this->fillable)),
            $extra
        );
    }
}