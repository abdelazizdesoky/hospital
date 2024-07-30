
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{trans('invoice.single')}} </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
                                <p class="tx-12 tx-gray-500 mb-2">{{trans('invoice.single')}} <a href=""></a></p>

                                <button class="btn btn-success" wire:click="show_form_add">{{trans('invoice.add')}}</button>
                            </div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans('invoice.Service')}}</th>
                                                <th>{{trans('patient.name')}}</th>
                                                <th>{{trans('invoice.invoice_date')}}</th>
                                                <th>{{trans('doctor.name')}}</th>
                                                <th>{{trans('section_tran.name')}}</th>
                                                <th>{{trans('invoice.price')}} </th>
                                                <th>{{trans('invoice.discount_value')}} </th>
                                                <th>{{trans('service.tax_rate')}} </th>
                                                <th>{{trans('invoice.tax_value')}} </th>
                                                <th>{{trans('invoice.total_with_tax')}} </th>
                                                <th>{{trans('invoice.type')}} </th>
                                                <th>{{trans('doctor.Processes')}}</th>
                                            </tr>
										</thead>
										<tbody>
                                            @foreach ($single_invoices as $single_invoice)
											<tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $single_invoice->Service->name }}</td>
                                                    <td>{{ $single_invoice->Patient->name }}</td>
                                                    <td>{{ $single_invoice->invoice_date }}</td>
                                                    <td>{{ $single_invoice->Doctor->name }}</td>
                                                    <td>{{ $single_invoice->Section->name }}</td>
                                                    <td>{{ number_format($single_invoice->price, 2) }}</td>
                                                    <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                                                    <td>{{ $single_invoice->tax_rate }}%</td>
                                                    <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                                                    <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                                                    <td>{{ $single_invoice->type == 1 ? 'نقدي':'اجل' }}</td>
                                                    <td>
                                                    <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $single_invoice->id }})" ><i class="fa fa-trash"></i></button>
                                                    <button wire:click="print({{ $single_invoice->id }})" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i></button>
                                                    </td>
											</tr>
											@endforeach
										</tbody>
									</table>
                                    @include('livewire.single_invoices.delete')
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
    <!-- main-content closed -->
