<x-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/ticket.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <div class="ticket-header">
        <div class="overlay">
            <h1 class="header-title">Ticket Registration</h1>
            <p class="header-subtitle">Secure your spot at the conference</p>
        </div>
    </div>


    <div id="ticket-result-section">
    </div>

    <div class="form-container">
        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="step active" id="step1-indicator">
                <div class="step-num">1</div>
                <div class="step-label">Personal Details</div>
            </div>
            <div class="step" id="step2-indicator">
                <div class="step-num">2</div>
                <div class="step-label">Address</div>
            </div>
            <div class="step" id="step3-indicator">
                <div class="step-num">3</div>
                <div class="step-label">Ticket Type</div>
            </div>
            <div class="step" id="step4-indicator">
                <div class="step-num">4</div>
                <div class="step-label">Payment</div>
            </div>
        </div>

        <form id="multi-stage-form" action="{{ url('/ticket/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Phase 1: Personal Details -->
            <div class="form-phase active" id="phase1">
                <h2><i class="fas fa-user"></i> Personal Details</h2>
                <div class="form-group row">
                    <div class="col">
                        <label for="name">First Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" required placeholder="e.g. Jane">
                    </div>
                    <div class="col">
                        <label for="surname">Surname <span class="required">*</span></label>
                        <input type="text" id="surname" name="surname" required placeholder="e.g. Doe">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="jane.doe@example.com">
                    </div>
                    <div class="col">
                        <label for="number">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="number" name="number" required placeholder="+254 700 000000">
                    </div>
                </div>
                <div class="btn-group right">
                    <button type="button" class="btn btn-next" onclick="nextPhase(1)">Next <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Phase 2: Address -->
            <div class="form-phase" id="phase2">
                <h2><i class="fas fa-map-marker-alt"></i> Address Information</h2>
                <div class="form-group">
                    <label for="address">Full Physical Address</label>
                    <textarea id="address" name="address" rows="3" placeholder="P.O. Box 12345-00100, Nairobi, Kenya"></textarea>
                </div>
                <div class="btn-group space-between">
                    <button type="button" class="btn btn-prev" onclick="prevPhase(2)"><i class="fas fa-arrow-left"></i> Previous</button>
                    <button type="button" class="btn btn-next" onclick="nextPhase(2)">Next <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Phase 3: Ticket Type Selection -->
            <div class="form-phase" id="phase3">
                <h2><i class="fas fa-ticket-alt"></i> Select Ticket Type</h2>
                <div class="ticket-selection">
                    @if(isset($ticketTypes) && count($ticketTypes) > 0)
                    @foreach($ticketTypes as $type)
                    <label class="ticket-option">
                        <input type="radio" name="ticket_type_id" value="{{ $type->id }}" required {{ request('type') == $type->id ? 'checked' : '' }}>
                        <div class="ticket-card">
                            <h3>{{ $type->type }}</h3>
                            <div class="ticket-price">KES {{ number_format($type->price) }}</div>
                        </div>
                    </label>
                    @endforeach
                    @else
                    <label class="ticket-option">
                        <input type="radio" name="ticket_type_id" value="1" required>
                        <div class="ticket-card">
                            <h3>Un-available</h3>
                            <div class="ticket-price">KES 0</div>
                        </div>
                        @endif
                </div>
                <div class="btn-group space-between">
                    <button type="button" class="btn btn-prev" onclick="prevPhase(3)"><i class="fas fa-arrow-left"></i> Previous</button>
                    <button type="button" class="btn btn-next" onclick="nextPhase(3)">Next <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>

            <!-- Phase 4: Payment Details -->
            <div class="form-phase" id="phase4">
                <h2><i class="fas fa-credit-card"></i> Payment Details</h2>

                <div class="payment-instructions">
                    <div class="payment-method">
                        <h3><i class="fas fa-mobile-alt"></i> M-PESA</h3>
                        <p><strong>Paybill:</strong> 400200</p>
                        <p><strong>Account:</strong> 01129062663601</p>
                    </div>
                    <div class="payment-method">
                        <h3><i class="fas fa-university"></i> Bank Transfer</h3>
                        <p><strong>Bank:</strong> The Co-operative Bank of Kenya (Karen)</p>
                        <p><strong>Acct No:</strong> 01129062663601</p>
                    </div>
                </div>

                <div class="form-group mt-input">
                    <label for="payment_reference">Payment Reference / M-PESA Code <span class="required">*</span></label>
                    <input type="text" id="payment_reference" name="payment_reference" required placeholder="e.g. QKT5ABCDEF">
                </div>

                <div class="form-group mt-input">
                    <label for="payment_proof">Upload Proof of Payment (Optional)</label>
                    <div class="file-upload">
                        <input type="file" id="payment_proof" name="payment_proof" accept="image/*,.pdf" class="file-input">
                        <div class="file-upload-box">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p>Click or drag file here to upload</p>
                            <span class="file-name" id="file-name-display"></span>
                        </div>
                    </div>
                </div>

                <div class="btn-group space-between">
                    <button type="button" class="btn btn-prev" onclick="prevPhase(4)"><i class="fas fa-arrow-left"></i> Previous</button>
                    <button type="submit" class="btn btn-submit"><i class="fas fa-check-circle"></i> Complete Registration</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        function validatePhase(phaseNum) {
            const phase = document.getElementById('phase' + phaseNum);
            const inputs = phase.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (input.type === 'radio') {
                    const radioGroup = phase.querySelectorAll(`input[name="${input.name}"]`);
                    let isChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isChecked) {
                        isValid = false;
                        // Add some highlight to the group
                        phase.querySelector('.ticket-selection').classList.add('error-shake');
                        setTimeout(() => phase.querySelector('.ticket-selection').classList.remove('error-shake'), 500);
                    }
                } else if (!input.value.trim()) {
                    input.classList.add('error');
                    isValid = false;
                } else {
                    input.classList.remove('error');

                    if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
                        input.classList.add('error');
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        // Add event listeners to remove error class on input
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('input', function() {
                this.classList.remove('error');
            });
        });

        function nextPhase(currentPhase) {
            if (!validatePhase(currentPhase)) return;

            document.getElementById('phase' + currentPhase).classList.remove('active');
            document.getElementById('step' + currentPhase + '-indicator').classList.remove('active');
            document.getElementById('step' + currentPhase + '-indicator').classList.add('completed');

            const next = currentPhase + 1;
            document.getElementById('phase' + next).classList.add('active');
            document.getElementById('step' + next + '-indicator').classList.add('active');
        }

        function prevPhase(currentPhase) {
            document.getElementById('phase' + currentPhase).classList.remove('active');
            document.getElementById('step' + currentPhase + '-indicator').classList.remove('active');

            const prev = currentPhase - 1;
            document.getElementById('phase' + prev).classList.add('active');
            document.getElementById('step' + prev + '-indicator').classList.remove('completed');
            document.getElementById('step' + prev + '-indicator').classList.add('active');
        }

        // Handle Form Submit via AJAX to only update part of DOM
        document.getElementById('multi-stage-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = this;
            const submitBtn = form.querySelector('.btn-submit');
            const originalBtnHtml = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html, application/xhtml+xml, application/json'
                    }
                });

                if (response.ok) {
                    const htmlText = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(htmlText, 'text/html');
                    const newTicketSection = doc.getElementById('ticket-result-section');

                    if (newTicketSection && newTicketSection.innerHTML.trim() !== '') {
                        document.querySelector('.form-container').style.display = 'none';
                        const targetSection = document.getElementById('ticket-result-section');
                        targetSection.innerHTML = newTicketSection.innerHTML;
                        targetSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                } else {
                    alert('Submission failed. Server responded with an error.');
                }
            } catch (err) {
                console.error(err);
                alert('A network error occurred.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });

        // Handle file upload display
        const fileInput = document.getElementById('payment_proof');
        const fileNameDisplay = document.getElementById('file-name-display');
        const fileUploadBox = document.querySelector('.file-upload-box');

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    fileNameDisplay.textContent = this.files[0].name;
                    fileUploadBox.classList.add('has-file');
                } else {
                    fileNameDisplay.textContent = '';
                    fileUploadBox.classList.remove('has-file');
                }
            });
        }
    </script>
</x-layout>