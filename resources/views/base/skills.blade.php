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