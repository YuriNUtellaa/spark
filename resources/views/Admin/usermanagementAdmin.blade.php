@extends('header')

<section class="content">
    <div class="user-management-container">
        <h1>User Management </h1>
        <form action="{{ route('admin.generate-user-management-report') }}" method="GET" class="user-management-form">
            <label for="reportMonth" class="report-label">Select Month and Year for Report:</label>
            <input type="month" id="reportMonth" name="reportMonth" value="{{ old('reportMonth', date('Y-m')) }}"
                class="report-input">
            <button type="submit" class="btn generate-report-btn">Generate Report</button>
        </form>
        <div class="user-management-table-container">
            <table class="user-management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Plate Number</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <form action="{{ route('admin.update-user', $user) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td><input type="text" name="username" value="{{ $user->username }}" required></td>
                                <td><input type="password" name="password" placeholder="Set bew password"></td>
                                <td><input type="email" name="email" value="{{ $user->email }}" required></td>
                                <td><input type="text" name="plate_number" value="{{ $user->plate_number }}"
                                        required></td>
                                <td>
                                    <div class="form-group">
                                        <img src="{{ asset('profiles/' . $user->image) }}" alt="User Image"
                                            class="user-image">
                                        <input type="file" name="image">
                                    </div>
                                </td>
                                <td>
                                    <select name="type" required>
                                        <option value="regular" {{ $user->type == 'regular' ? 'selected' : '' }}>Regular
                                        </option>
                                        <option value="irregular" {{ $user->type == 'irregular' ? 'selected' : '' }}>
                                            Irregular</option>
                                        <!-- Add other user types here -->
                                    </select>
                                </td>

                                <td>
                                    <select name="status" required>
                                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="verified" {{ $user->status == 'verified' ? 'selected' : '' }}>Verify</option>
                                        <!-- Add other user types here -->
                                    </select>
                                </td>


                                <td>
                                    <button type="submit" class="update-button">Update</button>
                                
                            </form>


                                <form action="{{ route('admin.delete-user', $user) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
