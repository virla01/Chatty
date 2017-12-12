<div class="media">
    <a href="{{ route('profile.index', ['username' => $user->username]) }}"><img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->getNameOrUsername() }}" class="mr-2"></a>
    <div class="media-body">
        <h5 class="mt-0"><a href="{{ route('profile.index', ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a></h5>
        <p>
            @if ($user->location)
                {{ $user->location }}
            @endif
        </p>
    </div>
</div>
