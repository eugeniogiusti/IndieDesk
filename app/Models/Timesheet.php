<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = [
        'project_id',
        'year',
        'month',
        'daily_hours',
        'hourly_rate',
        'notes',
    ];

    protected $casts = [
        'daily_hours' => 'array',
        'hourly_rate' => 'decimal:2',
        'year'        => 'integer',
        'month'       => 'integer',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function totalHours(): float
    {
        return (float) array_sum($this->daily_hours ?? []);
    }

    public function totalEarnings(): float
    {
        return $this->totalHours() * (float) ($this->hourly_rate ?? 0);
    }

    public function periodLabel(): string
    {
        return self::monthNames()[$this->month].' '.$this->year;
    }

    public static function monthNames(): array
    {
        return [
            1  => __('timesheets.months.january'),
            2  => __('timesheets.months.february'),
            3  => __('timesheets.months.march'),
            4  => __('timesheets.months.april'),
            5  => __('timesheets.months.may'),
            6  => __('timesheets.months.june'),
            7  => __('timesheets.months.july'),
            8  => __('timesheets.months.august'),
            9  => __('timesheets.months.september'),
            10 => __('timesheets.months.october'),
            11 => __('timesheets.months.november'),
            12 => __('timesheets.months.december'),
        ];
    }
}
