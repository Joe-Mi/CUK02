<style>
    /* Scope all hero styles inside .heropg to avoid affecting the rest of the site */
    .heropg {
        --brand: #d28a00;
        --dark: #0b0b0b;
        --white: #ffffff;
        --muted: rgba(255, 255, 255, 0.75);
        --glass: rgba(0, 0, 0, 0.45);
        --glass2: rgba(0, 0, 0, 0.65);
        --shadow: 0 18px 60px rgba(0, 0, 0, .35);
        --radius: 18px;
        color: var(--white);
        overflow-x: hidden;
    }

    .heropg * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    /* NAV DROPDOWNS */
    .heropg .nav-dropdown {
        position: relative;
        display: inline-flex;
        align-items: center;
    }

    .heropg .nav-parent {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.92);
        font-weight: 800;
        letter-spacing: 0.5px;
        font-size: 14px;
        text-transform: uppercase;
        cursor: pointer;
        padding: 0;
    }

    .heropg .nav-parent:hover {
        color: var(--brand);
    }

    .heropg .nav-parent .chev {
        width: 16px;
        height: 16px;
        fill: currentColor;
        opacity: .9;
        transition: 200ms ease;
    }

    .heropg .dropdown-menu {
        position: absolute;
        top: calc(100% + 14px);
        left: 0;
        min-width: 180px;
        background: rgba(0, 0, 0, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 14px;
        padding: 8px;
        backdrop-filter: blur(10px);
        box-shadow: 0 18px 50px rgba(0, 0, 0, .35);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transform: translateY(8px);
        transition: opacity 220ms ease, transform 220ms ease, visibility 0s linear 220ms;
    }

    .heropg .nav-dropdown.open .dropdown-menu {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateY(0);
        transition: opacity 220ms ease, transform 220ms ease, visibility 0s linear 0s;
    }

    .heropg .nav-dropdown.open .chev {
        transform: rotate(180deg);
    }

    .heropg .dropdown-menu a {
        display: block;
        padding: 10px 12px;
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        font-weight: 800;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: .3px;
        transition: 180ms ease;
    }

    .heropg .dropdown-menu a:hover {
        background: rgba(255, 255, 255, 0.06);
        color: var(--brand);
    }

    /* MOBILE */
    .heropg .mobile-dropbtn {
        width: 100%;
        background: transparent;
        border: none;
        color: #fff;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: .3px;
        padding: 12px 14px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
    }

    .heropg .mobile-dropbtn:hover {
        background: rgba(255, 255, 255, 0.06);
        color: var(--brand);
    }

    .heropg .mobile-dropmenu {
        display: none;
        padding: 6px 6px 10px 6px;
    }

    .heropg .mobile-dropmenu a {
        display: block;
        padding: 10px 14px;
        border-radius: 12px;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 700;
    }

    .heropg .mobile-dropmenu a:hover {
        background: rgba(255, 255, 255, 0.06);
        color: var(--brand);
    }

    .heropg .mobile-dropdown.active .mobile-dropmenu {
        display: block;
    }

    /* HERO */
    .heropg .hero {
        position: relative;
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        background: #000;
    }

    .heropg .hero-slide {
        position: absolute;
        inset: 0;
        opacity: 0;
        transform: scale(1.03);
        transition: opacity 800ms ease, transform 1200ms ease;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .heropg .hero-slide.active {
        opacity: 1;
        transform: scale(1);
    }

    .heropg .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.12) 0%, rgba(0, 0, 0, 0.05) 20%, rgba(0, 0, 0, 0.15) 100%), radial-gradient(circle at 2% 3%, rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.15));
        z-index: 1;
    }

    /* TOPBAR */
    .heropg .topbar {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 5;
        padding: 18px 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
    }

    .heropg .topbar-inner {
        width: min(1250px, 100%);
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 18px;
    }

    .heropg .nav-links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 26px;
        padding: 10px 18px;
        border-radius: 999px;
        background: rgba(0, 0, 0, 0.28);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .heropg .nav-links a {
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-size: 14px;
        text-transform: uppercase;
        transition: 200ms ease;
        position: relative;
    }

    .heropg .nav-links a:hover {
        color: var(--brand);
    }

    .heropg .nav-links a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 0%;
        height: 2px;
        background: var(--brand);
        transition: 250ms ease;
    }

    .heropg .nav-links a:hover::after {
        width: 100%;
    }

    .heropg .icon-btn {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: rgba(0, 0, 0, 0.35);
        cursor: pointer;
        transition: 200ms ease;
    }

    .heropg .icon-btn:hover {
        transform: translateY(-1px);
        border-color: rgba(255, 255, 255, 0.3);
        background: rgba(0, 0, 0, 0.55);
    }

    .heropg .menu-btn {
        display: none;
    }

    .heropg .mobile-nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.95);
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        z-index: 10;
        max-height: 0;
        overflow: hidden;
        transition: max-height 300ms ease;
    }

    .heropg .mobile-nav.active {
        max-height: 500px;
        overflow-y: auto;
    }

    .heropg .mobile-nav-content {
        padding: 20px 18px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .heropg .mobile-nav a {
        display: block;
        padding: 12px 14px;
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        border-radius: 8px;
        transition: 200ms ease;
    }

    .heropg .mobile-nav a:hover {
        background: rgba(255, 255, 255, 0.08);
        color: var(--brand);
    }

    .heropg .mobile-dropdown-btn {
        width: 100%;
        background: transparent;
        border: none;
        padding: 12px 14px;
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: 200ms ease;
    }

    .heropg .mobile-dropdown-btn:hover {
        background: rgba(255, 255, 255, 0.08);
        color: var(--brand);
    }

    .heropg .mobile-dropdown-btn .chevron {
        width: 14px;
        height: 14px;
        fill: currentColor;
        transition: 200ms ease;
    }

    .heropg .mobile-dropdown-btn.open .chevron {
        transform: rotate(180deg);
    }

    .heropg .mobile-submenu {
        display: none;
        padding: 0 14px 10px 28px;
        flex-direction: column;
        gap: 8px;
    }

    .heropg .mobile-dropdown-btn.open+.mobile-submenu {
        display: flex;
    }

    .heropg .mobile-submenu a {
        font-size: 12px;
        opacity: 0.85;
    }

    .heropg .left-logos {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-left: 6px;
    }

    .heropg .logo-card img {
        width: 96px;
        height: 96px;
        object-fit: contain;
    }

    .heropg .logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }

    .heropg .logo-text strong {
        font-size: 12px;
        letter-spacing: 0.4px;
        text-transform: uppercase;
        opacity: 0.92;
    }

    .heropg .right-badge {
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 6;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .heropg .psc-badge {
        width: 70px;
        height: 70px;
        border-radius: 999px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        display: grid;
        place-items: center;
    }

    .heropg .hero-content {
        position: relative;
        z-index: 2;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 180px 28px 70px;
    }

    .heropg .hero-inner {
        width: min(1250px, 100%);
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 30px;
        align-items: center;
    }

    .heropg .mission {
        max-width: 820px;
        animation: rise 900ms ease both;
    }

    @keyframes rise {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .heropg .mission-label {
        display: inline-block;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 18px;
        margin-bottom: 12px;
        position: relative;
        padding-bottom: 12px;
    }

    .heropg .mission-label::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 450px;
        height: 4px;
        background: var(--brand);
        border-radius: 999px;
    }

    .heropg .hero-title {
        font-size: clamp(40px, 4.2vw, 72px);
        line-height: 1.02;
        font-weight: 900;
        letter-spacing: -0.8px;
        margin-bottom: 14px;
        text-shadow: 0 18px 40px rgba(0, 0, 0, 0.45);
    }

    .heropg .highlight {
        color: var(--brand);
        font-weight: 900;
    }

    .heropg .hero-subtitle {
        font-size: 20px;
        color: var(--muted);
        max-width: 720px;
        line-height: 1.35;
        margin-top: 10px;
        margin-bottom: 22px;
    }

    .heropg .hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .heropg .btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: clamp(10px, 2vw, 14px) clamp(14px, 3vw, 20px);
        border-radius: 999px;
        font-weight: 800;
        text-decoration: none;
        border: 1px solid transparent;
        transition: 220ms ease;
        letter-spacing: 0.3px;
        text-transform: uppercase;
        font-size: clamp(11px, 2vw, 14px);
    }

    .heropg .btn svg {
        width: clamp(16px, 2.5vw, 20px);
        height: clamp(16px, 2.5vw, 20px);
        flex-shrink: 0;
    }

    .heropg .btn-primary {
        background: var(--brand);
        color: #111;
        box-shadow: 0 18px 45px rgba(210, 138, 0, .25);
    }

    .heropg .btn-dark {
        background: rgba(0, 0, 0, 0.75);
        color: #fff;
        border-color: rgba(255, 255, 255, 0.12);
    }

    .heropg .hero-side {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-right: 70px;
    }

    .heropg .side-card {
        width: min(430px, 100%);
        background: rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: var(--radius);
        padding: 25px;
        backdrop-filter: blur(10px);
        box-shadow: var(--shadow);
        animation: rise 1100ms ease both;
        animation-delay: 120ms;
    }

    .heropg .social-float {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-30%);
        z-index: 6;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background: rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 14px;
        padding: 10px;
        backdrop-filter: blur(10px);
    }

    .heropg .social-float a {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: 200ms ease;
        text-decoration: none;
    }

    .heropg .carousel-controls {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 18px;
        z-index: 7;
        width: min(1250px, 100%);
        padding: 0 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .heropg .dot {
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.28);
        border: 1px solid rgba(255, 255, 255, 0.18);
        cursor: pointer;
        transition: 200ms ease;
    }

    .heropg .dot.active {
        width: 26px;
        background: var(--brand);
        border-color: rgba(0, 0, 0, 0.2);
    }

    .heropg .arrows {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .heropg .arrow-btn {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(0, 0, 0, 0.55);
        backdrop-filter: blur(8px);
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: 200ms ease;
    }

    .heropg .arrow-btn:hover {
        transform: translateY(-2px);
        border-color: rgba(255, 255, 255, 0.25);
        background: rgba(0, 0, 0, 0.75);
    }

    .heropg .arrow-btn svg {
        width: 18px;
        height: 18px;
        fill: #fff;
    }

    .heropg .dots {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .heropg .social-float svg {
        fill: #fff;
    }

    .heropg .icon-btn svg {
        fill: #fff;
        opacity: .92;
    }

    @media (max-width:980px) {
        .heropg .hero-inner {
            grid-template-columns: 1fr;
        }

        .heropg .topbar-inner {
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .heropg .btn {
            padding: 12px 16px;
            font-size: 12px;
        }

        .heropg .btn svg {
            width: 16px;
            height: 16px;
        }

        .heropg .left-logos {
            justify-content: flex-start;
        }

        .heropg .nav-right {
            display: flex;
            justify-content: flex-end;
        }

        .heropg .social-float {
            display: none;
        }

        .heropg .nav-links {
            display: none;
        }

        .heropg .menu-btn {
            display: grid;
        }

        .heropg .hero-content {
            padding-top: 100px;
        }
    }

    @media (max-width:480px) {
        .heropg .hero-content {
            padding-top: 80px;
        }

        .heropg .topbar {
            padding: 12px 18px;
        }

        .heropg .logo-card img {
            width: 70px;
            height: 70px;
        }

        .heropg .btn {
            padding: 10px 12px;
            font-size: 11px;
            gap: 6px;
        }

        .heropg .btn svg {
            width: 14px;
            height: 14px;
        }
    }
</style>

<div class="heropg">
    <section class="hero" id="top">

        <div class="hero-slide active" data-slide="0"
            style="background-image: url('{{ asset('assets/img/background 2.jpg') }}');"></div>
        <div class="hero-slide" data-slide="1"
            style="background-image: url('{{ asset('assets/img/thematics.jpg') }}');">
        </div>
        <div class="hero-slide" data-slide="2" style="background-image: url('{{ asset('assets/img/cover.jpg') }}');">
        </div>

        <div class="hero-overlay"></div>

        <header class="topbar">
            <div class="topbar-inner">
                <div class="left-logos">
                    <div class="logo-card">
                        <img src="{{ asset('assets/img/cooperative logo.jfif') }}" alt="cooperative Kenya" />
                    </div>
                </div>

                <nav class="nav-links" aria-label="Main Navigation">
                    <div class="nav-dropdown">
                        <button class="nav-parent" type="button" aria-expanded="false">About Us
                            <svg class="chev" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route(name: 'committee')}}">Joint Co-operative Conference 2025 Organizers</a>
                            <a href="{{route(name: 'thematic')}}">Thematic areas</a>
                            <a href="{{ route(name: 'program') }}">Conference Program</a>
                        </div>
                    </div>

                    <a href="{{ route(name: 'sponsors') }}">Sponsors and Exhibitors</a>

                    <div class="nav-dropdown">
                        <button class="nav-parent" type="button" aria-expanded="false">Resources
                            <svg class="chev" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('visa') }}">Visa Guidelines</a>
                            <a href="{{ route('hotels') }}">Hotels</a>
                        </div>
                    </div>

                    <a href="href={{ route(name: 'wall') }}">Ushirika Wall of Fame (2024)</a>

                    <div class="nav-dropdown">
                        <button class="nav-parent" type="button" aria-expanded="false">Conference 2024
                            <svg class="chev" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5H7z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route(name: 'speech')}}">2024 Conference Presentations</a>
                            <a href="{{route(name: 'gallery')}}">2024 Photo gallery</a>
                        </div>
                    </div>
                </nav>

                <div class="nav-right">
                    <button class="icon-btn menu-btn" id="menuBtn" aria-label="Open Menu">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 6h18v2H3V6Zm0 5h18v2H3v-2Zm0 5h18v2H3v-2Z" />
                        </svg>
                    </button>
                </div>
            </div>


        </header>

        <nav class="mobile-nav" id="mobileNav">
            <div class="mobile-nav-content">
                <button class="mobile-dropdown-btn" type="button">About Us
                    <svg class="chevron" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5H7z" />
                    </svg>
                </button>
                <div class="mobile-submenu">
                    <a href="{{route(name: 'committee')}}">Joint Co-operative Conference 2025 Organizers</a>
                    <a href="{{route(name: 'thematic')}}">Thematic areas</a>
                    <a href="{{ route(name: 'program') }}">Conference Program</a>
                </div>

                <a href="{{ route(name: 'sponsors') }}">Sponsors and Exhibitors</a>

                <button class="mobile-dropdown-btn" type="button">Resources
                    <svg class="chevron" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5H7z" />
                    </svg>
                </button>
                <div class="mobile-submenu">
                    <a href="{{ route('visa') }}">Visa Guidelines</a>
                    <a href="{{ route('hotels') }}">Hotels</a>
                </div>

                <a href="{{ route(name: 'wall') }}">Ushirika Wall of Fame (2024)</a>

                <button class="mobile-dropdown-btn" type="button">Conference 2024
                    <svg class="chevron" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5H7z" />
                    </svg>
                </button>
                <div class="mobile-submenu">
                    <a href="{{route(name: 'speech')}}">2024 Conference Presentations</a>
                    <a href="{{route(name: 'gallery')}}">2024 Photo gallery</a>
                </div>
            </div>
        </nav>

        <div class="social-float" aria-label="Social Links">
            <a href="#" title="Facebook"><svg viewBox="0 0 24 24">
                    <path
                        d="M13 22v-8h3l1-4h-4V7.5c0-1 .3-1.5 1.7-1.5H18V2.2C17.3 2.1 15.9 2 14.2 2 10.7 2 9 4.1 9 7.1V10H6v4h3v8h4Z" />
                </svg></a>
            <a href="#" title="LinkedIn"><svg viewBox="0 0 24 24">
                    <path
                        d="M6.9 6.6a2.1 2.1 0 1 1 0-4.2 2.1 2.1 0 0 1 0 4.2ZM4.8 21.6V8.4H9v13.2H4.8ZM20.6 21.6h-4.2v-6.4c0-1.5 0-3.4-2.1-3.4s-2.4 1.6-2.4 3.3v6.5H7.7V8.4h4v1.8h.1c.6-1 2-2.1 4-2.1 4.3 0 5.1 2.8 5.1 6.5v7Z" />
                </svg></a>
            <a href="#" title="X / Twitter"><svg viewBox="0 0 24 24">
                    <path
                        d="M18.9 2H22l-6.8 7.8L23 22h-6.6l-5.2-6.7L5.4 22H2l7.3-8.4L1 2h6.8l4.7 6.1L18.9 2Zm-1.2 18h1.7L7.7 3.9H5.9L17.7 20Z" />
                </svg></a>
            <a href="#" title="YouTube"><svg viewBox="0 0 24 24">
                    <path
                        d="M21.6 7.2s-.2-1.5-.8-2.1c-.8-.8-1.7-.8-2.1-.9C15.7 4 12 4 12 4h0s-3.7 0-6.7.2c-.4 0-1.3.1-2.1.9-.6.6-.8 2.1-.8 2.1S2 9 2 10.8v1.7c0 1.8.4 3.6.4 3.6s.2 1.5.8 2.1c.8.8 1.9.8 2.4.9 1.7.2 6.4.2 6.4.2s3.7 0 6.7-.2c.4 0 1.3-.1 2.1-.9.6-.6.8-2.1.8-2.1s.4-1.8.4-3.6v-1.7c0-1.8-.4-3.6-.4-3.6ZM10.5 14.8V8.8l6.2 3-6.2 3Z" />
                </svg></a>
        </div>

        <div class="hero-content">
            <div class="hero-inner">
                <div class="mission">
                    <div class="mission-label">The Cooperative University Of Kenya</div>
                    <h1 class="hero-title">Welcome to the<br /><span class="highlight">Joint</span>, <span
                            class="highlight">Co-operative</span> &amp; <span
                            class="highlight">Conference</span><br />2025
                    </h1>
                    <p class="hero-subtitle">The 4th Co-operative Movement Stakeholders' Annual Conference &amp; The 8th
                        CUK
                        Annual Scientific Conference 2025</p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="{{ route('tickets.index') }}">Register Now<svg
                                viewBox="0 0 24 24">
                                <path d="M14 3h7v7h-2V6.4l-9.3 9.3-1.4-1.4L17.6 5H14V3ZM5 5h6v2H7v10h10v-4h2v6H5V5Z" />
                            </svg></a>
                        <a class="btn btn-dark" href="{{ route('program') }}">View Programmes<svg viewBox="0 0 24 24">
                                <path d="M14 3h7v7h-2V6.4l-9.3 9.3-1.4-1.4L17.6 5H14V3ZM5 5h6v2H7v10h10v-4h2v6H5V5Z" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-controls">
            <div class="arrows">
                <button class="arrow-btn" id="prevBtn" aria-label="Previous Slide"><svg viewBox="0 0 24 24">
                        <path d="M15.4 7.4 14 6l-6 6 6 6 1.4-1.4L10.8 12l4.6-4.6Z" />
                    </svg></button>
                <button class="arrow-btn" id="nextBtn" aria-label="Next Slide"><svg viewBox="0 0 24 24">
                        <path d="m8.6 16.6 1.4 1.4 6-6-6-6-1.4 1.4L13.2 12l-4.6 4.6Z" />
                    </svg></button>
            </div>
            <div class="dots" id="dots"></div>
        </div>

    </section>
