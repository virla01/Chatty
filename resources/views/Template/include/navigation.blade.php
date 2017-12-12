    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Chatty</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                @if (Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('friend.index') }}">Friends</a></li>
                    </ul>
                @endif
                <ul class="navbar-nav ml-auto p-2">
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->getNameOrUsername() }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index',['username' => Auth::user()->username]) }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Update profile</a>
                                <a class="dropdown-item" href="{{ route('auth.signout') }}">Sign out</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('auth.signup') }}">Sign up</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('auth.signin') }}">Sign in</a></li>
                    @endif
                </ul>
                @if (Auth::check())
                    <form class="form-inline my-2 my-lg-0" role="search" action="{{ route('search.results') }}">
                        <input class="form-control mr-sm-2" type="search" value="" name="query" placeholder="Find people">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
