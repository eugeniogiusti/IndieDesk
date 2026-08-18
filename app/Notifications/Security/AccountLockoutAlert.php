<?php

namespace App\Notifications\Security;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountLockoutAlert extends Notification
{
    public function __construct(
        private ?string $attemptedEmail,
        private ?string $ipAddress,
        private \Illuminate\Support\Carbon $occurredAt,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('security.lockout_alert.subject'))
            ->line(__('security.lockout_alert.intro'))
            ->line(__('security.lockout_alert.attempted_email', ['email' => $this->attemptedEmail ?? '—']))
            ->line(__('security.lockout_alert.ip', ['ip' => $this->ipAddress ?? '—']))
            ->line(__('security.lockout_alert.date', ['date' => $this->occurredAt->format('d/m/Y H:i')]))
            ->line(__('security.lockout_alert.outro'))
            ->action(__('security.lockout_alert.action'), route('security.index'));
    }
}
