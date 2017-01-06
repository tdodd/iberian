@foreach($sources as $source)
	
	<h3 class="source-title">

		@if($source->link !='') {{-- Source has a link --}}
			<a href="{{ $source->link }}" target="_blank">
				{{ App::isLocale('en') ? $source->nameEN : $source->nameESP }}
			</a>

		@else
			{{ App::isLocale('en') ? $source->nameEN : $source->nameESP }}
		@endif

	</h3>	
	
	<p class="source-notes">
		{{ App::isLocale('en') ? $source->notesEN : $source->notesESP }}
	</p>

	<hr>

@endforeach