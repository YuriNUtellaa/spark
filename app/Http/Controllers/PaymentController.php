<?php

namespace App\Http\Controllers;

use App\Model\UserMail;
use Illuminate\Http\Request;
use App\Models\MonthlyPayment;

class PaymentController extends Controller
{

    public function showPaymentForm()
    {
        // Here you can add any necessary logic to fetch data or perform operations before displaying the form
        // For example, you might fetch user data or calculate the amount to be paid
        
        // For now, let's assume the amount is fixed at 4500 pesos
        $amount = 4500;

        return view('Users/payment', compact('amount'));
    }

    public function confirmPayment(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'payment_method' => 'required|string',
            'user_number' => 'required|string',
            // You might want to add more validation rules for the amount field
        ]);
    
        // Get the current year and month as a word
        $currentYearMonth = now()->format('F Y');
    
        // Assuming the user ID is available in the authenticated user
        $userId = auth()->id();
    
        // Find the monthly payment record for the authenticated user and the current month
        $payment = MonthlyPayment::where('user_id', $userId)
            ->where('month', $currentYearMonth)
            ->first();
    
        // If the payment record is found, update it
        if ($payment) {
            $payment->method = 'online';
            $payment->status = 'paid';
            $payment->save();
    
            // Redirect the user back with a success message
            return redirect()->route('home')->with('success', 'Payment confirmed successfully.');

        } else {
            // If the payment record is not found, create a new one
            $newPayment = new MonthlyPayment();
            $newPayment->user_id = $userId;
            $newPayment->month = $currentYearMonth;
            $newPayment->method = 'online';
            $newPayment->status = 'paid';
            $newPayment->save();
    
            // Redirect the user back with a success message
            return redirect()->route('home')->with('success', 'Payment confirmed successfully.');

        }
    }
    

    public function showPaymentManagement()
    {
        // Get all monthly payments
        $payments = MonthlyPayment::with('user')->get();
        
        return view('Admin/paymentAdmin', ['payments' => $payments]);
    }

    // Function to update a payment
    public function updatePayment(Request $request, $id)
    {
        try {
            // Find the payment by ID
            $payment = MonthlyPayment::findOrFail($id);
    
            // Validate the incoming request data
            $request->validate([
                'status' => 'required|in:pending,paid,delay',
            ]);
    
            // Check if the status has changed
            if ($payment->status !== $request->status) {
                // Update the payment status
                $payment->status = $request->status;
                $payment->save();
    
                // Create a new record in user_mails
                $userMail = new UserMail();
                $userMail->user_id = $payment->user_id;
                $userMail->type = 'Payment';
                $userMail->title = 'Payment Status Update';
                $userMail->content = 'Your payment status has been updated to ' . $request->status;
                $userMail->save();
            }
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Payment status updated successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'Failed to update payment status.');
        }
    }
    
    
    
}
