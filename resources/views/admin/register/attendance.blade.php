<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Meeting: {{ $block->title }}</h2>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="meeting_badge">
            <h3>Meeting Details</h3>
            <div class="block_details">
                <strong>Title:</strong> {{ $block->title }}<br>
                <strong>Speaker:</strong> {{ $block->speaker }}<br>
                <strong>Location:</strong> {{ $block->location }}<br>
                <strong>Capacity:</strong> {{ $block->event->capacity ?? 'N/A' }}<br>
                <strong>Total Attendance:</strong> {{ $block->attendance }}
            </div>
        </div>
        @if ($ticket && $status)
        <div class="ticket_badge">
            <h3>Ticket Details</h3>
            <div class="ticket_details">
                {{$ticket->name}}
                {{$ticket->type}}
                {{$ticket->benefits}}
            </div>
            <div>{{$status}}</div>
        </div>
        @endif
        <div class="meeting_badge">
            <h3>Take Attendance</h3>
            <form action="{{ route('admin.attendance.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $block->id }}">
                <div class="form-group">
                    <label for="id_input" class="form-label">Ticket ID:</label>
                    <input id="id_input" name="ticket_id" class="form-control" type="text" placeholder="Enter Ticket ID">
                </div>
                <div class="form-group">
                    <label for="name_input" class="form-label">Name:</label>
                    <input id="name_input" name="name" class="form-control" type="text" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="qr_image" class="form-label">QR Code Image (Optional):</label>
                    <input id="qr_image" name="qr_image" class="form-control" type="file" accept="image/*" capture="environment">
                </div>
                <button type="submit" class="btn btn-primary">Take Attendance</button>
            </form>
        </div>
    </div>
    <script>
    </script>
</x-admin>