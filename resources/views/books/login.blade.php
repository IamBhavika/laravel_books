@include('cdn')
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
<div id="login" class="container-fluid">
    <h2>Login</h2>
    <form method="post" action="/save-login">
        @csrf
        <div class="mb-3 email">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
            <span style="color: red"> @error('email'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3 password">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <span style="color: red"> @error('password') {{ $message }} @enderror</span>
        </div>
        <div class="captcha">
            {{--            {!! NoCaptcha::renderJs() !!}--}}
            {{--            {!! NoCaptcha::display() !!}--}}
            <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
            <span style="color: red"> @error('g-recaptcha-response') {{ $message }} @enderror</span>
        </div>
        <button type="submit" class="btn btn-success submit">Submit</button>
    </form>
</div>
<div class="backHome">
    <a href="/">Back to home page</a>
</div>
{{--<script type="text/javascript">--}}
{{--    var onloadCallback = function() {--}}
{{--        alert("grecaptcha is ready!");--}}
{{--    };--}}
{{--</script>--}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"--}}
{{--        async defer>--}}
{{--</script>--}}




