<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Senarai Tiket') }}
            </h2>
            <a href="{{route('ticket.create')}}">
                <x-primary-button>
                    {{ __('Log Tiket') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 py-2">
            @if ($tickets->count() !== 0)
            <div class="text-gray-800 dark:text-gray-200 text-xl flex justify-between pt-2 font-semibold px-1 rounded-lg">
                <p>Tajuk Tiket</p>
                <p>Waktu Dicipta</p>
            </div>
            @endif
            @forelse ($tickets as $ticket)
            <div class="text-gray-800 dark:text-gray-200 flex justify-between py-2 bg-gray-200 dark:bg-gray-700 px-2 rounded-lg mt-1">
                <a href="{{ route('ticket.show', $ticket->id) }}" class="hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700">
                    {{ $ticket->title }}</a>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
            </div>
            @empty
            <h1 class="text-white py-4">Anda masih belum mencipta tiket.</h1>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $tickets->links() }}
        </div>
    </div>
</x-app-layout>