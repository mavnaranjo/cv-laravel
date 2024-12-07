<section class="mb-8">
    <h2 class="text-2xl uppercase mb-2">
        <x-fas-briefcase class="inline h-4 align-baseline"/>
        Employment history
    </h2>
    @foreach ($jobs as $job)
        @if ($loop->index == 2)
            @pageBreak
        @endif
        <article class="{{ $loop->last ? 'mb-8' : 'pb-8' }} {{ $loop->index == 2 ? 'mt-16' : '' }}">
            <h3 class="text-xl font-condensed">
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