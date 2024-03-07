<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary Report</title>

    <style class="summary">
        body {
            font-family: Impact, fantasy;


            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }

        header{
            height: 120px;
            text-align: right;
            font-size: 12px;
        }

        header h1{
            font-size: 60px;
            color: rgb(232, 113, 33);
            margin-top: 0px;
            margin-bottom: 0px;
            left: 0px;
            text-align: left;
        }

        .image{
            position: absolute;
        }

        .image img{
            width: 200px;
            top: 10px;
            right: 10px;
            margin: 0px;
        }

        .container {
            padding: 20px;
            background: #fff;
        }
        .text-center {
            text-align: center;
            font-size: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid #dee2e6;
        }
        .table th, .table td {
            padding: 7px 15px;
            text-align: center;
        }
        .table thead {
            background-color: rgb(74, 83, 118);
            color: #ffffff;
        }
        .table thead th {
            font-weight: 600;
            font-size: 12px;
        }
        .text-right {
            text-align: right;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr td {
            font-size: 12px;
        }
        .text-title {
            margin-bottom: 0;
            color: #333333;
            font-size: 2em;
        }
        h2 {
            font-size: 15px;
            background-color: rgb(74, 83, 118);
            color: white;
            padding: 10px;
            text-align: center;
        }
        .grand-total {
            background-color: #343a40;
            color: white;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.8em;
        }
    </style>
</head>
<body>

    <header style="padding: 20px">
        <div class="image">
            {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('layouts/SPark-logos_transparent.png'))) }}" alt="SPark"> --}}
            <h1>SPark</h1>
            <p style="text-align: left; margin: 0px;">
                <em>spark@gmail.com</em> <br>
                <em>spark@facebook.com.ph</em> <br>
                <em>8700-911-5522 </em> <br>
                <em>SPark Parking System | 2024 © Copyright</em>
            </p>
        </div>
        <p name="top" style="margin-bottom: 10px"><strong>Prepaird By:</strong></p>
        <p>Co, Andrei <br>
           Baligmasay, Ernesto <br>
           Dacumos, Miguel Angelo <br>
           Gamo, Marvin
        </p>
    </header>
    

    <div class="container">
        <hr style="border: solid rgb(232, 113, 33) 4px; margin: 0px;">
        <h1 class="text-center mb-4">Montly Summary Report</h1>

        <!-- Rental Record Section -->
        <section>
            <h2>RENTAL RECORD</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Rental ID</th>
                        <th>Slot ID</th>
                        <th>User Name</th>
                        <th>Total Hours</th>
                        <th>Rate per Hour</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ $rental->slot_id ?? 'Slot not found' }}</td>
                        <td>{{ optional($rental->user)->username ?? 'User not found' }}</td>
                        <td>{{ $rental->total_hours }}</td>
                        <td><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ $rental->per_hour_rate }}</td>
                        <td><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($rental->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No rental records found.</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="5" class="text-right"><strong>Grand Total:</strong></td>
                        <td><strong><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($grandTotalRental, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Reservation Record Section -->
        <section>
            <h2>RESERVATION RECORD</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Slot ID</th>
                        <th>User Name</th>
                        <th>Total Hours</th>
                        <th>Rate per Hour</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->slot_id ?? 'Slot not found' }}</td>
                        <td>{{ optional($reservation->user)->username ?? 'User not found' }}</td>
                        <td>{{ $reservation->total_hours }}</td>
                        <td><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ $reservation->per_hour_rate }}</td>
                        <td><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($reservation->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No reservation records found.</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="5" class="text-right"><strong>Grand Total:</strong></td>
                        <td><strong><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($grandTotalReservation, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Monthly Subscription Section -->
        <section>
            <h2>MOTHLY SUBSCRIPTION</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Monthly Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($regularUsers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($user->monthly_payment, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No regular user records found.</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="2" class="text-right"><strong>Grand Total:</strong></td>
                        <td><strong><em style="font-family: 'DejaVu Sans', sans-serif; margin: 0px;">₱ </em>{{ number_format($grandTotalRegular, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <footer>
            <hr style="border: solid rgb(232, 113, 33) 4px; margin: 0px;">
            <p style="text-align: center">SPark Parking System | 2024 © Copyright</p>
        </footer>
        


    </div>

    </body>
    </html>