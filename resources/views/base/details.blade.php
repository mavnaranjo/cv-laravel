<section class="mb-8">
    <h2 class="text-2xl font-condensed uppercase mb-2 before:mr-2 after:ml-2 before:content-['∘'] after:content-['∘']">Details</h2>
    <p>{{ $me->address->address }}</p>
    <p>{{ $me->address->city }}, {{ $me->address->zipcode }}</p>
    <p>{{ $me->address->country }}</p>
    <p class="text-s text-gray-500 mt-2">Date of birth</p>
    <p>{{ $me->birthdate->format('d/m/Y') }}</p>
</section>