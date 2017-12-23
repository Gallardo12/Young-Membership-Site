<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : '';?>

<div class="container">
    <div class="card">
        <div class="card-content">
            <span class="card-title"><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a><span class="new badge" data-badge-caption="sin leer">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span></span>
            <div class="divider"></div>
            <p class="flow-text">
                {{ $thread->latestMessage->body }}
            </p>
            <div class="divider"></div><br><br>
            <p>
                <strong>Creador:</strong> {{ $thread->creator()->name }}
            </p>
            <p>
                <strong>Participantes:</strong> {{ $thread->participantsString(Auth::id()) }}
            </p>
        </div>
    </div>
</div>