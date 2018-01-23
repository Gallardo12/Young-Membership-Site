<?php $count = Auth::user()->newThreadsCount();?>
@if($count > 0)
    <span class="new badge amber acent-4" data-badge-caption="nuevo(s)">{{ $count }}</span>
@endif
