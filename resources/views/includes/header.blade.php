<header class="py-3 px-5 border bg-light d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('base') }}" class="text-dark text-decoration-none">Home</a>
        </div>
        <div>
            @if (Route::has('login'))
                <nav class="d-flex align-items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-dark text-decoration-none">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-dark text-decoration-none">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-dark text-decoration-none">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
</header>
