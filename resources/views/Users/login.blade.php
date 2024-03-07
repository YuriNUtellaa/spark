@extends('header')
@extends('footer')

<body>

  <section class="user-login-page">
    <div class="login-page">
      
      <form class="form-login-page" action="/login" method="POST">
        @csrf
        <h2>LOGIN PAGE</h2>

        @if ($errors->any())
        <div class="error-message">
            <span>{{ $errors->first('error') }}</span>
        </div>
        @endif

        @if (session('success'))
          <div class="success-message">
              <span>{{ session('success') }}</span>
          </div>
       @endif

        <input name="username" type="text" placeholder="Enter your Username">
        @error('username') <span class="error">{{ $message }}</span>@enderror
        <input name="password" type="password" placeholder="Enter your Password">
        @error('password') <span class="error">{{ $message }}</span>@enderror
        <button>Login</button>
        <p>Don't have account? <a href="register">Register</a> now!</p>
      </form>

    </div>
  </section>
  
</body>


