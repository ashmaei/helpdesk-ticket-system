<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar Pengguna') }}
        </h2>

        <img width="200" height="200" class="rounded-full mt-4" src="{{ "/storage/$user->avatar" }}" alt="User avatar" />

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" >
            {{ __("$user->name") }}
        </p>
    </header>




    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @method('patch')
        @csrf


        <div>
            <x-input-label for="name" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" display=none type="file" id="files" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            @if (session('message') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>