@if(auth()->user()->email !== null &&  auth()->user()->email_verified_at === null)
    <span class="badge badge-warning rounded mb-1">!</span>
@endif


