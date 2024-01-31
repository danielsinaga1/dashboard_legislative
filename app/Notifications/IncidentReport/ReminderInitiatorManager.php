<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class ReminderInitiatorManager extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($incidentReport, $username, $limit)
    {
        $this->incidentReport = $incidentReport;
        $this->username = $username;
        $this->limit = $limit;
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
        ->greeting('Dear '.$this->username.',')
        ->subject('[REMINDER]'.' '.'Request'.' '.'Incident Report'.' '.$this->incidentReport->no_laporan.' '.'Approval'.' '.'for'.' '.$this->username)
        ->cc(['daniel.sinaga@kpi.co.id','rahmatullah.gobel@kpi.co.id','arif.rahman@kpi.co.id'])
        ->line('A new request has been created waiting for your approval.')
        ->line('Here is a brief information regarding the new request.')
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Description'.' '.':'.' '.$this->incidentReport->description)
        ->line('Requested By'.' '.':'.' '.$this->incidentReport->nama_pelapor->name)
        ->line('Request Date'.' '.':'.' '.Carbon::parse($this->incidentReport->created_at)->format('d-m-Y H:i:s'))
        ->line('Reviewed by'.' '.':'.' '.$this->incidentReport->reviewed_by->name)
        ->line('This Report has been due since '.Carbon::parse($this->limit)->diffForHumans())
        // if($this->limit){
        //    $mailMessage->line('Approval Time Limit'.' '.':'.' '.$this->limit);
        // }
       ->line('Please check on IRMS Application for request verification')
       ->action('View Incident Report', 'http://portal.kpi.co.id/kpi_irms/public/irms/my-incident-reports/'.$this->incidentReport->id);

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
