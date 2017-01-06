<div class="required-container">
  <p class="top-left">* required</p>
</div>

<form method="POST" action="{{ route('person.relations') }}">

    <!-- CSRF hidden input -->
    {{ csrf_field() }}
    
   <!-- Person being edited's id -->
   <input type="hidden" name="person_id" value="{{ $attributes['id'] }}">

   <!-- Container -->
   <div class="form-group row">

      <!-- New relation name -->
      <div class="col-md-4 {{ $errors->has('relationNameEN') ? ' has-error' : '' }}">
        <input type="text" name="relationNameEN" placeholder="Relation Name* (en)" class="form-control">
        @if ($errors->has('relationNameEN'))
          <span class="help-block"><strong>{{ $errors->first('relationNameEN') }}</strong></span>
        @endif
      </div>

      <div class="col-md-4 {{ $errors->has('relationNameESP') ? ' has-error' : '' }}">
         <input type="text" name="relationNameESP" placeholder="Relation Name* (esp)" class="form-control">
         @if ($errors->has('relationNameESP'))
          <span class="help-block"><strong>{{ $errors->first('relationNameESP') }}</strong></span>
        @endif
      </div>
      
      <!-- Other person in the relationship -->
      <div class="col-md-4 {{ $errors->has('otherPerson') ? ' has-error' : '' }}">
         <input type="text" id="otherPerson" placeholder="Other person*" class="form-control" autocomplete="off">
         @if ($errors->has('otherPerson'))
          <span class="help-block"><strong>{{ $errors->first('otherPerson') }}</strong></span>
        @endif
      </div>

   </div>

   <!-- Async search results displayed here -->
   <div id="results"></div>

   <!-- Save button -->
   <div class="row text-center">
      <div class="col-md-12">
         <button type="submit" class="btn btn-success save-btn">Save New Relationship</button>         
      </div>   
   </div>

</form>

<!-- Display existing relations -->
<div class="row relations-container">

   <table class="table table-striped">

    <thead>
      <tr>
        <th>Relation Name</th>
        <th>Other Person</th>
      </tr>
    </thead>

      <tbody>
      @foreach($relations as $index => $person)

         <!-- Relation id -->
         <input type="hidden" name="relation_id-{{ $index }}" value="{{ $person->pivot->id }}">

         <!-- Edit modal -->
         <div class="modal fade" id="myModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{ $index }}">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-{{ $index }}">Edit Relationship</h4>
              </div>
              
              <form method="POST" action="{{ route('person.relations.edit') }}">

                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="relationID" value="{{ $person->pivot->id }}">
                    <input type="hidden" name="personID" value="{{ $attributes['id'] }}">

                    <span class="modal-label">Relation Name:</span>
                    
                    <div class="row">

                      <div class="col-md-6">
                        <input type="text" name="relationNameEN" class="form-control" placeholder="Relation Name (en)" value="{{ $person->pivot->relationNameEN }}">
                      </div>
                      
                      <div class="col-md-6">
                        <input type="text" name="relationNameESP" class="form-control" placeholder="Relation Name (esp)" value="{{ $person->pivot->relationNameESP }}">
                      </div>
                   
                    </div>
                    

                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save changes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </form>
            
            </div>
          </div>
        </div> <!-- End Edit modal -->

        <!-- Row for each relation -->
        <tr>

          <!-- Relation name -->
          <td>
            {{ $person->pivot->relationNameEN }}
            <!-- Edit icon -->
            <span class="glyphicon glyphicon-pencil" id="{{ $person->pivot->id }}" data-toggle="modal" data-target="#myModal-{{ $index }}"></span>
          </td>            

          <!-- Other person in the relationship -->
          <td>
            <a href="{{ route('person.edit', $person->id) }}">{{ $person->fName }} {{ $person->lName }}</a>
          </td>
          
          <!-- Delete relationship -->
          <td>
              <form method="POST" action="{{ route('relation.destroy') }}" class="deleteForm">
                 {{ csrf_field() }}
                 <input type="hidden" name="_method" value="DELETE">
                 <input type="hidden" name="relationID" value="{{ $person->pivot->id }}">
                 <input type="hidden" name="person_id" value="{{ $attributes['id'] }}">
                 <input type="submit" class="btn-delete" value="delete">
             </form>
          </td>

        </tr> <!-- End row -->

      @endforeach
      </tbody>
   </table>

</div>