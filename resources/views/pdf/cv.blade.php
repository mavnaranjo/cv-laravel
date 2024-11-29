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
    @include('base/header', ['me' => $me])

    <main class="md:col-span-2 gap-4 md:order-2">
        @include('base/profile', ['me' => $me])
        @include('pdf/jobs', ['jobs' => $jobs])
        @include('base/studies', ['studies' => $studies])
    </main>

    <aside class="text-center">
        @include('base/details', ['me' => $me])
        @include('base/links', ['me' => $me])
        @include('base/skills', ['skills' => $skills])
        @include('base/languages', ['languages' => $languages])
        @include('base/hobbies', ['me' => $me])
    </aside>
</body>
</html>