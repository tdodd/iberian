<form method="post" action="{{ route('person.store') }}" class="panel">

    <!-- CSRF hidden input -->
    {{ csrf_field() }}

    <!-- Name details -->
    <div class="row form-group">

        <!-- First Name -->
        <div class="col-md-3 {{ $errors->has('fName') ? ' has-error' : '' }}">
            <input type="text" name="fName" placeholder="First Name" class="form-control" value="{{ old('fName') }}">
            
            @if ($errors->has('fName'))
            <span class="help-block">
                <strong>{{ $errors->first('fName') }}</strong>
            </span>
            @endif
        </div>

        <!-- Middle Name -->
        <div class="col-md-3 {{ $errors->has('mName') ? ' has-error' : '' }}">
            <input type="text" name="mName" placeholder="Middle Name" class="form-control" value="{{ old('mName') }}">
            
            @if ($errors->has('mName'))
            <span class="help-block">
                <strong>{{ $errors->first('mName') }}</strong>
            </span>
            @endif
        </div>

        <!-- Last Name -->
        <div class="col-md-3 {{ $errors->has('lName') ? ' has-error' : '' }}">
            <input type="text" name="lName" placeholder="Last Name" class="form-control" value="{{ old('lName') }}">
           
            @if ($errors->has('lName'))
            <span class="help-block">
                <strong>{{ $errors->first('lName') }}</strong>
            </span>
            @endif
        </div>

        <!-- Alias -->
        <div class="col-md-3 {{ $errors->has('alias') ? ' has-error' : '' }}">
            <input type="text" name="alias" placeholder="Alias" class="form-control" value="{{ old('alias') }}">
           
            @if ($errors->has('alias'))
            <span class="help-block">
                <strong>{{ $errors->first('alias') }}</strong>
            </span>
            @endif
        </div>

    </div> <!-- End name Details -->

    <!-- Place details -->

    <div class="row form-group">

        <!--Birthplace (english) -->
        <div class="col-md-3 {{ $errors->has('birthPlaceEN') ? ' has-error' : '' }}">
            <input type="text" name="birthPlaceEN" placeholder="Birthplace (en)" class="form-control" value="{{ old('birthPlaceEN') }}">
            
            @if ($errors->has('birthPlaceEN'))
            <span class="help-block">
                <strong>{{ $errors->first('birthPlaceEN') }}</strong>
            </span>
            @endif
        </div>

        <!--Birthplace (spanish) -->
        <div class="col-md-3 {{ $errors->has('birthPlaceESP') ? ' has-error' : '' }}">
            <input type="text" name="birthPlaceESP" placeholder="Birthplace (esp)" class="form-control" value="{{ old('birthPlaceESP') }}">
            
            @if ($errors->has('birthPlaceESP'))
            <span class="help-block">
                <strong>{{ $errors->first('birthPlaceESP') }}</strong>
            </span>
            @endif
        </div>

        <!-- Arrival Place (english) -->
        <div class="col-md-3 {{ $errors->has('arrivalPlaceEN') ? ' has-error' : '' }}">
            <input type="text" name="arrivalPlaceEN" placeholder="Place of Arrival (en)" class="form-control" value="{{ old('arrivalPlaceEN') }}">
            
            @if ($errors->has('arrivalPlaceEN'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalPlaceEN') }}</strong>
            </span>
            @endif
        </div>

        <!-- Arrival Place (spanish) -->
        <div class="col-md-3 {{ $errors->has('arrivalPlaceESP') ? ' has-error' : '' }}">
            <input type="text" name="arrivalPlaceESP" placeholder="Place of Arrival (esp)" class="form-control" value="{{ old('arrivalPlaceESP') }}">
            
            @if ($errors->has('arrivalPlaceESP'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalPlaceESP') }}</strong>
            </span>
            @endif
        </div>

    </div> <!-- End Place details -->

    <!-- Profession Details-->

    <div class="form-group row">

        <!-- Profession (english) -->
        <div class="col-md-6 {{ $errors->has('professionEN') ? ' has-error' : '' }}">
            <input type="text" name="professionEN" placeholder="Profession (en)" class="form-control" value="{{ old('professionEN') }}">
        </div>
       
        @if ($errors->has('professionEN'))
        <span class="help-block">
            <strong>{{ $errors->first('professionEN') }}</strong>
        </span>
        @endif

        <!-- Profession (spanish) -->    
        <div class="col-md-6 {{ $errors->has('professionESP') ? ' has-error' : '' }}">
            <input type="text" name="professionESP" placeholder="Profession (esp)" class="form-control" value="{{ old('professionESP') }}">
        </div>
       
        @if ($errors->has('professionESP'))
        <span class="help-block">
            <strong>{{ $errors->first('professionESP') }}</strong>
        </span>
        @endif

    </div> <!-- End profession details -->

    <!-- Notes -->

    <div class="form-group row">
        <div class="col-md-12">
            <input type="text" name="notes" placeholder="Notes.." class="form-control" value="{{ old('notes') }}">
        </div>
    </div>

    <!-- Date checkboxes -->

     <div class="form-group row dategroup">
        <span class="date-label">Add Dates:</span>
        <input type="checkbox" class="datebox" id="birth">Birth
        <input type="checkbox" class="datebox" id="death">Death
        <input type="checkbox" class="datebox" id="arrival">Arrival
    </div>

    <!-- Birth details -->

    <div class="row date date-birth form-group">

        <!-- Year of Birth -->
        <div class="col-md-2 {{ $errors->has('birthYear') ? ' has-error' : '' }}">
            <input type="text" name="birthYear" placeholder="Year of Birth" class="form-control" value="{{ old('birthYear') }}">
           
            @if ($errors->has('birthYear'))
            <span class="help-block">
                <strong>{{ $errors->first('birthYear') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Birth (english) -->
        <div class="col-md-4 {{ $errors->has('birthMonthEN') ? ' has-error' : '' }}">
            <input type="text" name="birthMonthEN" placeholder="Month of Birth (en)" class="form-control" value="{{ old('birthMonthEN') }}">
           
            @if ($errors->has('birthMonthEN'))
            <span class="help-block">
                <strong>{{ $errors->first('birthMonthEN') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Birth (spanish) -->
        <div class="col-md-4 {{ $errors->has('birthMonthESP') ? ' has-error' : '' }}">
            <input type="text" name="birthMonthESP" placeholder="Month of Birth (esp)" class="form-control" value="{{ old('birthMonthESP') }}">
           
            @if ($errors->has('birthMonthESP'))
            <span class="help-block">
                <strong>{{ $errors->first('birthMonthESP') }}</strong>
            </span>
            @endif
        </div> 

        <!-- Day of Birth -->
        <div class="col-md-2 {{ $errors->has('birthDay') ? ' has-error' : '' }}">
            <input type="text" name="birthDay" placeholder="Day of Birth" class="form-control" value="{{ old('birthDay') }}">
           
            @if ($errors->has('birthDay'))
            <span class="help-block">
                <strong>{{ $errors->first('birthDay') }}</strong>
            </span>
            @endif
        </div>

    </div>

    <!-- Death Details -->

    <div class="row date date-death form-group">

        <!-- Year of Death -->
        <div class="col-md-2 {{ $errors->has('deathYear') ? ' has-error' : '' }}">
            <input type="text" name="deathYear" placeholder="Year of Death" class="form-control" value="{{ old('deathYear') }}">
           
            @if ($errors->has('deathYear'))
            <span class="help-block">
                <strong>{{ $errors->first('deathYear') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Death (english) -->
        <div class="col-md-4 {{ $errors->has('deathMonthEN') ? ' has-error' : '' }}">
            <input type="text" name="deathMonthEN" placeholder="Month of Death (en)" class="form-control" value="{{ old('deathMonthEN') }}">
           
            @if ($errors->has('deathMonthEN'))
            <span class="help-block">
                <strong>{{ $errors->first('deathMonthEN') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Death (spanish) -->
        <div class="col-md-4 {{ $errors->has('deathMonthESP') ? ' has-error' : '' }}">
            <input type="text" name="deathMonthESP" placeholder="Month of Death (esp)" class="form-control" value="{{ old('deathMonthESP') }}">
           
            @if ($errors->has('deathMonthESP'))
            <span class="help-block">
                <strong>{{ $errors->first('deathMonthESP') }}</strong>
            </span>
            @endif
        </div> 

        <!-- Day of Death -->
        <div class="col-md-2 {{ $errors->has('deathDay') ? ' has-error' : '' }}">
            <input type="text" name="deathDay" placeholder="Day of Death" class="form-control" value="{{ old('deathDay') }}">
           
            @if ($errors->has('deathDay'))
            <span class="help-block">
                <strong>{{ $errors->first('deathDay') }}</strong>
            </span>
            @endif
        </div>

    </div>

    <!-- Arrival Details -->

    <div class="row date date-arrival form-group">

        <!-- Year of Arrival -->
        <div class="col-md-2 {{ $errors->has('arrivalYear') ? ' has-error' : '' }}">
            <input type="text" name="arrivalYear" placeholder="Year of Arrival" class="form-control" value="{{ old('arrivalYear') }}">
           
            @if ($errors->has('arrivalYear'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalYear') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Arrival (english) -->
        <div class="col-md-4 {{ $errors->has('arrivalMonthEN') ? ' has-error' : '' }}">
            <input type="text" name="arrivalMonthEN" placeholder="Month of Arrival (en)" class="form-control" value="{{ old('arrivalMonthEN') }}">
           
            @if ($errors->has('arrivalMonthEN'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalMonthEN') }}</strong>
            </span>
            @endif
        </div>

        <!-- Month of Arrival (spanish) -->
        <div class="col-md-4 {{ $errors->has('arrivalMonthESP') ? ' has-error' : '' }}">
            <input type="text" name="arrivalMonthESP" placeholder="Month of Arrival (esp)" class="form-control" value="{{ old('arrivalMonthESP') }}">
           
            @if ($errors->has('arrivalMonthESP'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalMonthESP') }}</strong>
            </span>
            @endif
        </div> 

        <!-- Day of Arrival -->
        <div class="col-md-2 {{ $errors->has('arrivalDay') ? ' has-error' : '' }}">
            <input type="text" name="arrivalDay" placeholder="Day of Arrival" class="form-control" value="{{ old('arrivalDay') }}">
           
            @if ($errors->has('arrivalDay'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalDay') }}</strong>
            </span>
            @endif
        </div>

    </div> <!-- End date section -->  

    <!-- Submit button -->

    <div class="row text-center">
        <button type="submit" class="btn btn-primary">Create this person</button>
    </div>

</form>