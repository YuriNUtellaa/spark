<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserMail;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch all notifications for the authenticated user
        $notifications = auth()->user()->userMails()->orderByDesc('created_at')->get();

        // Render the notification view with the notifications data
        return view('Users/Messages/notification', compact('notifications'));
    }

    public function showNotifications()
    {
        $user = auth()->user();
        $mails = $user->userMails()->orderBy('created_at', 'desc')->get();

        return view('Users/Messages/notification', ['mails' => $mails]);
    }

    public function showAccountMessage($id)
    {
        // Retrieve the user mail message by its ID
        $mail = UserMail::findOrFail($id);
    
        // Retrieve the user associated with the mail
        $user = $mail->user;
    
        // Pass the user mail message and user to the view for display
        return view('Users.Messages.messageAccount', compact('mail', 'user'));
    }
    
}
