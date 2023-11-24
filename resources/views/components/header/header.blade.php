<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <x-header.links/>
                </ul>
            @endauth
            <!-- Right Side Of Navbar -->
            <x-header.guest-header/>
        </div>
    </div>
</nav>
