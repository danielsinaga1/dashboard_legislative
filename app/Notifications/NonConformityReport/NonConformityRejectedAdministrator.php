<?php

namespace App\Notifications\NonConformityReport;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class NonConformityRejectedAdministrator extends Notification
{
    use Queueable;

    protected $nonConformity, $username;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
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
            ->subject('Request' . ' ' . 'Non Conformity Report' . ' ' . $this->nonConformity->no_laporan . ' ' . 'Rejected' . ' ' . 'for' . ' ' . $this->username)
            ->greeting('Dear ' . $this->username . ',')
            // ->subject('Welcome to the the Portal')
            // ->cc(['rahmatullah.gobel@kpi.co.id'])
            ->line('Terima kasih atas partisipasi anda dalam melaporkan ketidaksesuaian yang anda temui.')
            ->line('Mohon maaf pelaporan Non-Conformity Report No' . ' ' . ':' . $this->nonConformity->no_laporan . ' ' . 'anda telah dilaporkan sebelumnya oleh rekan anda yang lain')
            ->line('Tetap semangat dalam menjaga pabrik dan tempat kerja kita dari hal-hal yang tidak sesuai !!!')
            ->line('Terima kasih.')
            ->line('Salam Safety First !');

        // ->markdown('emails.sample-mail');
        // ->view('emails.sample-mail');
        // ->view('mail.html.layout');

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
