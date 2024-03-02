@extends('header')
@extends('footer')

<body>

  <section class="section-reserve">
    
    <div class="reserve">
      <h2>Reserve Slot</h2>
      <h3>Slot Number: {{ $slot->slot_number }}</h3>
      <p>Status: {{ $slot->status }}</p>
      <form action="{{ route('confirm-reserve-admin') }}" method="POST">
        @csrf
        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
        <select name="user_id" required>
          <option value="">Select User</option>
          @foreach($regularUsers as $user)
            <option value="{{ $user->id }}">{{ $user->username }}</option>
          @endforeach
        </select>
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time" required>
        <label for="end_time">End Time:</label>
        <input type="datetime-local" id="end_time" name="end_time" required>
        <button type="submit" name="reserve">Confirm Reservation</button>
      </form>
    </div>

  </section>

</body>
</html>
