<div class="modal fade" id="updateTaglineModal" tabindex="-1" aria-labelledby="updateTaglineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateTaglineModalLabel">Update Tag Line</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {!! Form::model($candidate, ['url'=>'/candidates/' . $candidate->id, 'method'=>'patch']) !!}
        <div class="modal-body">
            <div class="mb-3">
                {!! Form::label('tag_line', 'Tag Line') !!}
                {!! Form::text('tag_line', null, ['class'=>'form-control text-primary']) !!}
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
