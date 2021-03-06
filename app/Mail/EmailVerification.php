<?php

namespace App\Mail;

use App\EmailToken;
use App\Job\ProcessEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    private $user_id;
    private $username;
    private $email;
    private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_id, $data)
    {
        $this->user_id = $user_id;
        $this->username = $data['username'];
        $this->email = $data['email'];
        $token = EmailToken::addToken($user_id);
        $this->url = Config::get('app.APP_URL') . '/verify/' . $user_id . '/' . $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('อีเมล์ยืนยันการสมัครเว็บไซต์ ratemycanteen.com')
                ->markdown('canteen.mails.verification')
                ->with([
                    'user_username' => $this->username,
                    'user_email' => $this->email,
                    'url' => $this->url,
                ]);
    }

    public function getEmail(){
        return $this->email;
    }

}
