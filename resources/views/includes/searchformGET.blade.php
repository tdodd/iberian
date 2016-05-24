<form method="get" action="{{ url('search') }}" class="form-horizontal" role="form">

    <!-- Name details -->

    <div class="form-group">
        <div class="col-md-4"><input type="text" name="fName" placeholder="First Name" class="form-control"
                                     value="{{ old('fName') }}"></div>
        <div class="col-md-4"><input type="text" name="mName" placeholder="Middle Name" class="form-control"
                                     value="{{ old('mName') }}"></div>
        <div class="col-md-4"><input type="text" name="lName" placeholder="Last Name" class="form-control"
                                     value="{{ old('lName') }}"></div>
    </div>

    <!-- Date details -->

    <div class="form-group">
        <div class="col-md-6"><input type="text" name="DoB" placeholder="Date of Birth" class="form-control"
                                     value="{{ old('DoB') }}"></div>
        <div class="col-md-6"><input type="text" name="DoD" placeholder="Date of Death" class="form-control"
                                     value="{{ old('DoD') }}"></div>
    </div>

    <!--Birth details -->

    <div class="form-group row">
        <div class="col-md-6"><input type="text" name="birthCity" placeholder="Birth City" class="form-control"
                                     value="{{ old('birthCity') }}"></div>
        <div class="col-md-6"><input type="text" name="birthCountry" placeholder="Birth Country" class="form-control"
                                     value="{{ old('birthCountry') }}">
        </div>
    </div>

    <!-- Arrival details -->

    <div class="form-group">
        <div class="col-md-4"><input type="text" name="arrivalCity" placeholder="Arrival City" class="form-control"
                                     value="{{ old('arrivalCity') }}">
        </div>
        <div class="col-md-4"><input type="text" name="arrivalCountry" placeholder="Arrival Country"
                                     class="form-control" value="{{ old('arrivalCountry') }}">
        </div>
        <div class="col-md-4"><input type="text" name="arrivalDate" placeholder="Date of arrival" class="form-control"
                                     value="{{ old('arrivalDate') }}"></div>
    </div>

    <!-- Profession -->

    <div class="form-group">
        <div class="col-md-12"><input type="text" name="profession" placeholder="Profession" class="form-control"
                                      value="{{ old('profession') }}">
        </div>
    </div>

    <!-- Submit -->

    <div class="col-md-2 col-md-offset-5">
        <input type="submit" value="Search" class="btn btn-default">
    </div>

</form>