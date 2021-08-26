<div class="modal fade" id="updateShortBioModal" tabindex="-1" aria-labelledby="updateShortBioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateShortBioModalLabel">Update Tag Line</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {!! Form::model($candidate, ['url'=>'/candidates/' . $candidate->id, 'method'=>'patch']) !!}
        <div class="modal-body">
            <div class="mb-3">
                {!! Form::label('short_bio', 'Short Bio') !!}
                {!! Form::textarea('short_bio', null, ['class'=>'form-control text-primary w-100','rows'=>'5']) !!}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
