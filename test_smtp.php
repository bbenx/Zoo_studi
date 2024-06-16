<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Address;


// Pour SSL (port 465)
$dsn = 'smtp://zoo.arcadia.studi@gmail.com:ajlbereipkqyhkvn@smtp.gmail.com:465?encryption=ssl';

// Pour TLS (port 587)
// $dsn = 'smtp://zoo.arcadia.studi@gmail.com:ajlbereipkqyhkvn@smtp.gmail.com:587?encryption=tls';

$transport = Transport::fromDsn($dsn);
$mailer = new Mailer($transport);

$email = (new Email())
->from(new Address('zoo.arcadia.studi@gmail.com')) // Set a static from address
->to('zoo.arcadia.studi@gmail.com')
->subject("Nouveau message de moi")
->html("
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;

        }
        .container {
            width: 50%;
            height:auto;
            border-radius: 15px;
            transition: transform 500ms ease-out;
            overflow: hidden;
            color: orange;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.1);
            position: relative; 
            border: solid 2px orange; 
        }
        h1{
            text-decoration:underline;
            margin-top:0;
            color:#4caf50;
        }
        h2 {
            color: Black;
            
        }
        p {
            margin-bottom: 10px;
            color: black;
        }
        .button {
            display: inline-block;
            background-color: orange;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>ZOO ARCADIA</h1>
        <h2>Nouveau message de moi</h2>
        <p>zenfznv zjbvozv znvepf,ksldnvoùicbvnuizbvêzinifgdvge</p>
    </div>
</body>
</html>
");

try {
    $mailer->send($email);
    echo 'Email sent successfully';
} catch (TransportExceptionInterface $e) {
    echo 'Failed to send email: ' . $e->getMessage();
}
