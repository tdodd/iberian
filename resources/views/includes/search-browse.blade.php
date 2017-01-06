<form method="POST" action="{{ route('person.refine') }}">

    <!-- Name details -->

    <div class="row form-group">

        <div class="col-md-3">
            <input type="text" name="fName" placeholder="First Name" class="form-control" value="{{ old('fName') }}">
        </div>
        
        <div class="col-md-3">
            <input type="text" name="mName" placeholder="Middle Name" class="form-control" value="{{ old('mName') }}">
        </div>
        
        <div class="col-md-3">
            <input type="text" name="lName" placeholder="Last Name" class="form-control" value="{{ old('lName') }}">
        </div>
        
        <div class="col-md-3">
            <input type="text" name="alias" placeholder="Alias" class="form-control" value="{{ old('alias') }}">
        </div>

    </div>

    <!--Birth and arrival details -->

    <div class="row form-group">
        
        <div class="col-md-6">
            <input type="text" name="birthPlace" placeholder="Birthplace" class="form-control" value="{{ old('birthPlace') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="arrivalPlace" placeholder="Arrival Place" class="form-control" value="{{ old('arrivalPlace') }}">
        </div>

    </div>

    <!-- Profession -->

    <div class="row form-group">

         <div class="col-md-12">
            <input type="text" name="profession" placeholder="Profession" class="form-control" value="{{ old('profession') }}">
         </div>

    </div>

    <!-- Submit -->

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>

</form>