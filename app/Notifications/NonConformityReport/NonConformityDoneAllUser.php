<?php

namespace App\Notifications\NonConformityReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Messages\MailMessage;

class NonConformityDoneAllUser extends Notification
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
            ->subject('Information' . ' ' . 'Non Conformity Report' . ' ' . $this->nonConformity->no_laporan . ' ' . 'Closed')
            ->greeting('Dear All')
            ->cc(['rahmatullah.gobel@kpi.co.id', 'arif.rahman@kpi.co.id', 'eman.sonda@kpi.co.id'])
            ->line('Pelaporan Non-Conformity Report No' . ' ' . ':' . $this->nonConformity->no_laporan . ' ' . 'telah selesai ditindak lanjuti oleh Departemen terkait.')
            ->action('View Non Conformity Report', 'http://192.168.12.23/kpi_irms/public/irms/nonconformity-reports/' . $this->nonConformity->id)
            ->line('Terima kasih atas partisipasi anda dalam melaporkan dan menindaklanjuti ketidak-sesuaian yang anda temui. ')
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
