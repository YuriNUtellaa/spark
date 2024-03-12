<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\MonthlyPayment;
use Carbon\Carbon;

class CreateMonthlyPayments extends Command
{
    protected $signature = 'payments:create-monthly';

    protected $description = 'Create initial monthly payment records for all users';

    public function handle()
    {
        // Get the current year and month as a word
        $currentYearMonth = now()->format('F Y');
    
        // Output the value of $currentYearMonth for debugging
        $this->info('Current Year-Month: ' . $currentYearMonth);
    
        // Get all users
        $users = User::all();
    
        // Create initial payment records for each user
        foreach ($users as $user) {
            // Check if there's already a payment record for this user in the current month
            $existingPayment = MonthlyPayment::where('user_id', $user->id)
                ->where('month', $currentYearMonth)
                ->exists();
            
            // If no existing payment record found, create a new one
            if (!$existingPayment) {
                MonthlyPayment::create([
                    'user_id' => $user->id,
                    'month' => $currentYearMonth, // Set the month to the current year and month
                    'method' => 'online', // or 'on-site' depending on your logic
                    'status' => 'pending',
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    
        $this->info('Monthly payments created successfully.');
    }
    
}
