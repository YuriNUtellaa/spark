@extends('header')


<body>
    

<section class="content">

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="user-management-container" style="width: 60%">
        <h1>Payment Management</h1>
        <div class="user-management-table-container">

                <table class="user-management-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <form action="{{ route('updatePayment', $payment->id) }}" method="POST">
                            @csrf

                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->user->username }}</td>
                                <td>{{ $payment->method }}</td>
                                <td>
                                    <select name="status" required>
                                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="delay" {{ $payment->status == 'delay' ? 'selected' : '' }}>Delay</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="update-button">Update</button>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>

</body>

</html>