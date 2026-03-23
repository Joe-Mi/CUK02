<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket #{{ $customerTicket->id }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; margin: 0; padding: 0; background: #f9f9f9; }
        .ticket-wrapper { width: 100%; max-width: 650px; margin: 40px auto; background: #fff; padding: 40px; border-radius: 12px; border: 1px solid #ddd; }
        .header { text-align: center; border-bottom: 2px dashed #ccc; padding-bottom: 25px; margin-bottom: 30px; }
        .header h1 { font-size: 32px; margin: 0; color: #111; letter-spacing: 1px; }
        .header h2 { font-size: 18px; color: #666; margin: 10px 0 0; font-weight: 500; }
        .content { display: table; width: 100%; }
        .details { display: table-cell; vertical-align: top; width: 65%; padding-right: 20px; }
        .qr-code { display: table-cell; vertical-align: top; width: 35%; text-align: right; background: #fafafa; padding: 20px; border-radius: 8px; border: 1px solid #eee; }
        .info-row { margin-bottom: 20px; }
        .label { font-size: 13px; color: #888; text-transform: uppercase; font-weight: bold; margin-bottom: 4px; }
        .value { font-size: 18px; color: #222; font-weight: 500; }
        .footer { text-align: center; margin-top: 50px; font-size: 13px; color: #999; border-top: 1px solid #eee; padding-top: 25px; }
    </style>
</head>
<body>
    <div class="ticket-wrapper">
        <div class="header">
            <h1>CONFERENCE 2026</h1>
            <h2>Registration Confirmed</h2>
        </div>
        
        <div class="content">
            <div class="details">
                <div class="info-row">
                    <div class="label">Attendee Name</div>
                    <div class="value">{{ $customerTicket->customer->name ?? '' }} {{ $customerTicket->customer->surname ?? '' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="label">Ticket Type</div>
                    <div class="value">{{ $customerTicket->ticketType->type ?? 'Standard' }}</div>
                </div>

                <div class="info-row">
                    <div class="label">Address</div>
                    <div class="value">{{ $customerTicket->customer->address ?? 'N/A' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="label">Ticket Reference</div>
                    <div class="value">#{{ str_pad($customerTicket->id, 6, "0", STR_PAD_LEFT) }}</div>
                </div>
            </div>
            
            <div class="qr-code">
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
        
        <div class="footer">
            <p>Please present this ticket at the registration desk for entry. Valid for single admission.</p>
        </div>
    </div>
</body>
</html>
