<table class="table table-striped">
    <tbody>
    @foreach ($attributes as $attribute => $value)     
        @if (!in_array($attribute, $doNotInclude))
        
            @if(!in_array($attribute, $englishTerms) AND App::isLocale('esp'))
            <tr>
                <td><strong>{{ translate($attribute) }}</strong></td>            
                <td>{{ $value == '' ? '-' : $value }}</td>
            </tr>

            @elseif(!in_array($attribute, $spanishTerms) AND App::isLocale('en'))
            <tr>
                <td><strong>{{ translate($attribute) }}</strong></td>            
                <td>{{ $value == '' ? '-' : $value }}</td>
            </tr>
            @endif    

        @endif
    @endforeach
    </tbody>
</table>