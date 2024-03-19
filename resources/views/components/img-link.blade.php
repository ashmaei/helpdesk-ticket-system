@php
$sources = (Auth::user()->avatar ?? false)
            ? '/storage/' . Auth::user()->avatar
            : '/storage/avatars/default-5.png';
@endphp

<img {{ $attributes->merge(['src' => $sources]) }} />