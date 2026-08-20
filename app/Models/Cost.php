<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cost extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Cost $cost) {
            if ($cost->receipt_path) {
                Storage::disk('local')->delete($cost->receipt_path);
            }
        });
    }

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'project_id',
        'amount',
        'currency',
        'type',
        'paid_at',
        'receipt_path',
        'notes',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'paid_at' => 'date',
        'amount' => 'decimal:2',
    ];

    /* -----------------------------------------------------------------
     |  CONSTANTS (single source of truth)
     |-----------------------------------------------------------------*/

    public const TYPES = [
        'hosting',
        'api',
        'tool',
        'license',
        'ads',
        'service',
        'travel',
        'hardware',
        'meal',
    ];

    public const CURRENCIES = BusinessSettings::CURRENCIES;

    /* -----------------------------------------------------------------
     |  RELATIONSHIPS
     |-----------------------------------------------------------------*/

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /* -----------------------------------------------------------------
     |  SCOPES (filters for queries)
     |-----------------------------------------------------------------*/

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeCurrency($query, string $currency)
    {
        return $query->where('currency', $currency);
    }

    public function scopeForProject($query, int $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereBetween('paid_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ]);
    }

    public function scopeThisYear($query)
    {
        return $query->whereBetween('paid_at', [
            now()->startOfYear(),
            now()->endOfYear()
        ]);
    }

    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('paid_at', [$startDate, $endDate]);
    }

    /* -----------------------------------------------------------------
     |  HELPERS 
     |-----------------------------------------------------------------*/

    public function getCurrencySymbol(): string
    {
        return self::CURRENCIES[$this->currency] ?? $this->currency;
    }

    public function getFormattedAmount(): string
    {
        $symbol = $this->getCurrencySymbol();
        $formatted = number_format($this->amount, 2, ',', '.');
        
        return "{$symbol} {$formatted}";
    }

    public function isRecent(): bool
    {
        return $this->paid_at->isAfter(now()->subDays(7));
    }


     /**
     * Check if cost has receipt uploaded
     */
    public function hasReceipt(): bool
    {
        return !is_null($this->receipt_path);
    }

    /**
     * Get receipt upload URL
     */
    public function getReceiptUploadUrl(): string
    {
        return route('receipts.upload', [$this->project, $this]);
    }

    /**
     * Get receipt download URL
     */
    public function getReceiptDownloadUrl(): ?string
    {
        if (!$this->hasReceipt()) {
            return null;
        }
        
        return route('receipts.download', [$this->project, $this]);
    }

    /**
     * Get receipt preview URL
     */
    public function getReceiptPreviewUrl(): ?string
    {
        if (!$this->hasReceipt()) {
            return null;
        }
        
        return route('receipts.preview', [$this->project, $this]);
    }

    /**
     * Get receipt delete URL
     */
    public function getReceiptDeleteUrl(): ?string
    {
        if (!$this->hasReceipt()) {
            return null;
        }
        
        return route('receipts.destroy', [$this->project, $this]);
    }

    /**
     * Get payload for edit form (only editable fields + id).
     */
    public function toFormPayload(array $extra = []): array
    {
        return array_merge(
            $this->only(array_merge(['id'], $this->fillable)),
            [
                'paid_at' => $this->paid_at?->format('Y-m-d') ?? '',
            ],
            $extra
        );
    }
}