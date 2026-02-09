<x-layout>
    <div class="admin-container">
        <h2>Edit Event: {{ $event->title }}</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" id="venue" name="venue" value="{{ old('venue', $event->venue) }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration (Hours)</label>
                <input type="number" id="duration" name="duration" value="{{ old('duration', $event->duration) }}">
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $event->capacity) }}">
            </div>

            <hr>
            <h3>Key Dates</h3>
            <div id="key-dates-container">
                @foreach($event->keyDates as $index => $date)
                <div class="key-date-row" id="date-row-{{ $date->id }}">
                    <input type="hidden" name="key_dates[{{ $index }}][id]" value="{{ $date->id }}">
                    <input type="text" name="key_dates[{{ $index }}][title]" value="{{ $date->title }}" placeholder="Title" required>
                    <input type="text" name="key_dates[{{ $index }}][type]" value="{{ $date->type }}" placeholder="Type" required>
                    <input type="datetime-local" name="key_dates[{{ $index }}][start_date]" value="{{ \Carbon\Carbon::parse($date->start_date)->format('Y-m-d\TH:i') }}" required>
                    <input type="datetime-local" name="key_dates[{{ $index }}][end_date]" value="{{ \Carbon\Carbon::parse($date->end_date)->format('Y-m-d\TH:i') }}" required>
                    <select name="key_dates[{{ $index }}][status]" required>
                        <option value="active" {{ $date->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $date->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <button type="button" class="btn btn-sm btn-danger remove-date" data-id="{{ $date->id }}">Remove</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-key-date" class="btn btn-secondary">Add Key Date</button>
            <div id="removed-dates"></div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Update Event</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-link">Cancel</a>
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
            align-items: center;
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
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-link {
            background-color: transparent;
            color: #007bff;
        }

        .btn-sm {
            padding: 5px 8px;
            font-size: 0.8rem;
            margin-top: 0;
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
        let dateIndex = {
            $event - > keyDates - > count()
        };

        document.getElementById('add-key-date').addEventListener('click', function() {
            const container = document.getElementById('key-dates-container');
            const row = document.createElement('div');
            row.className = 'key-date-row';
            row.innerHTML = `
                <input type="text" name="key_dates[${dateIndex}][title]" placeholder="Title" required>
                <input type="text" name="key_dates[${dateIndex}][type]" placeholder="Type" required>
                <input type="datetime-local" name="key_dates[${dateIndex}][start_date]" required>
                <input type="datetime-local" name="key_dates[${dateIndex}][end_date]" required>
                <select name="key_dates[${dateIndex}][status]" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <button type="button" class="btn btn-sm btn-danger remove-new-date">Remove</button>
            `;
            container.appendChild(row);
            dateIndex++;

            row.querySelector('.remove-new-date').addEventListener('click', function() {
                row.remove();
            });
        });

        document.querySelectorAll('.remove-date').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const row = document.getElementById('date-row-' + id);
                row.style.display = 'none'; // Hide it visually

                // Create a hidden input to signal removal
                const removedContainer = document.getElementById('removed-dates');
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_key_dates[]';
                input.value = id;
                removedContainer.appendChild(input);

                // Disable inputs in the row so they don't get submitted as updates
                row.querySelectorAll('input, select').forEach(el => el.disabled = true);
            });
        });
    </script>
</x-layout>