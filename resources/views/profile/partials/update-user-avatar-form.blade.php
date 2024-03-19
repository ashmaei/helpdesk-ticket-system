<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar Pengguna') }}
        </h2>

    </header>
    <x-img-link width="200px" height="200px" class="rounded-full mt-4"/>

    <form action="{{ route('profile.avatar.ai') }}" method="post" class="mt-4">
        @csrf

        <x-input-label for="avatar" :value="__('Jana Avatar dari OpenAi - surcaj/jana')" />

        <x-primary-button id="avatar">{{ __('Jana Avatar') }}</x-primary-button>

    </form>


    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
        {{ __("$user->name") }}
    </p>

    <p class="my-4 text-sm text-gray-600 dark:text-gray-600">
        atau
    </p>


    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf


        <div>
            <x-input-label for="files" :value="__('Muatnaik Avatar dari Peranti')" />
            <x-file-input id="avatar" name="avatar" id="files" :value="old('avatar', $user->avatar) " required />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="mt-4 flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            @if (session('message') === 'avatar-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>