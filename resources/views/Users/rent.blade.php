@extends('header')
@extends('footer')

<body>

  <section style="display: flex; justify-content: center; align-items: center; height: 90vh; background-color: #eee;">
    
    <div class="available" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 300px;">
      <h2>Rent Slot</h2>
      <h3>Slot Number: {{ $slot->slot_number }}</h3>
      <p>Status: {{ $slot->status }}</p>

      @if($alreadyRented)
        <p style="color: red;">You already have an active rental. You cannot rent another slot at this time.</p>
      @else 
        <form action="{{ route('confirm-rent') }}" method="POST">
          @csrf
          <input type="hidden" name="slot_id" value="{{ $slot->id}}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button name="details" type="submit">Confirm Rental</button>
          <a href="{{ route('slots') }}" style="color: rgb(232, 113, 33)">Back</a>
        </form>
      @endif
    </div>

  </section>

</body>
</html>

