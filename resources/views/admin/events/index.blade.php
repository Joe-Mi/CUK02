<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Manage Events</h2>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Create New Event</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Date</th> <!-- Assuming date is derived or we show start/end -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>
                            @if($event->keyDates->count() > 0)
                            {{ $event->keyDates->first()->start_date }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $events->links() }}
    </div>
</x-admin>