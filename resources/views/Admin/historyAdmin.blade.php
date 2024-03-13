@extends('header')

<body>

    @auth('admin')
        <div class="history-container">


            <section class="home-section" style="margin-top: 0">
                <div class="overall-slots">
                    <h1 class = "history-header"> RENTAL RECORD</h3>
                        <h3 name="admin">REGULAR RENTAL RECORD</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slot Number</th>
                                    <th>User ID</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regular as $regular)
                                    <tr>
                                        <td>{{ $regular->id }}</td>
                                        <td>{{ $regular->slot->slot_number }}</td>
                                        <td>{{ $regular->user_id }}</td>
                                        <td>
                                            <input type="datetime-local" name="start_time"
                                                value="{{ \Carbon\Carbon::parse($regular->start_time)->format('Y-m-d\TH:i') }}"
                                                form="update-form-{{ $regular->id }}" required>
                                        </td>
                                        <td>
                                            <input type="datetime-local" name="end_time"
                                                value="{{ \Carbon\Carbon::parse($regular->end_time)->format('Y-m-d\TH:i') }}"
                                                form="update-form-{{ $regular->id }}" required>
                                        </td>
                                        <td>
                                            <form id="update-form-{{ $regular->id }}" method="POST"
                                                action="{{ route('update-slot-rental', ['id' => $regular->id]) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="update-button">Update</button>
                                            </form>
                                            <form action="{{ route('delete-slot-rental', ['id' => $regular->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this slot rental?')"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h3 name="admin">IRREGULAR RENTAL RECORDS</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slot Number</th>
                                    <th>User ID</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($irregular as $irregular)
                                    <tr>
                                        <td>{{ $irregular->id }}</td>
                                        <td>{{ $irregular->slot->slot_number }}</td>
                                        <td>{{ $irregular->user_id }}</td>
                                        <td>
                                            <input type="datetime-local" name="start_time"
                                                value="{{ \Carbon\Carbon::parse($irregular->start_time)->format('Y-m-d\TH:i') }}"
                                                form="update-form-reservation-{{ $irregular->id }}" required>
                                        </td>
                                        <td>
                                            <input type="datetime-local" name="end_time"
                                                value="{{ \Carbon\Carbon::parse($irregular->end_time)->format('Y-m-d\TH:i') }}"
                                                form="update-form-reservation-{{ $irregular->id }}" required>
                                        </td>
                                        <td>
                                            <form id="update-form-reservation-{{ $irregular->id }}" method="POST"
                                                action="{{ route('update-reservation', ['id' => $irregular->id]) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="update-button">Update</button>
                                            </form>
                                            <form action="{{ route('delete-reservation', ['id' => $irregular->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this reservation?')"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </section>
        </div>
    @else
        <div class="history-container">
            <div class="history-header">
                ADMIN HISTORY
            </div>
            <section class="home-section">
                <div class="overall-slots">
                    <span>INVALID ADMIN AUTHENTICATION</span>
                </div>
            </section>
        </div>
    @endauth

</body>

</html>
