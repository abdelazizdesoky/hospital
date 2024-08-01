<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('section_tran.edit_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sections.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('section_tran.name_sections')}}</label>
                    <input type="hidden" name="id" value="{{ $section->id }}">
                    <input type="text" name="name" value="{{ $section->name }}" class="form-control">

                    <label for="exampleInputPassword1">{{trans('section_tran.description')}}</label>
                    <input type="text" name="description" value="{{ $section->description }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('section_tran.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('section_tran.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
