<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>schedule: {{ $event->title }}</h2>
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

        <div class="scheduale_container">
            <h2>{{$event->title}}</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>location</th>
                            <th>start_time</th>
                            <th>end_time</th>
                            <th>date</th>
                            <th>status</th>
                            <th>attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scheduale as $block)
                        <tr>
                            <td>{{ $block->title }}</td>
                            <td>{{ $block->location }}</td>
                            <td>{{ $block->start }}</td>
                            <td>{{ $block->end }}</td>
                            <td>{{ $block->date }}</td>
                            <td>{{ $block->status }}</td>
                            <td>
                                <a href="{{ route('admin.attendance.show', $block->id) }}" class="btn btn-sm btn-warning">check</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="scheduale_container mt-5">
            <h2>Registered Attendees</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ticket Type</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registeredAttendees as $attendee)
                        <tr>
                            <td>{{ $attendee->id }}</td>
                            <td>{{ optional($attendee->customer)->name }} {{ optional($attendee->customer)->surname }}</td>
                            <td>{{ optional($attendee->customer)->email }}</td>
                            <td>{{ optional($attendee->ticketType)->type }}</td>
                            <td>{{ $attendee->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.attendance.tag', $attendee->id) }}" class="btn btn-sm btn-info" target="_blank">
                                    <i class="fas fa-id-badge"></i> View Tag
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No attendees registered yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    </script>
</x-admin>