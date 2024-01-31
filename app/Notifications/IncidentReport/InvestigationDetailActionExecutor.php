<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class InvestigationDetailActionExecutor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($incidentReport,$username,$investigationDetail)
    {
        $this->incidentReport = $incidentReport;
        $this->username = $username;
        $this->investigationDetail = $investigationDetail;
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
        ->subject('Request'.' '.'Investigation Details'.' '.$this->incidentReport->no_laporan.' '.'Assigned'.' '.'for'.' '.$this->username)
        ->greeting('Dear '.$this->username.',')
        ->line('A new request has been created and assign for you to handle this Investigation Detail.')
        ->line('Here is a brief information regarding the new request.')
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Recommendation'.' '.':'.' '.$this->investigationDetail->recommendation)
        ->line('PIC'.' '.':'.' '.$this->username)
        ->line('Deadline Date'.' '.':'.' '.Carbon::parse($this->investigationDetail->date_deadline)->format('d-m-Y H:i:s')) 
        ->line('Please check on IRMS Application for request verification')
        ->action('View Investigation Detail', 'http://localhost/kpi_irms/public/irms/investigation-details/');
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
