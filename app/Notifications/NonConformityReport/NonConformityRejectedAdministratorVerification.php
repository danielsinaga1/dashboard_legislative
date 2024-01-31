<?php

namespace App\Notifications\NonConformityReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NonConformityRejectedAdministratorVerification extends Notification
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
        return (new MailMessage)
            // ->subject('Request' . ' ' . 'Incident Report' . ' ' . $this->nonConformity->no_laporan . ' ' . 'Rejected' . ' ' . 'for' . ' ' . $this->username)
            ->greeting('Dear ' . $this->username . ',')
            // ->cc(['rahmatullah.gobel@kpi.co.id'])
            ->line('Tindakan perbaikan dan pencegahan yang dilaporkan masih ada yang perlu diperbaiki, segera periksa kembali halaman pelaporan anda berikut:')
            ->action('View Non Conformity Report', 'http://192.168.12.23/kpi_irms/public/irms/nonconformity-reports/' . $this->nonConformity->id)
            ->line('Silahkan koordinasikan dengan Manager apabila ada yang perlu diperbaiki atau ditambahkan')
            ->line('Terima kasih.')
            ->line('Salam Safety First !');
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
