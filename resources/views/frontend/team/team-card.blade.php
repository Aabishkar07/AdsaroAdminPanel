<div class="member">
    <div class="pic">
        <img src="{{ asset('uploads/' . $team->image) }}" class="img-fluid grayscale" alt="{{ $team->name }}">
    </div>
    <div class="member-info">
        <h4>{{ $team->name }}</h4>
        <span>{{ $team->designation }}</span>
        <div class="social">
            @if ($team->website)
                <a target="_blank" href="{{ $team->website }}"><i class="bi bi-globe text-black"></i></a>
            @endif
            @if ($team->linkedin)
                <a target="_blank" href="{{ $team->linkedin }}"><i class="bi bi-linkedin text-black"></i></a>
            @endif
        </div>
    </div>
</div>
