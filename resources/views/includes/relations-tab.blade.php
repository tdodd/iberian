@foreach($relations as $person)
<div class="relation">

	@if(App::isLocale('en'))
    {{ $person->pivot->relationNameEN }}:
	@else
    {{ $person->pivot->relationNameESP }}:
  @endif

  <a href="{{ route('person.show', $person->id) }}">{{ $person->fName }} {{ $person->lName }}</a>

</div>
@endforeach
