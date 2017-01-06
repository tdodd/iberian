<form method="POST" action="{{ route('person.update', $attributes['id']) }}" class="form-horizontal">

    <!-- Set form method to 'PATCH' -->
    <input type="hidden" name="_method" value="PATCH">

    <!-- CSRF hidden input -->
    {{ csrf_field() }}

    <!-- Name details -->

    <div class="form-group">

        <!-- First Name -->
        <div class="col-md-3 {{ $errors->has('fName') ? ' has-error' : '' }}">
            <input type="text" name="fName" class="form-control" placeholder="First Name" value="{{ $attributes['fName'] }}">
            @if ($errors->has('fName'))
                <span class="help-block"><strong>{{ $errors->first('fName') }}</strong></span>
            @endif
        </div>

        <!-- Middle Name -->
        <div class="col-md-3 {{ $errors->has('mName') ? ' has-error' : '' }}">
            <input type="text" name="mName" class="form-control" placeholder="Middle Name" value="{{ $attributes['mName'] }}">
            @if ($errors->has('mName'))
                <span class="help-block"><strong>{{ $errors->first('mName') }}</strong></span>
            @endif
        </div>

        <!-- Last Name -->
        <div class="col-md-3 {{ $errors->has('lName') ? ' has-error' : '' }}">
            <input type="text" name="lName" class="form-control" placeholder="Last Name" value="{{ $attributes['lName'] }}">
            @if ($errors->has('lName'))
                <span class="help-block"><strong>{{ $errors->first('lName') }}</strong></span>
            @endif
        </div>

        <!-- Alias -->
        <div class="col-md-3 {{ $errors->has('alias') ? ' has-error' : '' }}">
            <input type="text" name="alias" class="form-control" placeholder="Alias" value="{{ $attributes['alias'] }}">
            @if ($errors->has('alias'))
                <span class="help-block"><strong>{{ $errors->first('alias') }}</strong></span>
            @endif
        </div>

    </div>

    <!-- Birth and Arrival details -->

    <div class="form-group">

        <!--Birthplace (english) -->
        <div class="col-md-3 {{ $errors->has('birthPlaceEN') ? ' has-error' : '' }}">
            <input type="text" name="birthPlaceEN" placeholder="Birthplace (en)" class="form-control" value="{{ $attributes['birthPlaceEN'] }}">
            
            @if ($errors->has('birthPlaceEN'))
            <span class="help-block">
                <strong>{{ $errors->first('birthPlaceEN') }}</strong>
            </span>
            @endif
        </div>

        <!--Birthplace (spanish) -->
        <div class="col-md-3 {{ $errors->has('birthPlaceESP') ? ' has-error' : '' }}">
            <input type="text" name="birthPlaceESP" placeholder="Birthplace (esp)" class="form-control" value="{{ $attributes['birthPlaceESP'] }}">
            
            @if ($errors->has('birthPlaceESP'))
            <span class="help-block">
                <strong>{{ $errors->first('birthPlaceESP') }}</strong>
            </span>
            @endif
        </div>

        <!-- Arrival Place (english) -->
        <div class="col-md-3 {{ $errors->has('arrivalPlaceEN') ? ' has-error' : '' }}">
            <input type="text" name="arrivalPlaceEN" placeholder="Place of Arrival (en)" class="form-control" value="{{ $attributes['arrivalPlaceEN'] }}">
            
            @if ($errors->has('arrivalPlaceEN'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalPlaceEN') }}</strong>
            </span>
            @endif
        </div>

        <!-- Arrival Place (spanish) -->
        <div class="col-md-3 {{ $errors->has('arrivalPlaceESP') ? ' has-error' : '' }}">
            <input type="text" name="arrivalPlaceESP" placeholder="Place of Arrival (esp)" class="form-control" value="{{ $attributes['arrivalPlaceESP'] }}">
            
            @if ($errors->has('arrivalPlaceESP'))
            <span class="help-block">
                <strong>{{ $errors->first('arrivalPlaceESP') }}</strong>
            </span>
            @endif
        </div>

    </div>

    <!-- Profession -->
    <div class="form-group">
        
        <!-- Profession (english) -->
        <div class="col-md-6 {{ $errors->has('professionEN') ? ' has-error' : '' }}">
            <input type="text" name="professionEN" placeholder="Profession (en)" class="form-control" value="{{ $attributes['professionEN'] }}">
        </div>
       
        @if ($errors->has('professionEN'))
        <span class="help-block">
            <strong>{{ $errors->first('professionEN') }}</strong>
        </span>
        @endif

        <!-- Profession (spanish) -->    
        <div class="col-md-6 {{ $errors->has('professionESP') ? ' has-error' : '' }}">
            <input type="text" name="professionESP" placeholder="Profession (esp)" class="form-control" value="{{ $attributes['professionESP'] }}">
        </div>
       
        @if ($errors->has('professionESP'))
        <span class="help-block">
            <strong>{{ $errors->first('professionESP') }}</strong>
        </span>
        @endif

    </div>

    <!-- Notes -->
    <div class="form-group">
        <div class="col-md-12 {{ $errors->has('notes') ? ' has-error' : '' }}">
            <label for="notes" id="notes-label">Notes</label>
            <textarea id="notes" name="notes" class="form-control notes" placeholder="Notes" rows="1">{{ $attributes['notes'] }}</textarea>
        </div>
        @if ($errors->has('notes'))
            <span class="help-block"><strong>{{ $errors->first('notes') }}</strong></span>
        @endif
    </div>

    <!-- Date details -->
    <div class="panel panel-default date-panel">

        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Date Information
              <span class="caret"></span>
            </a>
          </h4>
        </div>

        <!-- Collapsible date container -->
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            
            <!-- Birth dates -->
            <div class="form-group">
                <div class="col-md-2">
                    <input type="text" name="birthYear" class="form-control" placeholder="Birth Year" value="{{ $attributes['birthYear'] }}">
                </div>
                
                <div class="col-md-4">
                    <input type="text" name="birthMonthEN" class="form-control" placeholder="Birth Month (en)" value="{{ $attributes['birthMonthEN'] }}">
                </div>

                <div class="col-md-4">
                    <input type="text" name="birthMonthESP" class="form-control" placeholder="Birth Month (esp)" value="{{ $attributes['birthMonthESP'] }}">
                </div>
                
                <div class="col-md-2">
                    <input type="text" name="birthDay" class="form-control" placeholder="Birth Day" value="{{ $attributes['birthDay'] }}">
                </div>
            </div>

            <!-- Death dates -->
            <div class="form-group">
                <div class="col-md-2">
                    <input type="text" name="deathYear" class="form-control" placeholder="Death Year" value="{{ $attributes['deathYear'] }}">
                </div>
                
                <div class="col-md-4">
                    <input type="text" name="deathMonthEN" class="form-control" placeholder="Death Month (en)" value="{{ $attributes['deathMonthEN'] }}">
                </div>

                <div class="col-md-4">
                    <input type="text" name="deathMonthESP" class="form-control" placeholder="Death Month (esp)" value="{{ $attributes['deathMonthESP'] }}">
                </div>
                
                <div class="col-md-2">
                    <input type="text" name="deathDay" class="form-control" placeholder="Death Day" value="{{ $attributes['deathDay'] }}">
                </div>
            </div>

            <!-- Arrival dates -->
            <div class="form-group">
                <div class="col-md-2">
                    <input type="text" name="arrivalYear" class="form-control" placeholder="Arrival Year" value="{{ $attributes['arrivalYear'] }}">
                </div>
                
                <div class="col-md-4">
                    <input type="text" name="arrivalMonthEN" class="form-control" placeholder="Arrival Month (en)" value="{{ $attributes['arrivalMonthEN'] }}">
                </div>

                <div class="col-md-4">
                    <input type="text" name="arrivalMonthESP" class="form-control" placeholder="Arrival Month (esp)" value="{{ $attributes['arrivalMonthESP'] }}">
                </div>
                
                <div class="col-md-2">
                    <input type="text" name="arrivalDay" class="form-control" placeholder="Arrival Day" value="{{ $attributes['arrivalDay'] }}">
                </div>
            </div>

          </div>
        </div>

    </div> <!-- End date panel -->

    <!-- Submit -->
    <div class="text-center">
        <button type="submit" class="btn btn-success save-btn">Update information</button>
    </div>

</form>