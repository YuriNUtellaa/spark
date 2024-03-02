@extends('header')
@extends('footer')

<body>

    @auth('admin')

    <section class="home-section">
        <div class="overall-slots">
            <h2 name="heading">ADMIN SLOT CONTROL</h2>
            <div class="slots">
                @foreach($slots as $slot)
                <div class="slot @if($slot->status === 'occupied') occupied @elseif($slot->status === 'reserved') reserved @else available @endif">
                    <h2>{{$slot->slot_number}}</h2>
                    <h5>{{$slot->status}}</h5>
                    <span>End: </span>
                    <p>{{$slot->updated_at}}</p>
                    @if($slot->status === 'available')
                        <form action="{{ route('rentAdmin', ['slot' => $slot->id]) }}" method="GET">
                            <button type="submit" name="rent">Rent a User</button>
                        </form>
                        <form action="{{ route('reserveAdmin', ['slot' => $slot->id]) }}" method="GET">
                            <button type="submit" name="reserve">Reserve a User</button>
                        </form>
                    @elseif($slot->status === 'occupied')
                        <button name="details" disabled>Details</button>
                        <form action="{{ route('end-renting-admin', ['slot' => $slot->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="cancel">End Renting</button>
                        </form>
                    @elseif($slot->status === 'reserved')
                        <button name="details" disabled>Details</button>
                        <button name="cancel" disabled>Cancel Reservation</button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @else

    <section class="home-section">
        <div class="overall-slots">
            <h2 name="heading">ADMIN SLOT CONTROL</h2>
            <span>INVALID ADMIN AUTHENTICATION</span>
        </div>
    </section>

    @endauth

</body>
</html>
