<section class="mb-8">
    <h2 class="text-2xl font-condensed uppercase mb-2 -ml-[2px]">
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
                {{ $study->dates->to ? $study->dates->to->format('F Y') : 'present' }}
            </h6>
            <pre class="whitespace-pre-wrap font-sans">{{ $study->description }}</pre>
        </article>
    @endforeach
</section>