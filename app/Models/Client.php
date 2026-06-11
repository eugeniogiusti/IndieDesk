<?php

namespace App\Models;

use App\Enums\AcquisitionSource;
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
        'acquisition_source',
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
        'acquisition_source' => AcquisitionSource::class,
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

    public function getAcquisitionSourceBadgeClass(): string
    {
        if (!$this->acquisition_source) {
            return '';
        }

        $colorMap = [
            'direct_search' => 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200',
            'organic' => 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
            'ads' => 'bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200',
            'sponsorship' => 'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200',
            'other' => 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200',
        ];

        return $colorMap[$this->acquisition_source->category()] ?? $colorMap['other'];
    }

    public function getAcquisitionSourcePlatform(): string
    {
        if (!$this->acquisition_source) {
            return '';
        }

        $platformMap = [
            'search_linkedin' => 'LinkedIn',
            'search_google' => 'Google',
            'search_instagram' => 'Instagram',
            'search_x' => 'X',
            'search_facebook' => 'Facebook',
            'search_thread' => 'Thread',
            'search_bluesky' => 'Bluesky',

            'organic_website' => 'Sito Web',
            'organic_blog' => 'Blog',
            'organic_facebook' => 'Facebook',
            'organic_instagram' => 'Instagram',
            'organic_reddit' => 'Reddit',
            'organic_x' => 'X',
            'organic_thread' => 'Thread',
            'organic_bluesky' => 'Bluesky',

            'ads_google' => 'Google',
            'ads_facebook' => 'Facebook',
            'ads_instagram' => 'Instagram',
            'ads_reddit' => 'Reddit',

            'sponsorship_influencer' => 'Influencer',

            'other_word_of_mouth' => 'Passaparola',
            'other_cold_contact' => 'Contatto dal vivo',
        ];

        return $platformMap[$this->acquisition_source->value] ?? '';
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