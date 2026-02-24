<x-admin>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Create Event</h2>
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

        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" id="venue" name="venue" class="form-control" value="{{ old('venue') }}" required>
            </div>

            <div class="form-group">
                <label for="duration" class="form-label">Duration (Days)</label>
                <input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration') }}">
            </div>

            <div class="form-group">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="number" id="capacity" name="capacity" class="form-control" value="{{ old('capacity') }}">
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" value="{{ old('status') }}">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="postponed">Postponed</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <hr style="margin: 30px 0;">
            <h3>Ticket Types</h3>
            <div id="ticket-types-container">
                <div class="ticket-type-row" style="display: flex; gap: 10px; margin-bottom: 10px; flex-wrap: wrap;">
                    <div style="flex: 2; min-width: 200px;">
                        <input type="text" name="ticket_types[0][type]" class="form-control" placeholder="Ticket Type (e.g. Regular)" required>
                    </div>
                    <div style="flex: 1; min-width: 150px;">
                        <input type="number" name="ticket_types[0][price]" class="form-control" placeholder="Price (e.g. 1000)" required>
                    </div>
                </div>
            </div>
            <button type="button" id="add-ticket-type" class="btn btn-secondary" style="margin-top: 10px;">Add Ticket Type</button>

            <hr style="margin: 30px 0;">
            <h3>Key Dates</h3>
            <div id="key-dates-container">
                <div class="key-date-row" style="display: flex; gap: 10px; margin-bottom: 10px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <input type="text" name="key_dates[0][title]" class="form-control" placeholder="Title (e.g. Early Bird)" required>
                    </div>
                    <div style="flex: 1; min-width: 150px;">
                        <input type="text" name="key_dates[0][type]" class="form-control" placeholder="Type" required>
                    </div>
                    <div style="flex: 1; min-width: 180px;">
                        <input type="datetime-local" name="key_dates[0][start_date]" class="form-control" required>
                    </div>
                    <div style="flex: 1; min-width: 180px;">
                        <input type="datetime-local" name="key_dates[0][end_date]" class="form-control" required>
                    </div>
                    <div style="flex: 1; min-width: 120px;">
                        <select name="key_dates[0][status]" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" id="add-key-date" class="btn btn-secondary" style="margin-top: 10px;">Add Key Date</button>

            <div class="actions" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">Create Event</button>
            </div>
        </form>
    </div>

    <script>
        let ticketTypeIndex = 1;
        document.getElementById('add-ticket-type').addEventListener('click', function() {
            const container = document.getElementById('ticket-types-container');
            const row = document.createElement('div');
            row.className = 'ticket-type-row';
            row.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px; flex-wrap: wrap; align-items: flex-end;';
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

        document.getElementById('add-key-date').addEventListener('click', function() {
            const container = document.getElementById('key-dates-container');
            const index = container.children.length;
            const row = document.createElement('div');
            row.className = 'key-date-row';
            row.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px; flex-wrap: wrap;';
            row.innerHTML = `
                <div style="flex: 1; min-width: 200px;">
                    <input type="text" name="key_dates[${index}][title]" class="form-control" placeholder="Title" required>
                </div>
                <div style="flex: 1; min-width: 150px;">
                    <input type="text" name="key_dates[${index}][type]" class="form-control" placeholder="Type" required>
                </div>
                <div style="flex: 1; min-width: 180px;">
                    <input type="datetime-local" name="key_dates[${index}][start_date]" class="form-control" required>
                </div>
                <div style="flex: 1; min-width: 180px;">
                    <input type="datetime-local" name="key_dates[${index}][end_date]" class="form-control" required>
                </div>
                <div style="flex: 1; min-width: 120px;">
                    <select name="key_dates[${index}][status]" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            `;
            container.appendChild(row);
        });
    </script>
</x-admin>