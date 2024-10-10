<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\VaccineCandidate;

class VaccineCandidateScheduleEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $candidate;

    /**
     * Create a new notification instance.
     */
    public function __construct(VaccineCandidate $vaccineCandidate)
    {
        $this->candidate = $vaccineCandidate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $name = $this->candidate->name;
        $date = date_format(date_create($this->candidate->scheduled_at), 'd M D, Y');

        return (new MailMessage)
            ->subject('Covid Vaccine Candidate Schedule Email')
            ->view('email', ['name' => $name, 'date' => $date]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
