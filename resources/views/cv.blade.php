<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>CV</title>
</head>
<body class="m-12 grid md:grid-cols-3 gap-12">
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

    <main class="md:col-span-2 gap-4 md:order-2">
        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2">
                <x-fas-user class="inline h-4 align-baseline"/>
                Profile
            </h2>
            <pre class="whitespace-pre-wrap font-sans">{{ $me->description }}</pre>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2">
                <x-fas-briefcase class="inline h-4 align-baseline"/>
                Employment history
            </h2>
            @foreach ($jobs as $job)
                <article class="{{ $loop->last ? 'mb-8' : 'pb-8' }}">
                    <h3 class="text-xl">
                        {{ $job->position }}
                        at {{ $job->company }},
                        {{ $job->location }}
                    </h3>
                    <h6 class="text-s text-gray-500 mb-2">
                        {{ $job->dates->from->format('F Y') }}
                        -
                        {{ $job->dates->to ? $job->dates->to->format('F Y') : 'present' }}
                    </h6>
                    <pre class="whitespace-pre-wrap font-sans">{{ $job->description }}</pre>
                </article>
            @endforeach
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 -ml-[2px]">
                <x-fas-graduation-cap class="inline h-4 align-baseline"/>
                Education
            </h2>
            @foreach ($studies as $study)
                <article class="{{ $loop->last ? 'mb-8' : 'pb-8' }}">
                    <h3 class="text-xl">
                        {{ $study->study }}
                        at {{ $study->institution }}
                    </h3>
                    <h6 class="text-s text-gray-500 mb-2">
                        {{ $study->dates->from->format('F Y') }}
                        -
                        {{ $study->dates->to ? $job->dates->to->format('F Y') : 'present' }}
                    </h6>
                    <pre class="whitespace-pre-wrap font-sans">{{ $study->description }}</pre>
                </article>
            @endforeach
        </section>
    </main>

    <aside class="text-center">
        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Details</h2>
            <p>{{ $me->address->address }}</p>
            <p>{{ $me->address->city }}, {{ $me->address->zipcode }}</p>
            <p>{{ $me->address->country }}</p>
            <p class="text-s text-gray-500 mt-2">Date of birth</p>
            <p>{{ $me->birthdate->format('d/m/Y') }}</p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Links</h2>
            @foreach ($me->links as $site => $url)
                <a href="{{ $url }}" class="underline">{{ $site }}</a>        
            @endforeach
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Skills</h2>
            @foreach ($skills as $skill)
                <div class="mb-4">
                    <p class="text-l mb-1">{{ $skill->name }}</p> {{-- @TODO: years of experience? --}}
                    <div class="h-1 bg-gray-200 w-3/5 m-auto">
                        <div class="h-1 bg-black w-{{ $skill->level }}/5"></div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Languages</h2>
            @foreach ($languages as $language)
                <div class="mb-4">
                    <h3 class="text-xl mb-1">{{ $language->name }}: {{ $language->level->name}}</h3>
                    <div class="h-1 bg-gray-200 w-3/5 m-auto">
                        <div class="h-1 bg-black w-{{ $language->level->numeric }}/5"></div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="mb-8">
            <h2 class="text-2xl uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Hobbies</h2>
            <p>{{ $me->hobbies }}</p>
        </section>
    </aside>
</body>
</html>