<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{trans('Dashboard/section_tran.add')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <form action="{{route('sections.store')}}" method="post">
       @csrf
       <div class="modal-body">
<label >{{trans('Dashboard/section_tran.section')}}</label>
<input type="text" name="name" class="form-control">

    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/section_tran.close')}}</button>
        <button type="submit" class="btn btn-primary">{{trans('Dashboard/section_tran.save')}} </button>
      </div>
       </form>
    </div>
  </div>
</div>
