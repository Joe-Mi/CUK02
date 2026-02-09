<x-layout>
    <div class="admin-container">
        <h2>Create Event</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" id="venue" name="venue" value="{{ old('venue') }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (Days)</label>
                <input type="number" id="duration" name="duration" value="{{ old('duration') }}">
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity') }}">
            </div>

            <hr>
            <h3>Key Dates</h3>
            <div id="key-dates-container">
                <div class="key-date-row">
                    <input type="text" name="key_dates[0][title]" placeholder="Title (e.g. Early Bird)" required>
                    <input type="text" name="key_dates[0][type]" placeholder="Type" required>
                    <input type="datetime-local" name="key_dates[0][start_date]" required>
                    <input type="datetime-local" name="key_dates[0][end_date]" required>
                    <select name="key_dates[0][status]" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <button type="button" id="add-key-date" class="btn btn-secondary">Add Key Date</button>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Create Event</button>
            </div>
        </form>
    </div>

    @push('styles')
    <style>
        .admin-container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .key-date-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .key-date-row input,
        .key-date-row select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .actions {
            margin-top: 20px;
        }
    </style>
    @endpush

    <script>
        document.getElementById('add-key-date').addEventListener('click', function() {
            const container = document.getElementById('key-dates-container');
            const index = container.children.length;
            const row = document.createElement('div');
            row.className = 'key-date-row';
            row.innerHTML = `
                <input type="text" name="key_dates[${index}][title]" placeholder="Title" required>
                <input type="text" name="key_dates[${index}][type]" placeholder="Type" required>
                <input type="datetime-local" name="key_dates[${index}][start_date]" required>
                <input type="datetime-local" name="key_dates[${index}][end_date]" required>
                <select name="key_dates[${index}][status]" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            `;
            container.appendChild(row);
        });
    </script>
</x-layout>