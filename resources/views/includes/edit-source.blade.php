<div class="required-container">
  <p class="top-left">* required</p>
</div>

<form method="POST" action="{{ route('person.add-source') }}">

   <!-- CSRF hidden field -->
   {{ csrf_field() }}

   <!-- Person being edited's id -->
   <input type="hidden" name="person_id" value="{{ $attributes['id'] }}">
  
  <!-- Information for new Source -->
  <div class="row form-group">

    <!-- Source name -->
    <div class="col-md-6 {{ $errors->has('sourceNameEN') ? ' has-error' : '' }}">
      <input type="text" name="sourceNameEN" placeholder="Source Name*" class="form-control">
      @if ($errors->has('sourceNameEN'))
        <span class="help-block"><strong>{{ $errors->first('sourceNameEN') }}</strong></span>
      @endif
    </div>

    <!-- Source link -->
    <div class="col-md-6 {{ $errors->has('sourceLink') ? ' has-error' : '' }}">
      <input type="text" id="link" name="sourceLink" placeholder="Link" class="form-control">
      @if ($errors->has('sourceLink'))
        <span class="help-block"><strong>{{ $errors->first('sourceLink') }}</strong></span>
      @endif
    </div>

    <!-- Source notes -->
    <div class="col-md-12 {{ $errors->has('sourceNotesEN') ? ' has-error' : '' }}">
      <textarea name="sourceNotesEN" class="form-control notes" placeholder="Source Details" rows="3"></textarea>
      @if ($errors->has('sourceNotesEN'))
        <span class="help-block"><strong>{{ $errors->first('sourceNotesEN') }}</strong></span>
      @endif
    </div>

  </div>

   <!-- Submit Button -->
   <div class="row text-center">

     <div class="col-md-12">
       <button type="submit"  class="btn btn-success save-btn">Save new source</button>
     </div>

   </div>

</form>

<!-- Display existing sources -->
<table class="table table-striped sources-container"> 

  <thead>
    <tr>
      <th>Name</th>
      <th>Details</th>
    </tr>
  </thead>

  <tbody>
  @foreach($sources as $index => $source)

    <!-- Edit modal -->
    <div class="modal fade" id="sourceModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="sourceModalLabel-{{ $index }}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="sourceModalLabel-{{ $index }}">Edit Source</h4>
          </div>
          
          <!-- Edit modal form -->
          <form method="POST" action="{{ route('person.sources.edit') }}" class="form-horizontal">

            <div class="modal-body">

                {{ csrf_field() }}
                <input type="hidden" name="sourceID" value="{{ $source->id }}">
                <input type="hidden" name="personID" value="{{ $attributes['id'] }}">
                
                <div class="modal-label">Name:</div>
                
                <div class="row">

                  <div class="col-md-12">
                    <input type="text" name="sourceNameEN" class="form-control" value="{{ $source->nameEN }}" placeholder="Source Name (en)">
                  </div>

                </div>

               <div class="modal-label">Link:</div>
               <input type="text" name="sourceLink" class="form-control" value="{{ $source->link }}" placeholder="Source Link">

                <div class="modal-label">Details:</div>
                <textarea name="sourceNotesEN" class="form-control notes" rows="4" placeholder="Source Details">{{ $source->notesEN }}</textarea>

            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Save changes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </form>
        
        </div>
      </div>
    </div> <!-- End Edit modal -->
  
    <!-- Row for each source -->
    <tr>

      <!-- Source name -->
      <td>
        {{ $source->nameEN }}
        <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#sourceModal-{{ $index }}"></span>
      </td>            

      <!-- Dource details-->
      <td>{{ $source->notesEN }}</td>
      
      <!-- Delete source -->
      <td>
          <form method="POST" id="delete-{{ $index }}" action="{{ route('source.destroy') }}" class="deleteForm">
             
             {{ csrf_field() }}
             <input type="hidden" name="_method" value="Delete">
             <input type="hidden" name="sourceID" value="{{ $source->id }}">
             <input type="hidden" name="person_id" value="{{ $attributes['id'] }}">
             <input type="submit" class="btn-delete" value="delete">

         </form>
      </td>

    </tr> <!-- End row -->


  @endforeach
  </tbody>
</table>