@extends('header')
@extends('footer')

<body>

  <section class="section-rent">
    
    <div class="rent">
      <h2>Rent Slot</h2>
      <h3>Slot Number: {{ $slot->slot_number }}</h3>
      <p>Status: {{ $slot->status }}</p>
      
      <form action="{{ route('confirm-rent-admin') }}" method="POST">
        @csrf
        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="hidden" name="type" value="irregular">
        <button name="details" type="submit">Confirm Rental</button>
        <a href="{{ route('slots-control-admin') }}" style="color: rgb(232, 113, 33)">Back</a>
      </form>
    </div>

  </section>

</body>
</html>