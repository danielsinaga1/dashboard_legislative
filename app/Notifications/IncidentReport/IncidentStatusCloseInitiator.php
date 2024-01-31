<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class IncidentStatusCloseInitiator extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($incidentReport,$username)
    {
        $this->incidentReport = $incidentReport;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('Dear '.$this->username.',')
        ->subject('Information'.' '.'for'.' ' .'Incident Report'. ' '.$this->incidentReport->no_laporan)
        ->line('A request Incident Report has been handled')
        ->line('Here is the details description Incident Report')
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Description'.' '.':'.' '.$this->incidentReport->description)
        ->line('Requested By'.' '.':'.' '.$this->incidentReport->nama_pelapor->name)
        ->line('Request Date'.' '.':'.' '.Carbon::parse($this->incidentReport->created_at)->format('d-m-Y H:i:s'))
        ->line('Executed by'.' '.':'.' '.$this->incidentReport->action_by->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
