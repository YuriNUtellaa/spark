@extends('header')


<body>

  @auth('admin')
      
  
  <section class="section-reserve">
    
    <div class="reserve">
      <h2>Reserve Slot</h2>
      <h3>Slot Number: {{ $slot->slot_number }}</h3>
      <p>Status: {{ $slot->status }}</p>
      <form action="{{ route('confirm-reserve-admin') }}" method="POST">
        @csrf
        <input type="hidden" name="slot_id" value="{{ $slot->id }}">

        <div class="form-group">
          <label>Select User:</label>
          <select name="user_id" required>
            <option value="">Select User</option>
            @foreach($regularUsers as $user)
              <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
          <label for="start_time">Start Time:</label>
          <input type="datetime-local" id="start_time" name="start_time" required>
        </div>
        
        <div class="form-group">
          <label for="end_time">End Time:</label>
          <input type="datetime-local" id="end_time" name="end_time" required>
        </div>

        <div class="form-group">
          <button type="submit" name="orange">Confirm Reservation</button>
        </div>
        

      </form>
    </div>

  </section>
@endauth
</body>
</html>
