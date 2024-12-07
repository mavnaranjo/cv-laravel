<section class="mb-8">
    <h2 class="text-2xl font-condensed uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Links</h2>
    @foreach ($me->links as $site => $url)
        <a href="{{ $url }}" class="underline">{{ $site }}</a>        
    @endforeach
</section>