<div id="ticket-result-section">
    @if(isset($customerTicket) && $customerTicket)
        <style>
            .web-ticket-wrapper { 
                width: 100%; 
                max-width: 650px; 
                margin: 0 auto; 
                background: #fff; 
                padding: 40px; 
                border-radius: 12px; 
                border: 1px solid #ddd; 
                box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            }
            .web-ticket-header { 
                text-align: center; 
                border-bottom: 2px dashed #ccc; 
                padding-bottom: 25px; 
                margin-bottom: 30px; 
            }
            .web-ticket-header h1 { 
                font-size: 32px; 
                margin: 0; 
                color: #111; 
                letter-spacing: 1px; 
            }
            .web-ticket-header h2 { 
                font-size: 18px; 
                color: #666; 
                margin: 10px 0 0; 
                font-weight: 500; 
            }
            .web-ticket-content { 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                text-align: center; 
            }
            .web-ticket-details { 
                width: 100%; 
            }
            .web-ticket-qr-code { 
                background: #fafafa; 
                padding: 20px; 
                border-radius: 8px; 
                border: 1px solid #eee; 
                margin-top: 30px; 
                text-align: center; 
                display: inline-block;
            }
            .web-ticket-info-row { 
                margin-bottom: 20px; 
            }
            .web-ticket-label { 
                font-size: 13px; 
                color: #888; 
                text-transform: uppercase; 
                font-weight: bold; 
                margin-bottom: 4px; 
            }
            .web-ticket-value { 
                font-size: 18px; 
                color: #222; 
                font-weight: 500; 
            }
            .web-ticket-footer { 
                text-align: center; 
                margin-top: 30px; 
                font-size: 13px; 
                color: #999; 
                border-top: 1px solid #eee; 
                padding-top: 25px; 
            }
            .web-ticket-download { 
                text-align: center; 
                margin-top: 20px; 
                margin-bottom: 20px; 
            }
            .web-ticket-btn { 
                display: inline-flex; 
                align-items: center; 
                justify-content: center; 
                gap: 8px; 
                padding: 10px 20px; 
                font-size: 14px; 
                color: #fff; 
                background-color: #0d6efd; 
                border: none; 
                border-radius: 6px; 
                text-decoration: none; 
                cursor: pointer; 
                transition: background-color 0.2s; 
                font-weight: 500;
            }
            .web-ticket-btn:hover { 
                background-color: #0b5ed7; 
                color: #fff; 
                text-decoration: none; 
            }
            
            @media (min-width: 600px) {
                .web-ticket-content {
                    flex-direction: row;
                    text-align: left;
                    align-items: flex-start;
                }
                .web-ticket-details {
                    flex: 1;
                    text-align: center;
                }
                .web-ticket-qr-code {
                    margin-top: 0;
                    margin-left: 20px;
                }
            }
        </style>

        <div class="web-ticket-wrapper">
            <div class="web-ticket-header">
                <h1>CONFERENCE 2026</h1>
                <h2>Registration Confirmed</h2>
            </div>
            
            <div class="web-ticket-content">
                <div class="web-ticket-details">
                    <div class="web-ticket-info-row">
                        <div class="web-ticket-label">Attendee Name</div>
                        <div class="web-ticket-value">{{ $customerTicket->customer->name ?? '' }} {{ $customerTicket->customer->surname ?? '' }}</div>
                    </div>
                    
                    <div class="web-ticket-info-row">
                        <div class="web-ticket-label">Ticket Type</div>
                        <div class="web-ticket-value">{{ $customerTicket->ticketType->type ?? 'Standard' }}</div>
                    </div>

                    <div class="web-ticket-info-row">
                        <div class="web-ticket-label">Address</div>
                        <div class="web-ticket-value">{{ $customerTicket->customer->address ?? 'N/A' }}</div>
                    </div>
                    
                    <div class="web-ticket-info-row">
                        <div class="web-ticket-label">Ticket Reference</div>
                        <div class="web-ticket-value">#{{ str_pad($customerTicket->id, 6, "0", STR_PAD_LEFT) }}</div>
                    </div>
                </div>
                
                <div class="web-ticket-qr-code">
                    @if(isset($qrCodeImage) && $qrCodeImage)
                        <img src="{{ $qrCodeImage }}" alt="QR Code" style="width: 150px; height: 150px; display: block; margin: 0 auto;">
                    @else
                        <div style="width: 150px; height: 150px; border: 1px solid #ddd; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: #aaa;">No QR</div>
                    @endif
                    <div style="margin-top: 15px; font-size: 12px; color: #555; text-align: center; font-weight: bold;">
                        SCAN TO VERIFY CODE
                    </div>
                </div>
            </div>
            
            <div class="web-ticket-footer">
                <p>Please present this ticket at the registration desk for entry. Valid for single admission.</p>
            </div>
        </div>

        <div class="web-ticket-download">
            <button type="button" class="web-ticket-btn" onclick="window.location.href='{{ url('/ticket/' . $customerTicket->id . '?download=1') }}'">
                <i class="fas fa-download"></i> Download PDF Ticket
            </button>
        </div>
    @endif
</div>
