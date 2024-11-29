<header class="col-span-full flex flex-col items-center justify-center gap-4 uppercase text-center">
    <img class="w-32 m-4" src="{{ $me->image }}" alt="{{ $me->image }}">
    <h1 class="text-4xl font-light">{{ $me->name }} {{ $me->surname }}</h1>
    <div class="flex flex-col gap-2 md:flex-row md:gap-2 align-middle">
        <span>{{ $me->title }}</span>
        <span class="flex items-center justify-center content-center gap-2">
            <x-fas-location-dot class="w-4"/>
            {{ $me->email }}
        </span>
        <span class="flex items-center justify-center content-center gap-2">
            <x-fas-phone class="w-4"/>
            {{ $me->phone }}
        </span>
    </div>
</header>