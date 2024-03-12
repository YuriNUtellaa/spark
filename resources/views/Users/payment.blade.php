@extends('header')
@extends('footer')

<body>
    
    <section class="payment-section">
        <div class="payment">
            <h2>Monthly Payment</h2>
            <form method="POST" action="/paymentConfirm">
                @csrf

                @php
                    // Check if the user has already paid for the current month
                    $paidThisMonth = Auth::user()->monthlyPayments()->where('month', now()->format('Y-m'))->exists();
                @endphp

                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select class="form-control {{ $paidThisMonth ? 'disabled' : '' }}" id="payment-method" name="payment_method" {{ $paidThisMonth ? 'disabled' : '' }}>
                        <option value="PayMaya">PayMaya</option>
                        <option value="G-Cash">G-Cash</option>
                        <option value="Union Bank">Union Bank</option>
                        <option value="Paypal">Paypal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="user-number">User's Number</label>
                    <input type="text" class="form-control {{ $paidThisMonth ? 'disabled' : '' }}" id="user-number" name="user_number" required {{ $paidThisMonth ? 'readonly' : '' }}>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="₱ 4,500" readonly>
                </div>

                <button type="submit" class="btn btn-primary {{ $paidThisMonth ? 'disabled' : '' }}" {{ $paidThisMonth ? 'disabled' : '' }}>Confirm Payment</button>
            </form>
        </div>
    </section>
</body>
