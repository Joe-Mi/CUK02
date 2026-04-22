<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Tag - {{ $ticket->customer->name ?? '' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #ec4899;
            --dark: #1e1b4b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #e2e8f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .badge-container {
            width: 350px;
            height: 550px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Lanyard hole */
        .lanyard-hole {
            width: 60px;
            height: 15px;
            background-color: #e2e8f0;
            border-radius: 20px;
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
            z-index: 10;
        }

        /* Top decorative header */
        .badge-header {
            width: 100%;
            height: 160px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 30px;
            color: white;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        }

        .event-name {
            font-weight: 900;
            font-size: 24px;
            letter-spacing: 2px;
            text-transform: uppercase;
            position: relative;
            top: -10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        /* Main Content */
        .badge-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px 30px 20px 30px;
            width: 100%;
            box-sizing: border-box;
        }

        .attendee-name {
            font-size: 32px;
            font-weight: 800;
            color: var(--dark);
            margin: 0;
            margin-bottom: 5px;
            line-height: 1.1;
        }

        .attendee-surname {
            font-size: 26px;
            font-weight: 300;
            color: var(--dark);
            margin: 0;
            margin-bottom: 15px;
        }

        .attendee-address {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 25px;
        }

        /* Ticket Type Ribbon */
        .ticket-type {
            background: var(--dark);
            color: white;
            padding: 8px 30px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            border: 2px solid transparent;
            background-clip: padding-box;
            background-image: linear-gradient(135deg, #1e1b4b, #312e81);
        }

        /* QR Code area */
        .qr-section {
            background: white;
            padding: 10px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
        }

        .qr-code {
            width: 110px;
            height: 110px;
            display: block;
        }
        
        .ticket-id {
            margin-top: 8px;
            font-size: 11px;
            color: #94a3b8;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Print button controls */
        .controls {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .btn-print {
            background: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--primary);
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .btn-print:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Print specific styles */
        @media print {
            body {
                background: none;
                margin: 0;
                padding: 0;
                display: block;
            }
            .controls {
                display: none;
            }
            .badge-container {
                box-shadow: none;
                border: 1px solid #ddd;
                margin: auto;
            }
        }
    </style>
</head>
<body>

    <div class="controls">
        <button class="btn-print" onclick="window.print()">
            🖨️ Print Tag
        </button>
    </div>

    <div class="badge-container">
        <!-- Hole for Lanyard -->
        <div class="lanyard-hole"></div>

        <!-- Header -->
        <div class="badge-header">
            <div class="event-name">{{ $ticket->ticketType->event->title ?? 'CONFERENCE 2026' }}</div>
        </div>

        <!-- Body Content -->
        <div class="badge-body">
            @php
                $nameParts = explode(' ', $ticket->customer->name ?? 'Attendee');
                $firstName = array_shift($nameParts);
                $surname = ($ticket->customer->surname ?? '') . ' ' . implode(' ', $nameParts);
            @endphp
            
            <h1 class="attendee-name">{{ strtoupper($firstName) }}</h1>
            <h2 class="attendee-surname">{{ strtoupper(trim($surname)) }}</h2>
            
            <div class="attendee-address">{{ $ticket->customer->email ?? 'N/A' }}</div>

            <!-- Type badge -->
            <div class="ticket-type">
                {{ $ticket->ticketType->type ?? 'STANDARD' }}
            </div>

            <!-- QR code -->
            <div class="qr-section">
                <!-- Using a free QR generation API to encode the ticket ID for scanning at the door -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $ticket->id }}&color=1e1b4b" alt="QR Code" class="qr-code">
                <div class="ticket-id">ID: #{{ str_pad($ticket->id, 6, "0", STR_PAD_LEFT) }}</div>
            </div>
        </div>
    </div>

</body>
</html>
