<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $prodId;

    public function __construct($prodId)
    {
        $this->prodId = $prodId;
    }

    public function build()
    {
        $id = $this->prodId;

        $user = DB::table('users.id')->where('id',$id)
            ->join('depo_infos','users.id','=','depo_infos.id')
            ->select('users.*','depo_infos.id')
            ->first();

        return $this->view('email.status-update')
            ->with(['prod' =>$user]);
    }
}
