<form method="POST" action="{{ route('advanced-search') }}" class="panel" id="searchForm" role="form">

    <!-- Name details -->

    <div class="row form-group">    
        <div class="col-md-3">
            <input type="text" name="fName" placeholder="@lang('messages.first-name')" class="form-control" value="{{ old('fName') }}">
        </div>
        
        <div class="col-md-3">
            <input type="text" name="mName" placeholder="@lang('messages.middle-name')" class="form-control" value="{{ old('mName') }}">
        </div>
        
        <div class="col-md-3">
            <input type="text" name="lName" placeholder="@lang('messages.last-name')" class="form-control" value="{{ old('lName') }}">
        </div>

        <div class="col-md-3">
            <input type="text" name="alias" placeholder="@lang('messages.alias')" class="form-control" value="{{ old('alias') }}">
        </div>
    </div>

    <!-- Birth and Arrival Places -->

    <div class="row form-group">
       
        <div class="col-md-6">
            <input type="text" name="birthPlace{{ App::isLocale('en') ? 'EN' : 'ESP' }}"
                placeholder="@lang('messages.birth-place')" class="form-control"
                value="{{ App::isLocale('en') ? old('birthPlaceEN') : old('birthPlaceESP') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="arrivalPlace{{ App::isLocale('en') ? 'EN' : 'ESP' }}"
            placeholder="@lang('messages.arrival-place')" class="form-control"
            value="{{ App::isLocale('en') ? old('arrivalPlaceEN') : old('arrivalPlaceESP') }}">
        </div>

    </div> 

    <!-- Profession -->

    <div class="row form-group">
        <div class="col-md-12">
            <input type="text" name="profession{{ App::isLocale('en') ? 'EN' : 'ESP' }}"
            placeholder="@lang('messages.profession')" class="form-control"
            value="{{ App::isLocale('en') ? old('professionEN') : old('professionESP') }}">
        </div>
    </div>


    <!-- Date section -->

    <div class="date-container">
        
        <!-- Birth -->
        <div class="row date date-birth form-group">

            @lang('messages.born-between')
            <input type="text" name="birth1" class="date-range {{ $errors->has('birth1') ? ' has-error' : '' }}" value="{{ old('birth1') }}">
            @lang('messages.and')
            <input type="text" name="birth2" class="date-range {{ $errors->has('birth2') ? ' has-error' : '' }}" value="{{ old('birth2') }}">

        </div>

        <!-- Death Details -->
        <div class="row date date-death form-group">

            @lang('messages.died-between')
            <input type="text" name="death1" class="date-range {{ $errors->has('death1') ? ' has-error' : '' }}" value="{{ old('death1') }}" >
            @lang('messages.and')
            <input type="text" name="death2" class="date-range {{ $errors->has('death2') ? ' has-error' : '' }}" value="{{ old('death2') }}">

        </div>

        <!-- Arrival Details -->
        <div class="row date date-arrival form-group">

            @lang('messages.arrived-between')
            <input type="text" name="arrival1" class="date-range {{ $errors->has('arrival1') ? ' has-error' : '' }}" value="{{ old('arrival1') }}">
            @lang('messages.and')
            <input type="text" name="arrival2" class="date-range {{ $errors->has('arrival2') ? ' has-error' : '' }}" value="{{ old('arrival2') }}">

        </div>

    </div> <!-- End date section -->

    <!-- Submit -->
    <div class="text-center">
        <button class="btn btn-primary" type="submit" name="action">@lang('messages.search-button')</button>
    </div>

</form>