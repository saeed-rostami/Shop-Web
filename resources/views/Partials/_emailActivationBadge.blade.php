@if(auth()->user()->email &&  auth()->user()->email_verified_at === null)
    <span class="badge badge-warning rounded mb-1 blink">!</span>
@endif


