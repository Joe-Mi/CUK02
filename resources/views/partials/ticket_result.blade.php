<div id="ticket-result-section">
    @if(isset($customerTicket) && $customerTicket)
        <div class="ticket-details-box" style="background:#fff; padding:2rem; border-radius:12px; box-shadow:0 4px 6px rgba(0,0,0,0.1); margin-bottom:2rem;">
            <h1 class="header-title" style="color:#000;">Ticket Details</h1>
            <div class="mt-input" style="margin-bottom:1rem;">
                <div class="step-label" style="font-weight:bold; color:#666;">Personal Details</div>
                <div style="font-size:1.1rem; color:#333;">
                    {{ $customerTicket->customer->name ?? '' }} {{ $customerTicket->customer->surname ?? '' }}
                </div>
            </div>
            <div class="mt-input" style="margin-bottom:1rem;">
                <div class="step-label" style="font-weight:bold; color:#666;">Address</div>
                <div style="font-size:1.1rem; color:#333;">
                    {{ $customerTicket->customer->address ?? '' }}
                </div>
            </div>
            <div class="mt-input" style="margin-bottom:1rem;">
                <div class="step-label" style="font-weight:bold; color:#666;">Ticket Type</div>
                <div style="font-size:1.1rem; color:#333;">
                    {{ $customerTicket->ticketType->type ?? 'Standard' }}
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="button" class="btn btn-primary" style="width:100%;" onclick="window.location.href='{{ url('/ticket/' . $customerTicket->id . '?download=1') }}'">
                    <i class="fas fa-download"></i> Download PDF Ticket
                </button>
            </div>
        </div>
    @endif
</div>
