<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Management Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
            color: #333;
            line-height: 1.6;
            font-size: 12px;
            position: relative;
            padding-bottom: 60px;
            /* space for footer */
        }

        .header-content {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            /* space between header and content */
        }

        .header-content img {
            height: 100px;
            /* larger logo */
            margin-right: 10px;
        }

        .header-content .header-left,
        .header-content .header-right {
            flex: 1;
        }

        .header-left p,
        .header-right p {
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .header-right {
            text-align: right;
        }

        header h1 {
            font-size: 24px;
            text-align: center;
            margin: 20px 0;
            color: #2c3e50;
        }

        table {
            width: 90%;
            margin: 0 auto;
            /* centering table */
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        .user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #3498db;
            display: block;
            margin: auto;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 12px;
            position: absolute;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
            clear: both;
        }

        @media print {

            .header-content,
            .footer {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="header-content">
        <div class="header-left">
            <img src="{{ public_path('logo/SPark-logos_transparent.png') }}" alt="SPark Logo">
            <p>spark@gmail.com<br>
                spark@facebook.com.ph<br>
                8700-911-5522<br>
                SPark Parking System | 2024 © Copyright</p>
        </div>
        <div class="header-right">
            <strong>Prepared By:</strong>
            <p>Co, Andrei<br>
                Baligmasay, Ernesto<br>
                Dacumos, Miguel Angelo<br>
                Gamo, Marvin</p>
        </div>
    </div>

    <header>
        <h1>User List - {{ $reportMonth }}</h1>
    </header>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Plate Number</th>
                <th>Image</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->plate_number }}</td>
                    <td class="text-center">
                        @php
                            $imagePath = public_path('profiles/' . $user->image);
                            $imageData = @getimagesize($imagePath);
                        @endphp
                        @if ($imageData)
                            <img src="{{ $imagePath }}" alt="User Image" class="user-image">
                        @else
                            <span>No Image Available</span>
                        @endif
                    </td>
                    <td>{{ ucfirst($user->type) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>SPark Parking System | 2024 © Copyright</p>
    </div>
</body>

</html>
