<section class="mb-8">
    <h2 class="text-2xl font-condensed uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Languages</h2>
    @foreach ($languages as $language)
        <div class="mb-4">
            <h3 class="text-xl mb-1">{{ $language->name }}: {{ $language->level->name}}</h3>
            <div class="h-1 bg-gray-200 w-3/5 m-auto">
                <div class="h-1 bg-black w-{{ $language->level->numeric }}/5"></div>
            </div>
        </div>
    @endforeach
</section>