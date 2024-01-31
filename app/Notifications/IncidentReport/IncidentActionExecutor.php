<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class IncidentActionExecutor extends Notification
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
        ->subject('Request'.' '.'Investigation Detail'.' '.$this->incidentReport->no_laporan.' '.'Assigned'.' '.'for'.' '.$this->username)
        ->greeting('Dear '.$this->username.',')
        ->line('A new request has been created and assign for you to handle this Incident Report.')
        ->line('Here is a brief information regarding the new request.')    
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Recommendation'.' '.':'.' '.$this->incidentReport->description)
        ->line('Requested By'.' '.':'.' '.$this->incidentReport->nama_pelapor->name)
        ->line('Request Date'.' '.':'.' '.Carbon::parse($this->incidentReport->created_at)->format('d-m-Y H:i:s'))
        ->line('Reviewed by'.' '.':'.' '.$this->incidentReport->reviewed_by->name)
        ->line('Acknowledged by'.' '.':'.' '.$this->incidentReport->acknowledged_by->name) 
        ->line('Please check on IRMS Application for request verification')
        ->action('View Incident Report', 'http://portal.kpi.co.id/kpi_irms/public/irms/task-incident-reports/'.$this->incidentReport->id);

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
