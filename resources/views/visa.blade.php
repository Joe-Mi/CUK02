<x-layout>
    <!-- Landing Page -->
    <div class="header">
        <div class="overlay">
            <h1>Visa guidelines</h1>
            <p>Your Pathway to Seamless Travel !</p>
        </div>
    </div>

    <!--Main body-->
    <div class="container">
        <div class="accordion">

            <!-- Accordion 1: How to Apply -->
            <div class="accordion-item active">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    <i class="fas fa-clipboard-list"></i> How to Apply
                    <span class="accordion-dropdown"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="accordion-content">
                    <p>The Directorate of Immigration Services has launched <a href="https://evisa.go.ke"
                            target="_blank">evisa.go.ke</a> where visitors can apply for the Kenya Evisa online.</p>
                    <p>Follow these steps to apply:</p>
                    <ol>
                        <li>Visit <a href="https://evisa.go.ke" target="_blank">evisa.go.ke</a> and create an account.
                        </li>
                        <li>Click on "Evisa Application".</li>
                        <li>Fill in the visa application form.</li>
                        <li>Make payment using Visa Card, Mastercard, or other debit/credit cards.</li>
                        <li>Await approval, then download and print your eVisa.</li>
                        <li>You can access your visa via email or by signing in to your Evisa account.</li>
                    </ol>
                </div>
            </div>

            <!-- Accordion 2: Requirements -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    <i class="fas fa-file-alt"></i> Requirements
                    <span class="accordion-dropdown"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="accordion-content">
                    <p>To obtain a Kenyan eVisa, you need:</p>
                    <ul>
                        <li>A valid passport (at least 6 months with 2 blank pages).</li>
                        <li>An active email address for eVisa confirmation.</li>
                        <li>A means of online payment.</li>
                    </ul>
                    <p>For detailed requirements, visit <a href="https://evisa.go.ke/eligibility"
                            target="_blank">evisa.go.ke</a>.</p>
                    <p>Kenyan visas are issued electronically, and travelers must apply before departure. Apply at <a
                            href="https://etakenya.go.ke/en" target="_blank">etakenya.go.ke</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <!--MAIL HOVERING BUTTON-->
    <a href="mailto:coopconference@cuk.ac.ke" class="floating-button">
        <i class="fas fa-envelope"></i>
        <span class="button-label">Need help? Send us an email</span>
    </a>
</x-layout>