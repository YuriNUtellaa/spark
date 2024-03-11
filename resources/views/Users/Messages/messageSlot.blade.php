@extends('header')
@extends('footer')

<body>
    
    <section class="section-message-account">
        <div class="message-account">
            <h2 class="header">{{ $mail->title }}</h2>
            <p class="dear">Dear <strong>{{ $user->username }}</strong>,</p>
            <p class="body">{{ $mail->content }}</p>
            <p class="footer">Warm Regard <br> - <strong>SPark Management Team</strong></p>
        </div>
    </section>  

</body>
</html>