<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Item;

class SavedBusinessListing extends Notification
{
    use Queueable;
    private $item;
    private $admin;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Item $item, $admin)
    {
        //
        $this->item = $item;
        $this->admin = $admin;
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
        $item_slug = $this->item->item_slug;
        $admin = $this->admin;
        $url_route = 'user.items.saved';

        if ($admin) {
            $url_route = 'admin.items.saved';
        }
        $url = route($url_route);
        $specific_url = route('page.item', $item_slug);
        return (new MailMessage)
                    ->subject('Hurray! Your Local Attraction is Saved!')
                    ->line('Hurray! You Saved A New Listing on SeeksCo! ')
                    ->line('Checkout your listing here')
                    ->action($this->item->item_title, $specific_url)
                    ->line('Thank you for using our application!');
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
