<?php

namespace App\Notifications\NonConformityReport;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NonConformityApprovalAdministrator extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $nonConformity, $username;
    public function __construct($nonConformity, $username)
    {
        $this->nonConformity = $nonConformity;
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
            ->subject('Request' . ' ' . 'Non Conformity Report' . ' ' . $this->nonConformity->no_laporan . ' ' . 'Approval' . ' ' . 'for' . ' ' .  'Assignment' . $this->username)
            ->greeting('Dear ' . $this->username . ',')
            ->line('A new request has been created waiting for your assignment.')
            ->line('Here is a brief information regarding the new request.')
            ->line('Request no' . ' ' . ':' . ' ' . $this->nonConformity->no_laporan)
            ->line('Description' . ' ' . ':' . ' ' . $this->nonConformity->description)
            ->line('Requested By' . ' ' . ':' . ' ' . $this->nonConformity->nama_pelapor->name)
            ->line('Request Date' . ' ' . ':' . ' ' . Carbon::parse($this->nonConformity->created_at)->format('d-m-Y H:i:s'))
            ->line('Please check on NCR Application for your assignment')
            ->action('View Non Conformity Report', 'http://192.168.12.23/kpi_irms/public/irms/nonconformity-reports/' . $this->nonConformity->id);
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