</div>

<script>
    // Carousel & dropdown scripts (scoped to this hero include)
    const slides = Array.from(document.querySelectorAll('.hero-slide'));
    const dotsWrap = document.getElementById('dots');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let current = 0; let autoTimer = null; const interval = 4000;
    slides.forEach((_, i) => { const dot = document.createElement('button'); dot.className = 'dot' + (i === 0 ? ' active' : ''); dot.setAttribute('aria-label', 'Go to slide ' + (i + 1)); dot.addEventListener('click', () => goTo(i, true)); dotsWrap.appendChild(dot); });
    const dots = Array.from(document.querySelectorAll('.dot'));
    function setActive(index) { slides.forEach(s => s.classList.remove('active')); dots.forEach(d => d.classList.remove('active')); slides[index].classList.add('active'); dots[index].classList.add('active'); current = index; }
    function next(manual = false) { const index = (current + 1) % slides.length; setActive(index); if (manual) restartAuto(); }
    function prev(manual = false) { const index = (current - 1 + slides.length) % slides.length; setActive(index); if (manual) restartAuto(); }
    function goTo(index, manual = false) { setActive(index); if (manual) restartAuto(); }
    function startAuto() { autoTimer = setInterval(() => next(false), interval); }
    function stopAuto() { if (autoTimer) clearInterval(autoTimer); autoTimer = null; }
    function restartAuto() { stopAuto(); startAuto(); }
    nextBtn.addEventListener('click', () => next(true)); prevBtn.addEventListener('click', () => prev(true));
    const hero = document.querySelector('.hero'); hero.addEventListener('mouseenter', stopAuto); hero.addEventListener('mouseleave', startAuto); startAuto();

    // Mobile menu
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');
    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', () => {
            mobileNav.classList.toggle('active');
        });

        // Close mobile menu when a link is clicked
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileNav.classList.remove('active');
            });
        });

        // Mobile dropdown functionality
        const mobileDropdownBtns = mobileNav.querySelectorAll('.mobile-dropdown-btn');
        mobileDropdownBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                btn.classList.toggle('open');
            });
        });
    }

    // Multi dropdown system
    const dropdowns = document.querySelectorAll('.nav-dropdown'); dropdowns.forEach(drop => { const btn = drop.querySelector('.nav-parent'); const menu = drop.querySelector('.dropdown-menu'); btn.addEventListener('click', (e) => { e.stopPropagation(); dropdowns.forEach(d => { if (d !== drop) { d.classList.remove('open'); const b = d.querySelector('.nav-parent'); if (b) b.setAttribute('aria-expanded', 'false'); } }); const isOpen = drop.classList.toggle('open'); btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false'); }); menu.addEventListener('click', e => e.stopPropagation()); menu.querySelectorAll('a').forEach(link => { link.addEventListener('click', () => { drop.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); }); }); });
    document.addEventListener('click', () => { dropdowns.forEach(drop => { drop.classList.remove('open'); const btn = drop.querySelector('.nav-parent'); if (btn) btn.setAttribute('aria-expanded', 'false'); }); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') { dropdowns.forEach(drop => { drop.classList.remove('open'); const btn = drop.querySelector('.nav-parent'); if (btn) btn.setAttribute('aria-expanded', 'false'); }); } });
</script>