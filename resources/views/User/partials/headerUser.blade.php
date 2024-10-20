<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            Concertly
        </a>

        <a href="{{ route('ticketpage') }}" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Artists</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Contact</a>
                </li>
            </ul>

            @if (Auth::check())
                <div class="dropdown">
                    <button class="btn custom-btn d-lg-block d-none" onclick="toggleDropdown()">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" id="dropdownMenu" style="display: none;">
                        <form action="{{ route('logoutuser') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('showlogin') }}" class="btn custom-btn d-lg-block d-none">Login</a>
            @endif
        </div>
    </div>
</nav>

<style>
    /* Basic styles for dropdown */
    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        /* Align below the button */
        right: 0;
        /* Align to the right */
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .dropdown-item {
        padding: 10px 20px;
        border: none;
        background: transparent;
        cursor: pointer;
        text-align: left;
        display: block;
    }

    .dropdown-item:hover {
        background: #f1f1f1;
        /* Change background on hover */
    }
</style>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    }

    // Close the dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.btn.custom-btn')) {
            const dropdown = document.getElementById('dropdownMenu');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    }
</script>
