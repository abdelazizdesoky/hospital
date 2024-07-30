<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Insurance.add_insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Insurance.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="name">{{trans('Insurance.name')}}</label>
                    <input type="text" name="name" id="name" class="form-control"><br>

                    <label for="insurance_code">{{trans('Insurance.insurance_code')}}</label>
                    <input type="text" name="insurance_code" id="insurance_code" class="form-control"><br>

                    <label for="discount_percentage">{{trans('Insurance.discount_percentage')}}</label>
                    <input type="text" name="discount_percentage" id="discount_percentage" class="form-control"><br>

                    <label for="Company_rate">{{trans('Insurance.company_rate')}}</label>
                    <input type="text" name="company_rate" id="company_rate" class="form-control"><br>

                    <label for="note">{{trans('Insurance.note')}}</label>
                    <textarea class="form-control" name="note" id="note" rows="5"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('doctor.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Services.add_Service')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
