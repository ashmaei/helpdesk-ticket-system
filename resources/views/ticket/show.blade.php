<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('ticket.index') }}" class="px-2 rounded-lg mr-4 text-gray-200 dark:text-gray-800 bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-white">
                {{ '<' }}
            </a>
            @if ($ticket->user_id == auth()->id() || auth()->user()->isAdmin)
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tajuk Tiket || ')}}
            </h2>
            <p class="text-gray-800 dark:text-gray-200 leading-tight mt-1 px-2 font-semibold">#{{ ($ticket->id)}}</p>
            <p class="text-gray-800 dark:text-gray-200 leading-tight mt-1 px-2">{{ ($ticket->title) }}</p>
            @else
            <p class="rounded-sm bg-red-600 text-gray-800 dark:text-gray-200 leading-tight px-2 font-semibold">
                {{ ("Anda tiada kebenaran untuk akses pada laman ini, sila kembali !!!") }}
            </p>
            @endif
        </div>
    </x-slot>
    <div class="min-h-screen flex flex-col items-center mt-4 pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        @if ($ticket->user_id == auth()->id() || auth()->user()->isAdmin)
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="font-semibold text-gray-800 dark:text-gray-200 flex py-4">
                <h1>{{ 'Keterangan :' }}</h1>
            </div>
            <div class="text-gray-800 dark:text-gray-200 flex py-4">
                <p>{{ $ticket->description }}</p>
            </div>

            @if ($ticket->attachment)
            <a href="{{ '/storage/' . $ticket->attachment }}"" target=" _blank" class="rounded-full px-2 bg-gray-600 text-gray-400 hover:underline hover:text-white">
                Lampiran
            </a>
            @endif

            @if (auth()->user()->isAdmin)
            <div class=" flex justify-end text-gray-800 dark:text-gray-200 mt-2">
                <h1>{{ 'Dari: ' . $ticket->user->name}}</h1>
            </div>
            @endif

            <div class="flex justify-between mt-2">
                <div class="flex">
                    @if ($ticket->user_id == auth()->id())
                    <a href="{{ route('ticket.edit', $ticket->id) }}">
                        <x-primary-button class="mr-2">Kemaskini</x-primary-button>
                    </a>
                    @endif


                    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-ticket-deletion')">Padam</x-danger-button>
                    <x-modal name="confirm-ticket-deletion">

                        <form method="post" action="{{ route('ticket.destroy', $ticket->id) }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adakah anda pasti mahu memadamkan tiket ini?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah tiket ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Kembali') }}
                                </x-secondary-button>

                                <x-danger-button class="ms-3">
                                    {{ __('Padam Tiket') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
                @if(auth()->user()->isAdmin)
                <div class="flex">
                    <x-primary-button class="ml-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-ticket-acception')">Terima</x-primary-button>
                    <x-modal name="confirm-ticket-acception">

                        <form action="{{route('ticket.update', $ticket->id)}}" method="post" class="p-6">
                            @csrf
                            @method('patch')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adakah anda pasti mahu terima tiket ini?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah tiket diterima, okay.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Kembali') }}
                                </x-secondary-button>

                                <input type="hidden" name="status" value="resolved" />
                                <x-primary-button class="ms-3" x-on:click="$dispatch('close', 'confirm-ticket-acception')">
                                    {{ __('Terima Tiket') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>

                    <x-danger-button class="ml-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-ticket-rejection')">Tolak</x-danger-button>
                    <x-modal name="confirm-ticket-rejection">

                        <form action="{{route('ticket.update', $ticket->id)}}" method="post" class="p-6">
                            @csrf
                            @method('patch')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adakah anda pasti mahu menolak tiket ini?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah tiket ditolak, okay.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Kembali') }}
                                </x-secondary-button>


                                <input type="hidden" name="status" value="rejected" />
                                <x-danger-button class="ms-3" x-on:click="$dispatch('close', 'confirm-ticket-rejection')">
                                    {{ __('Tolak Tiket') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
                @else
                <p class="text-gray-800 dark:text-gray-200"><strong>Status</strong> || <em>{{$ticket->status}}</em></p>
                @endif
            </div>

        </div>
        @endif
    </div>
    </div>
</x-app-layout>