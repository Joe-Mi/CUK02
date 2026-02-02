<x-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/program.css') }}">
    @endpush
    <!-- Landing Page -->
    <div class="header">
        <div class="overlay">
            <h1 class="header-title">2025 Conference Program </h1>
            <br />
            <p class="header-subtitle">Together for Progress</p>
        </div>
    </div>

    <!--Mainbody--->
    <div class="containers">
        <section class="conference-timelines-section">
            <h1 class="conference-timelines-title">Conference Timelines, Key Dates, & Venue</h1>

            <table class="conference-timelines-table">
                <thead>
                    <tr>
                        <th>Timeline</th>
                        <th>Activities</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pre-conference (6 months)</strong></td>
                        <td>
                            <ul>
                                <li>Call for papers and abstracts</li>
                                <li>Review and selection process</li>
                                <li>Participants registration</li>
                                <li>Logistical arrangements</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Conference (Three (3) Days)</strong></td>
                        <td>
                            <ul>
                                <li>Opening ceremony</li>
                                <li>Plenary sessions</li>
                                <li>Parallel sessions / breakout sessions</li>
                                <li>Field visits</li>
                                <li>Closing ceremony</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Post-conference (3 months)</strong></td>
                        <td>
                            <ul>
                                <li>Publication of proceedings</li>
                                <li>Implementation of action plans</li>
                                <li>Network activities initiation</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <div class="container">

        <section class="key-dates-section">
            <h1 class="key-dates-title">Key Dates</h1>
            <table class="key-dates-table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1st Call for Papers & Abstracts</td>
                        <td>15th January, 2025</td>
                    </tr>
                    <tr>
                        <td>Early Bird Registration Opens</td>
                        <td>15th March, 2025</td>
                    </tr>
                    <tr>
                        <td>2nd Call for Papers & Abstracts</td>
                        <td>14th March, 2025</td>
                    </tr>
                    <tr>
                        <td>Last Date for Submission of Papers & Abstracts</td>
                        <td>21st May, 2025</td>
                    </tr>
                    <tr>
                        <td>Last Date for FULL PAPERS Submission</td>
                        <td>2nd June, 2025</td>
                    </tr>
                    <tr>
                        <td>Last Date for Registration</td>
                        <td>14th July, 2025</td>
                    </tr>
                    <tr>
                        <td><strong>Conference Date</strong></td>
                        <td><strong>22nd – 24th July, 2025</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>

    </div>

    <!-- Download Section Wrapper -->
    <div class="main-wrapper">
        <div class="download-left">
            <div class="download-container">
                <h2 class="download-heading">Download the Joint Co-operative Conference 2025 Programme</h2>
                <a href="assets/docs/conference Program 2025.pdf" class="download-btn" target="_blank" download>
                    <i class="fas fa-file-pdf download-icon"></i> Download PDF
                </a>
            </div>
        </div>

        <div class="download-right">
            <div class="download-container">
                <h2 class="download-heading">Download the Book of Abstracts for 2025 Joint Conference</h2>
                <a href="assets/docs/The Book of Abstracts for 2025 Joint Conference, July 22 - 24, 2025 Version 3 - Copy.pdf"
                    class="download-btn" target="_blank" download>
                    <i class="fas fa-file-pdf download-icon"></i> Download PDF
                </a>
            </div>
        </div>
    </div>

    <!--MAIL HOVERING BUTTON-->
    <a href="mailto:coopconference@cuk.ac.ke" class="floating-button">
        <i class="fas fa-envelope"></i>
        <span class="button-label">Need help? Send us an email</span>
    </a>
</x-layout>