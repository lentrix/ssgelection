<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {!! Form::open(['url'=>'/users', 'method'=>'post']) !!}
        <div class="modal-body">
            <div class="mb-3">
                {!! Form::label('idnum', 'ID Number') !!}
                {!! Form::text('idnum', null, ['class'=>'form-control text-primary']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('lname', 'Last Name') !!}
                {!! Form::text('lname', null, ['class'=>'form-control text-primary']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('fname', 'First Name') !!}
                {!! Form::text('fname', null, ['class'=>'form-control text-primary']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('program', 'Program') !!}
                {!! Form::text('program', null, ['class'=>'form-control text-primary']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('year', 'Year') !!}
                {!! Form::text('year', null, ['class'=>'form-control text-primary']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('dept', 'Department') !!}
                {!! Form::text('dept', null, ['class'=>'form-control text-primary']) !!}
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
