<?php

namespace base;

class Sendmail
{

    private $mailer = null;

    private $transport = null;

    function __construct()
    {
        require_once 'base/swiftmailer/swift_required.php';             // Swiftmailer
        require_once 'base/swiftmailer/swift_init.php';             // Swiftmailer
        $this->prepareTransport();
        $this->prepareMailer();
    }

    private function prepareTransport()
    {
        // Create the Transport
        $this->transport = Swift_SmtpTransport::newInstance('smtp.example.org', 25)
            ->setUsername('your username')
            ->setPassword('your password')
        ;
        d($this->transport);
    }

    private function prepareMailer()
    {
        // Create the Mailer using your created Transport
        $this->mailer = Swift_Mailer::newInstance($this->transport);
    }

    public function setMessage()
    {
        $this->message = Swift_Message::newInstance($this->subject)
            ->setFrom(array('john@doe.com' => 'John Doe'))
            ->setTo(array('jouranoos@gmail.com', 'jouranoos@gmail.com' => 'Arjen'))
            ->setBody('Here is the message itself')
        ;
    }

    public function setSubject($subject = '')
    {
        $this->subject = $subject;
    }

    public function send()
    {
        return $this->mailer->send($this->message);
    }

}
