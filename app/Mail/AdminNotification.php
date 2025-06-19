<?php

namespace App\Mail;

use App\Models\DepoInfo;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;

        $depo = User::where('users.id',$user)
            ->join('depo_infos','depo_infos.id','=','users.id')
            ->select('depo_infos.*','users.*')
            ->first();
//        dd($depo);
        return $this->view('user.emails.admin_notification')
            ->with([
                'depo'=>$depo
            ])
            ->subject('New Depo Account');
    }
}
