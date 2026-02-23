<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Edit Event: {{ $event->title }}</h2>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-sm">Back</a>
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

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="form-group">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" id="venue" name="venue" class="form-control" value="{{ old('venue', $event->venue) }}" required>
            </div>

            <div class="form-group">
                <label for="duration" class="form-label">Duration (Hours)</label>
                <input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration', $event->duration) }}">
            </div>

            <div class="form-group">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="number" id="capacity" name="capacity" class="form-control" value="{{ old('capacity', $event->capacity) }}">
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $event->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="cancelled" {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="postponed" {{ old('status', $event->status) == 'postponed' ? 'selected' : '' }}>Postponed</option>
                    <option value="completed" {{ old('status', $event->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>


            <hr style="margin: 30px 0;">
            <h3>Ticket Types</h3>
            <div id="ticket-types-container">
                @foreach($event->ticketTypes as $index => $ticket)
                <div class="ticket-type-row" id="ticket-row-{{ $ticket->id }}" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: flex-end; flex-wrap: wrap;">
                    <input type="hidden" name="ticket_types[{{ $index }}][id]" value="{{ $ticket->id }}">
                    <div style="flex: 2; min-width: 200px;">
                        <input type="text" name="ticket_types[{{ $index }}][type]" class="form-control" value="{{ $ticket->type }}" placeholder="Ticket Type" required>
                    </div>
                    <div style="flex: 1; min-width: 150px;">
                        <input type="number" name="ticket_types[{{ $index }}][price]" class="form-control" value="{{ $ticket->price }}" placeholder="Price" required>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-danger remove-ticket-type" data-id="{{ $ticket->id }}">Remove</button>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-ticket-type" class="btn btn-secondary" style="margin-top: 10px;">Add Ticket Type</button>
            <div id="removed-ticket-types"></div>

            <hr style="margin: 30px 0;">
            <h3>Key Dates</h3>
            <div id="key-dates-container">
                @foreach($event->keyDates as $index => $date)
                <div class="key-date-row" id="date-row-{{ $date->id }}" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: flex-end; flex-wrap: wrap;">
                    <input type="hidden" name="key_dates[{{ $index }}][id]" value="{{ $date->id }}">
                    <div style="flex: 1; min-width: 200px;">
                        <input type="text" name="key_dates[{{ $index }}][title]" class="form-control" value="{{ $date->title }}" placeholder="Title" required>
                    </div>
                    <div style="flex: 1; min-width: 150px;">
                        <input type="text" name="key_dates[{{ $index }}][type]" class="form-control" value="{{ $date->type }}" placeholder="Type" required>
                    </div>
                    <div style="flex: 1; min-width: 180px;">
                        <input type="datetime-local" name="key_dates[{{ $index }}][start_date]" class="form-control" value="{{ \Carbon\Carbon::parse($date->start_date)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div style="flex: 1; min-width: 180px;">
                        <input type="datetime-local" name="key_dates[{{ $index }}][end_date]" class="form-control" value="{{ \Carbon\Carbon::parse($date->end_date)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div style="flex: 1; min-width: 120px;">
                        <select name="key_dates[{{ $index }}][status]" class="form-control" required>
                            <option value="active" {{ $date->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $date->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-danger remove-date" data-id="{{ $date->id }}">Remove</button>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-key-date" class="btn btn-secondary" style="margin-top: 10px;">Add Key Date</button>
            <div id="removed-dates"></div>
            <div class="actions" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">Update Event</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        let ticketTypeIndex = {{$event->ticketTypes->count()}};

        document.getElementById('add-ticket-type').addEventListener('click', function() {
            const container = document.getElementById('ticket-types-container');
            const row = document.createElement('div');
            row.className = 'ticket-type-row';
            row.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px; align-items: flex-end; flex-wrap: wrap;';
            row.innerHTML = `
                <div style="flex: 2; min-width: 200px;">
                    <input type="text" name="ticket_types[${ticketTypeIndex}][type]" class="form-control" placeholder="Ticket Type" required>
                </div>
                <div style="flex: 1; min-width: 150px;">
                     <input type="number" name="ticket_types[${ticketTypeIndex}][price]" class="form-control" placeholder="Price" required>
                </div>
                <div>
                     <button type="button" class="btn btn-sm btn-danger remove-new-ticket-type">Remove</button>
                </div>
            `;
            container.appendChild(row);
            ticketTypeIndex++;

            row.querySelector('.remove-new-ticket-type').addEventListener('click', function() {
                row.remove();
            });
        });

        document.querySelectorAll('.remove-ticket-type').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const row = document.getElementById('ticket-row-' + id);
                row.style.display = 'none';

                const removedContainer = document.getElementById('removed-ticket-types');
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_ticket_types[]';
                input.value = id;
                removedContainer.appendChild(input);

                row.querySelectorAll('input').forEach(el => el.disabled = true);
            });
        });

        let dateIndex = {{$event->keyDates->count()}};

        document.getElementById('add-key-date').addEventListener('click', function() {
            const container = document.getElementById('key-dates-container');
            const row = document.createElement('div');
            row.className = 'key-date-row';
            row.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px; align-items: flex-end; flex-wrap: wrap;';
            row.innerHTML = `
                <div style="flex: 1; min-width: 200px;">
                    <input type="text" name="key_dates[${dateIndex}][title]" class="form-control" placeholder="Title" required>
                </div>
                <div style="flex: 1; min-width: 150px;">
                     <input type="text" name="key_dates[${dateIndex}][type]" class="form-control" placeholder="Type" required>
                </div>
                <div style="flex: 1; min-width: 180px;">
                    <input type="datetime-local" name="key_dates[${dateIndex}][start_date]" class="form-control" required>
                </div>
                <div style="flex: 1; min-width: 180px;">
                    <input type="datetime-local" name="key_dates[${dateIndex}][end_date]" class="form-control" required>
                </div>
                <div style="flex: 1; min-width: 120px;">
                    <select name="key_dates[${dateIndex}][status]" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div>
                     <button type="button" class="btn btn-sm btn-danger remove-new-date">Remove</button>
                </div>
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
</x-admin>