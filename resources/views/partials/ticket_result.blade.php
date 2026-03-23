<div id="ticket-result-section">
    @if(isset($customerTicket) && $customerTicket)
        <div class="ticket-details-box" style="background:#fff; padding:2rem; border-radius:12px; box-shadow:0 4px 6px rgba(0,0,0,0.1); margin-bottom:2rem;">
            <div style="display:flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 250px;">
                    <h1 class="header-title" style="color:#000; margin-bottom: 20px;">Ticket Details</h1>
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
                </div>
                @if(isset($qrCodeImage) && $qrCodeImage)
                <div style="flex: 0 0 160px; text-align:center; padding: 10px; background:#f9f9f9; border-radius: 8px; border: 1px solid #eee; margin-left: 20px;">
                    <img src="{{ $qrCodeImage }}" alt="QR Code" style="width:140px; height:140px; display:block; margin: 0 auto;">
                    <div style="margin-top:8px; font-size:12px; color:#555; font-weight:bold;">TICKET #{{ str_pad($customerTicket->id, 6, "0", STR_PAD_LEFT) }}</div>
                </div>
                @endif
            </div>

            <div style="margin-top: 30px;">
                <button type="button" class="btn btn-primary" style="width:100%; padding:10px 0; font-size:1.1rem; cursor:pointer;" onclick="window.location.href='{{ url('/ticket/' . $customerTicket->id . '?download=1') }}'">
                    <i class="fas fa-download"></i> Download PDF Ticket
                </button>
            </div>
        </div>
    @endif
</div>
