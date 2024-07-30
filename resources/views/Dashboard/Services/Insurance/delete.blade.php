<!-- Modal -->
<div class="modal fade" id="delete{{ $Insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Insurance.delete_insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Insurance.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $Insurance->id }}">
                <h5>{{trans('doctor.want_delete')}} {{ $Insurance->name }} </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('doctor.close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('doctor.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
