@props(['hideNavbar' => false])

<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - CUK' : 'Co-operative University of Kenya' }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('script')
</head>

<body class="page">

    @unless($hideNavbar)
        <div class="top-navbar">
            <div class="left-section">
                <i class="fas fa-calendar-alt"></i><span class="date"><b> 22-24 July 2025</b></span>
            </div>

            <div class="right-section">
                <i class="fas fa-map-marker-alt"></i><span class="location"> Lake Naivasha Sawela Lodge</span>
            </div>
        </div>

        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('assets/img/cooperative logo.jfif') }}" alt="School Logo" class="logo">
            </div>
            <div class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </div>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="{{ route('home') }}"> <i class="fas fa-home"></i> Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"><i class="fas fa-info-circle"></i> About <i
                                class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="{{ route('committee') }}">Joint Co-operative Conference 2025 Organizers</a>
                            <a href="{{ route('thematic') }}">Thematic areas</a>
                            <a href="{{ route('program') }}">Conference Program</a>
                        </div>
                    </li>
                    <li><a href="{{ route('sponsors') }}"><i class="fas fa-handshake"></i> Sponsors and Exhibitors </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-book"></i> Resources <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ route('visa') }}">Visa Guidelines</a>
                            <a href="{{ route('hotels') }}">Hotels</a>
                        </div>
                    </li>
                    <li><a href="{{ route('wall') }}"><i class="fas fa-bullseye"></i> Ushirika Wall of Fame (2026) </a></li>
                    <li><a href="{{ route('tickets.index') }}"><i class="fas fa-user-plus"></i> Register </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-info-circle"></i>Conference 2026<i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ route('conference2026') }}" target="_blank">2026 Conference </a>
                            <a href="{{ route('speech') }}">2026 Conference Presentations </a>
                            <a href="{{ route('gallery') }}">2026 Photo gallery </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    @endunless

    <main>
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="footer-section">
            <h3><i class="fas fa-university"></i> The Co-operative University of Kenya </h3>
            <p><i class="fas fa-map-marker-alt"></i> Address: P.O Box 24814-00502 Karen, Nairobi </p>
            <br />
            <p><i class="fas fa-envelope"></i> coopconference@cuk.ac.ke</p>
            <br />
            <p><i class="fas fa-phone"></i> Phone: +254 724 311 606</p>
        </div>
        <div class="footer-section">
            <h3><i class="fas fa-link"></i> Quick Links</h3>
            <ul>
                <li><a href="https://conference.cuk.ac.ke/">Conference 2024</a></li>
                <li><a href="registration.php"> Register </a></li>
                <!-- <li><a href="cuk9/index.php" target="_blank">2024 Conference </a></li> -->
            </ul>
        </div>
        <div class="footer-section">
            <h3><i class="fas fa-share-alt"></i> Follow Us</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/CoopVarsityKE"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/CoopVarsityKE"><i class="fab fa-twitter"></i></a>
                <a href="https://ke.linkedin.com/company/the-co-operative-university-of-kenya"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

    </footer>
    <div class="footer-bottom">
        <br />
        <p><img src="{{ asset('assets/img/coop uni.png') }}" alt="Company Logo"> &copy; 2025 The Co-operative University
            of Kenya. All Rights Reserved.</p>
    </div>
</body>

</html>