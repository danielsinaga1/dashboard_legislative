<?php

namespace App\Notifications\IncidentReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class IncidentApprovalManager extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($incidentReport,$username, $limit = null)
    {
        $this->incidentReport = $incidentReport;
        $this->username = $username;
        $this->limit = $limit;
        // $this->timesClassification = $timesClassification;
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
        ->subject('Request'.' '.'Incident Report'.' '.$this->incidentReport->no_laporan.' '.'Approval'.' '.'for'.' '.$this->username)
        ->greeting('Dear '.$this->username.',')
        ->line('A new request has been created waiting for your approval.')
        ->line('Here is a brief information regarding the new request.')
        ->line('Request no'.' '.':'.' '.$this->incidentReport->no_laporan)
        ->line('Classification Incident'.' '.':'.' '.$this->incidentReport->classify->name)
        ->line('Description'.' '.':'.' '.$this->incidentReport->description)
        ->line('Requested By'.' '.':'.' '.$this->incidentReport->nama_pelapor->name)
        ->line('Request Date'.' '.':'.' '.Carbon::parse($this->incidentReport->created_at)->format('d-m-Y H:i:s'))
        ->line('Reviewed by'.' '.':'.' '.$this->incidentReport->reviewed_by->name);
        if($this->limit){
            $mailMessage->line('Approval Time Limit'.' '.':'.' '.$this->limit);
        }
        $mailMessage->line('Please check on IRMS Application for request verification')
        ->action('View Incident Report', 'http://portal.kpi.co.id/kpi_irms/public/irms/my-incident-reports/'.$this->incidentReport->id);
        // ->line('if this Incident Report does not take and approval action, then the approval will be automatically by system less than'.' '.$this->timesClassification.' '.'hours');
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
