
<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @foreach ($events as $event)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $event['name'] }}</div>
                        <div class="mt-1">{{ $event['venue'] }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $event['remainingTicket'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
