<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;
use Microsoft\Graph\Generated\Models\EmailAddress;
use Microsoft\Graph\Generated\Models\Recipient;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Graph\Generated\Models\ItemBody;
use Microsoft\Graph\Generated\Models\BodyType;
use Microsoft\Graph\Generated\Models\Message;

class EmailController extends Controller
{
    public function mail(){
        return Inertia::render("Mail/Email");
    }

    public function sendEmail(Request $request){
        // Get email details from the request
        $to = $request->input('to');
        $subject = $request->input('subject');
        $body = $request->input('body');

        // Send the email
        Mail::to($to)->send(new SendEmail($subject, $body));

        return redirect(route('mail'))->with(['success' => true, 'message' => 'Mail sent!']);
        // // Uses https://graph.microsoft.com/.default scopes if none are specified
        // $tokenRequestContext = new ClientCredentialContext(
        //     env('MS_GRAPH_TENANT_ID'),
        //     env('MS_GRAPH_CLIENT_ID'),
        //     env('MS_GRAPH_CLIENT_SECRET')
        // );
        // $graphServiceClient = new GraphServiceClient($tokenRequestContext);


        // try {
        //     $sender = new EmailAddress();
        //     $sender->setAddress('hamaadkaleem0@outlook.com');
        //     $sender->setName('Hamaad Kaleem');
        //     $fromRecipient = new Recipient();
        //     $fromRecipient->setEmailAddress($sender);

        //     $recipients = [];

        //     $recipientEmail = new EmailAddress();
        //     $recipientEmail->setAddress($to);
        //     $recipientEmail->setName('Hamaad Kaleem');
        //     $recipient = new Recipient();
        //     $recipient->setEmailAddress($recipientEmail);
        //     $recipients[] = $recipient;

        //     $emailBody = new ItemBody();
        //     $emailBody->setContent($body);
        //     $emailBody->setContentType(new BodyType(BodyType::HTML));

        //     $message = new Message();
        //     $message->setSubject($subject);
        //     $message->setFrom($fromRecipient);
        //     $message->setToRecipients($recipients);
        //     $message->setBody($emailBody);

        //     $requestBody = new \Microsoft\Graph\Generated\Users\Item\SendMail\SendMailPostRequestBody();
        //     $requestBody->setMessage($message);

        //     $response = $graphServiceClient->me()->sendMail()->post($requestBody)->wait();

        //     dd($response);

        // } catch (ApiException $e) {
        //     dd($e->getMessage());
        // }
    }
}
