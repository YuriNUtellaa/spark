@extends('header')
@extends('footer')

<body>

    <section class="section-notification">
        <div class="notifications">
            <h2>Notifications</h2>
            <div class="notification">
                @foreach($notifications as $notification)
                    <div class="item">
                        <i class='bx bx-envelope'></i>
                        <a href="{{ $notification->type === 'Account' ? route('messageAccount', ['id' => $notification->id]) : route('message-slot', ['id' => $notification->id]) }}">
                            
                            <h3>{{ $notification->title }}</h3>
                            
                        </a>
                        <p>{{ $notification->created_at->format('F d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</body>
</html>
