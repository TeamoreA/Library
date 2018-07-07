<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @auth
                @if(Auth::user()->role_id == 1)
                <a class="navbar-brand" href="{{ url('/home') }}">

                    <i class="fas fa-hotel"></i> {{ config('app.name', 'CIT-Library') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('books.create') }}" class="nav-link">Create Books</a></li>
                        <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link">All Books</a></li>
                        <li class="nav-item"><a href="{{ route('admin.create') }}" class="nav-link">Return Book</a></li>
                        
                    </ul>
                @else
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Profile</a></li> --}}
                        {{-- <li class="nav-item"><a href="#" class="nav-link">Genres</a></li> --}}
                        <li class="nav-item"><a href="{{ route('borrowbooks.index') }}" class="nav-link">Borrow books</a></li>
                        {{-- <li class="nav-item"><a href="#" class="nav-link">Return books</a></li> --}}
                    </ul>

                @endif
                @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Sign In') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> <i class="fas fa-registered"></i> {{ __('Sign Up') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user-alt"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('users.index') }}" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>