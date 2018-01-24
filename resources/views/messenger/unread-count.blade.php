<?php $count = Auth::user()->newThreadsCount();?>
@if($count > 0)
    <span class="new badge amber accent-4" data-badge-caption="nuevo(s)">{{ $count }}</span>
@endif
