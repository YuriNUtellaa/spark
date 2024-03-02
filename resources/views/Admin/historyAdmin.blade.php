@extends('header')
@extends('footer')

<body>

    @auth('admin')

    <section class="home-section">
        <div class="overall-slots">
            <h2 name="heading">ADMIN HISTORY</h2>

            <h3>Slot Rentals</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slot ID</th>
                        <th>User ID</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slotRentals as $slotRental)
                    <tr>
                        <td>{{ $slotRental->id }}</td>
                        <td>{{ $slotRental->slot_id }}</td>
                        <td>{{ $slotRental->user_id }}</td>
                        <td>{{ $slotRental->start_time }}</td>
                        <td>{{ $slotRental->end_time }}</td>
                        <td>
                            <!-- Add your update and delete actions here -->
                            <a href="{{ route('update-slot-rental', ['id' => $slotRental->id]) }}">Update</a>
                            <form action="{{ route('delete-slot-rental', ['id' => $slotRental->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Reservations</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slot ID</th>
                        <th>User ID</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->slot_id }}</td>
                        <td>{{ $reservation->user_id }}</td>
                        <td>{{ $reservation->start_time }}</td>
                        <td>{{ $reservation->end_time }}</td>
                        <td>
                            <!-- Add your update and delete actions here -->
                            <a href="{{ route('update-reservation', ['id' => $reservation->id]) }}">Update</a>
                            <form action="{{ route('delete-reservation', ['id' => $reservation->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>

    @else

    <section class="home-section">
        <div class="overall-slots">
            <h2 name="heading">ADMIN HISTORY</h2>
            <span>INVALID ADMIN AUTHENTICATION</span>
        </div>
    </section>

    @endauth

</body>
</html>
