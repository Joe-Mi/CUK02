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
    </div>
    <script>
    </script>
</x-admin>