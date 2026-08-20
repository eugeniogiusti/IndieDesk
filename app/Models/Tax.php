<?php

namespace App\Models;

use App\Contracts\CalendarEventable;
use App\Services\Calendar\CalendarEvent;
use App\Services\Calendar\GoogleCalendarLinkBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessSettings;

class Tax extends Model implements CalendarEventable
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Tax $tax) {
            if ($tax->attachment) {
                Storage::disk('local')->delete($tax->attachment);
            }
        });
    }

    protected $fillable = [
        'type',
        'description',
        'amount',
        'due_date',
        'paid_at',
        'reference_year',
        'attachment',
        'notes',
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid_at' => 'date',
        'amount' => 'decimal:2',
    ];

    /* -----------------------------------------------------------------
     |  SCOPES
     |-----------------------------------------------------------------*/

    public function scopeReferenceYear($query, int $year)
    {
        return $query->where('reference_year', $year);
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereNull('paid_at');
    }

    /* -----------------------------------------------------------------
     |  HELPERS
     |-----------------------------------------------------------------*/

    public function hasAttachment(): bool
    {
        return !is_null($this->attachment);
    }

    public function getAttachmentUploadUrl(): string
    {
        return route('taxes.attachment.upload', $this);
    }

    public function getAttachmentDownloadUrl(): ?string
    {
        if (!$this->hasAttachment()) {
            return null;
        }

        return route('taxes.attachment.download', $this);
    }

    public function getAttachmentPreviewUrl(): ?string
    {
        if (!$this->hasAttachment()) {
            return null;
        }

        return route('taxes.attachment.preview', $this);
    }

    public function getAttachmentDeleteUrl(): ?string
    {
        if (!$this->hasAttachment()) {
            return null;
        }

        return route('taxes.attachment.destroy', $this);
    }

    public function toFormPayload(array $extra = []): array
    {
        return array_merge(
            $this->only(array_merge(['id'], $this->fillable)),
            [
                'due_date' => $this->due_date?->format('Y-m-d') ?? '',
                'paid_at'  => $this->paid_at?->format('Y-m-d') ?? '',
            ],
            $extra
        );
    }

    /* -----------------------------------------------------------------
     |  CALENDAR
     |-----------------------------------------------------------------*/

    public function hasCalendarDate(): bool
    {
        return $this->due_date !== null;
    }

    public function toCalendarEvent(): CalendarEvent
    {
        $prefix = $this->paid_at ? '✅ ' : '';

        return new CalendarEvent(
            title: $prefix . $this->calendarTitleBody(),
            description: $this->buildCalendarDescription(),
            startDate: $this->due_date->startOfDay(),
            endDate: null,
            location: null,
            isAllDay: true,
        );
    }

    public function calendarTitleBody(): string
    {
        return __('taxes.calendar_title', [
            'due_date'    => $this->due_date->format('d/m/Y'),
            'description' => $this->description,
            'year'        => $this->reference_year,
        ]);
    }

    public function googleCalendarUrl(): ?string
    {
        if (!$this->hasCalendarDate()) {
            return null;
        }

        return GoogleCalendarLinkBuilder::fromModel($this)->build();
    }

    private function buildCalendarDescription(): string
    {
        $lines = [];

        $lines[] = '💰 ' . mb_strtoupper(__('taxes.title'));
        $lines[] = '────────────────';
        $lines[] = __('taxes.description') . ': ' . $this->description;
        $settings        = BusinessSettings::current();
        $currencyCode    = $settings->default_currency ?? 'EUR';
        $currencySymbol  = BusinessSettings::CURRENCIES[$currencyCode] ?? $currencyCode;
        $lines[] = __('taxes.amount') . ': ' . number_format($this->amount, 2, ',', '.') . ' ' . $currencySymbol;
        $lines[] = __('taxes.reference_year') . ': ' . $this->reference_year;
        $lines[] = __('taxes.due_date') . ': ' . $this->due_date->format('d/m/Y');

        if ($this->paid_at) {
            $lines[] = __('taxes.paid_at') . ': ' . $this->paid_at->format('d/m/Y');
        }

        if ($this->notes) {
            $lines[] = '';
            $lines[] = '📄 ' . mb_strtoupper(__('taxes.notes'));
            $lines[] = '────────────────';
            $lines[] = $this->notes;
        }

        return implode("\n", $lines);
    }
}
