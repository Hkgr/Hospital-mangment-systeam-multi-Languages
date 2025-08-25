<!-- Delete Invoice -->
<div class="modal fade" id="delete{{$invoice->id}}" tabindex="-1" aria-labelledby="deleteInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInvoiceLabel">حذف فاتورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <p class="h5 text-danger"> هل انت متاكد من حذف فاتورة الخدمة ؟ </p>
                    <input type="text" class="form-control" readonly value="{{ $invoice->Service->name ?? $invoice->Group->name }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('insurance.close') }}</button>
                        <button class="btn btn-success">{{ trans('insurance.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>