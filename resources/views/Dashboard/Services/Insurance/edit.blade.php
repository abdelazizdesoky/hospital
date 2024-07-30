<!-- Modal -->
<div class="modal fade" id="edit{{ $Insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Insurance.edit_Insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Insurance.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="name">{{trans('Insurance.name')}}</label>
                    <input type="text" name="name" id="name" value="{{$Insurance->name}}" class="form-control"><br>

                    <input type="hidden" name="id" value="{{$Insurance->id}}" class="form-control"><br>

                    <label for="price">{{trans('Insurance.insurance_code')}}</label>
                    <input type="number" name="insurance_code" id="insurance_code" value="{{$Insurance->insurance_code}}" class="form-control"><br>

                    <label for="price">{{trans('Insurance.discount_percentage')}}</label>
                    <input type="number" name="discount_percentage" id="discount_percentage" value="{{$Insurance->discount_percentage}}" class="form-control"><br>

                    <label for="price">{{trans('Insurance.company_rate')}}</label>
                    <input type="number" name="company_rate" id="company_rate" value="{{$Insurance->company_rate}}" class="form-control"><br>


                    <label for="description">{{trans('Insurance.note')}}</label>
                    <textarea class="form-control" name="note" id="note" rows="5">{{$Insurance->note}}</textarea>

                    <div class="form-group">
                        <label for="status">{{trans('doctor.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="{{$Insurance->status}}" selected>{{$Insurance->status == 1 ? trans('doctor.Enabled'):trans('doctors.Not_enabled')}}</option>
                            <option value="1">{{trans('doctor.Enabled')}}</option>
                            <option value="0">{{trans('doctor.Not_enabled')}}</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('doctor.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('doctor.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
