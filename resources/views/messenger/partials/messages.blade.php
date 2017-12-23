<div class="row">
    <div class="col s8 offset-s2 z-depth-5">
        <div class="col s12 m4 center-align">
            @if ($message->user->photo)
                <img class="responsive-img circle" height="100" width="100" src="/images/{{ $message->user->photo ? $message->user->photo->photo : '' }}" alt="{{ str_limit($message->user->name, 50) }}" />
            @else
                <img class="responsive-img" height="100" width="100" src="{{ asset('images/user.png') }}">
            @endif
        </div>
        <div class="col s12 m8 center-align">
            <h5><strong>{{ $message->user->name }}</strong></h5>
            <div class="divider"></div>
            <p>{{ $message->body }}</p>
            <div class="divider"></div>
            <p>
                <em>Enviado {{ $message->created_at->diffForHumans() }}</em>
            </p>
        </div>
    </div>
</div>