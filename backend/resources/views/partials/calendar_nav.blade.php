@if ($allow_prev)
    <a class="Calendar-nav" href="{{ $prev_url }}"><i class="icon-left-open-big"></i></a>
@else
    <span class="Calendar-nav is-disabled"><i class="icon-left-open-big"></i></span>
@endif
{{ $start->format('F Y') }}
@if ($allow_next)
    <a class="Calendar-nav" href="{{ $next_url }}"><i class="icon-right-open-big"></i></a>
@else
    <span class="Calendar-nav is-disabled"><i class="icon-right-open-big"></i></span>
@endif