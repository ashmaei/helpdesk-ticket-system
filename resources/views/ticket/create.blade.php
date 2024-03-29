<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('ticket.index') }}" class="px-2 rounded-lg mr-4 text-gray-200 dark:text-gray-800 bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-white">
                {{ '<' }}
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Log Tiket Baharu') }}
            </h2>
        </div>
    </x-slot>
    <div class="min-h-screen flex flex-col items-center mt-4 pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Tajuk')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Keterangan')" />
                    <x-text-area placeholder="Tambah keterangan" name="description" id="description" value="" />
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Muatnaik dokumen(jika ada)')" />
                    <x-file-input id="attachment" name="attachment" />
                    <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Hantar Tiket') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>