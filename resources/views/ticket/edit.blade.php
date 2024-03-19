<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('ticket.show', $ticket->id) }}" class="px-2 rounded-lg mr-4 text-gray-200 dark:text-gray-800 bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-white">
                {{ '<' }}
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kemaskini Tiket') }}
            </h2>
        </div>
    </x-slot>
    <div class="min-h-screen flex flex-col items-center mt-4 pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <!-- Title -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Tajuk')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus value="{{ $ticket->title}}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Keterangan')" />
                    <x-text-area placeholder="Tambah keterangan" name="description" id="description" value="{{ $ticket-> description}}" />
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="mt-4">
                    @if ($ticket->attachment)
                    <a href="{{ '/storage/' . $ticket->attachment }}"" target=" _blank" class="rounded-full px-2 bg-gray-600 text-gray-400 hover:underline hover:text-white">
                        Lihat Lampiran
                    </a>
                    @endif
                    <x-input-label for="attachment" :value="__('Kemaskini atau muatnaik dokumen(jika ada)')" />
                    <x-file-input id="attachment" name="attachment" value="{{ $ticket->attachment}}" />
                    <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Kemaskini Tiket') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>