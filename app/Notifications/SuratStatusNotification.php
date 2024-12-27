<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SuratStatusNotification extends Notification
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail']; // Anda bisa menambahkan 'database', 'broadcast', dsb.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Surat Anda')
            ->line('Status surat Anda telah berubah menjadi: ' . $this->status)
            ->action('Lihat Surat', url('/surat'))
            ->line('Terima kasih telah menggunakan layanan kami!');
    }

    // Anda juga bisa menambahkan method toDatabase atau lainnya jika ingin mengirim notifikasi melalui database
}
