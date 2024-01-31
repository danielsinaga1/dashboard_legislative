<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class IncidentReportDoneAllUser extends Notification
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
        $mailMessage = new MailMessage();
        
        $mailMessage
        ->subject('Information'.' '.'for'.' ' .'Incident Report'. ' '.$this->incidentReport->no_laporan)
        ->greeting('Dear '.$this->username.',')
        ->line('A request Incident Report has been handled')
        ->line('Here is the details description Incident Report')
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Category Incident'.' '.':'.' '.$this->incidentReport->category->name)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Basic Cause'.' '.':'.' '.$this->incidentReport->root_cause->name)
        ->line('Description'.' '.':'.' '.$this->incidentReport->description)
        ->line('Location'.' '.':'.' '.$this->incidentReport->location)
        ->line('Requested By.  :'.$this->incidentReport->nama_pelapor->name)
        ->line('Request Date'.' '.':'.' '.Carbon::parse($this->incidentReport->created_at)->format('d-m-Y H:i:s'))
        ->line('Reviewed by'.' '.':'.' '.$this->incidentReport->reviewed_by->name)
        ->line('Acknowledged by'.' '.':'.' '.$this->incidentReport->acknowledged_by->name)
        ->line('Action by'.' '.':'.' '.$this->incidentReport->action_by->name)
        ->line('Corrective Action'.' '.':'.' '.$this->incidentReport->perbaikan)
        ->line('Preventive Action'.' '.':'.' '.$this->incidentReport->pencegahan)
        ->action('View Incident Report', 'http://portal.kpi.co.id/kpi_irms/public/irms');

        return $mailMessage;
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
