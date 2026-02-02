import './bootstrap';


//FOOTER

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    if (menuToggle && navLinks) {
        // Toggle mobile menu
        menuToggle.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent click event from bubbling up
            navLinks.classList.toggle('show');
        });


        // Close menu if clicked outside
        document.addEventListener('click', function (e) {
            if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
                navLinks.classList.remove('show');
            }
        });
    }


    // Toggle dropdowns
    if (dropdownToggles.length > 0) {
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default link behavior
                const dropdown = this.nextElementSibling;
                if (dropdown) {
                    dropdown.classList.toggle('show');
                }
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function (e) {
                dropdownToggles.forEach(toggle => {
                    const dropdown = toggle.nextElementSibling;
                    if (dropdown && !toggle.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.remove('show');
                    }

                });
            });
        });
    }
});

// Day counter
const targetDate = new Date("2025-07-22T09:00:00").getTime();

const countdownElement = document.querySelector('.countdown');
if (countdownElement) {
    const countdown = () => {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance <= 0) {
            countdownElement.innerHTML = "The event has started!";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const d = document.getElementById("days");
        const h = document.getElementById("hours");
        const m = document.getElementById("minutes");
        const s = document.getElementById("seconds");

        if (d) d.textContent = String(days).padStart(2, '0');
        if (h) h.textContent = String(hours).padStart(2, '0');
        if (m) m.textContent = String(minutes).padStart(2, '0');
        if (s) s.textContent = String(seconds).padStart(2, '0');
    };

    setInterval(countdown, 1000);
    countdown();
}

//Pop up effect 
//Pop up effect 
window.onload = function () {
    const popup = document.getElementById("popup");
    if (popup) {
        popup.style.visibility = "visible";
        popup.style.opacity = "1";
    }
};

// Close popup function
// Close popup function
window.closePopup = function () {
    document.getElementById("popup").style.opacity = "0";
    setTimeout(() => {
        document.getElementById("popup").style.visibility = "hidden";
    }, 300);
}


// Counter 
const counters = document.querySelectorAll('.counter-number');
let started = false;

function animateCounter(counter) {
    const target = +counter.getAttribute('data-target');
    const increment = target / 200;

    function update() {
        const current = +counter.innerText;
        if (current < target) {
            counter.innerText = Math.ceil(current + increment);
            requestAnimationFrame(update);
        } else {
            counter.innerText = target;
        }
    }

    update();
}

function handleScroll() {
    const sectionTop = document.querySelector('.counters').getBoundingClientRect().top;
    const triggerPoint = window.innerHeight;

    if (sectionTop < triggerPoint && !started) {
        counters.forEach(animateCounter);
        started = true;
    }
}
if (document.querySelector('.counters')) {
    window.addEventListener('scroll', handleScroll);
}