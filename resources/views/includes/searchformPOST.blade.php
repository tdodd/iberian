<form method="post" action="{{ url('home') }}" class="form-horizontal" role="form">

    {{ csrf_field() }}

    <!-- Name details -->

    <div class="form-group">
        <div class="col-md-4"><input type="text" name="fName" placeholder="First Name" class="form-control" value="{{ old('fName') }}"></div>
        <div class="col-md-4"><input type="text" name="mName" placeholder="Middle Name" class="form-control" value="{{ old('mName') }}"></div>
        <div class="col-md-4"><input type="text" name="lName" placeholder="Last Name" class="form-control" value="{{ old('lName') }}"></div>
    </div>

    <!-- Date details -->

    <div class="form-group">
        <div class="col-md-6"><input type="text" name="DoB" placeholder="Date of Birth" class="form-control" value="{{ old('DoB') }}"></div>
        <div class="col-md-6"><input type="text" name="DoD" placeholder="Date of Death" class="form-control" value="{{ old('DoD') }}"></div>
    </div>

    <!--Birth details -->

    <div class="form-group row">
        <div class="col-md-6"><input type="text" name="birthCity" placeholder="Birth City" class="form-control" value="{{ old('birthCity') }}"></div>
        <div class="col-md-6"><input type="text" name="birthCountry" placeholder="Birth Country" class="form-control" value="{{ old('birthCountry') }}"></div>
    </div>

    <!-- Arrival details -->

    <div class="form-group">
        <div class="col-md-4"><input type="text" name="arrivalCity" placeholder="City" class="form-control" value="{{ old('arrivalCity') }}"></div>
        <div class="col-md-4"><input type="text" name="arrivalCountry" placeholder="Country" class="form-control" value="{{ old('arrivalCountry') }}"></div>
        <div class="col-md-4"><input type="text" name="arrivalDate" placeholder="Date of arrival" class="form-control" value="{{ old('arrivalDate') }}"></div>
    </div>

    <!-- Profession -->

    <div class="form-group">
        <div class="col-md-12"><input type="text" name="profession" placeholder="Profession" class="form-control" value="{{ old('profession') }}"></div>
    </div>

    <!-- Notes -->

    <div class="form-group">
        <div class="col-md-12"><textarea name="notes" cols="70" rows="5" placeholder="Notes.." class="form-control">{{ old('notes') }}</textarea></div>
    </div>

    <!-- Submit -->

    <div class="col-md-2 col-md-offset-5 text-center">
        <input type="submit" name="submit" value="Submit" class="btn btn-default">
    </div>

</form>