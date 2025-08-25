@push('styles')
<style>
    #ui-datepicker-div {
        z-index: 100010 !important;
    }
</style>
@endpush
<!-- Modal -->
<div class="modal fade" id="xray_conversion{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="xray_exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="xray_exampleModalLabel">تحويل الي قسم الاشعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="xray_form{{$invoice->id}}" action="{{route('rays.store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                    <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                    <input type="hidden" name="doctor_id" value="{{$invoice->doctor_id}}">
                    <input type="hidden" name="needs_review" id="xray_needs_review{{$invoice->id}}" value="1" disabled>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">المطلوب</label>
                        <textarea class="form-control" name="description" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="xray_review_toggle{{$invoice->id}}">
                            <label class="custom-control-label" for="xray_review_toggle{{$invoice->id}}">تحديد مراجعة للمريض؟</label>
                        </div>
                    </div>
                    <div class="form-group" style="position:relative;">
                        <label>تاريخ المراجعة</label>
                        <input class="form-control fc-datepicker" id="xray_review_date{{$invoice->id}}" name="review_date" type="text" disabled>
                        
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('xray_form{{$invoice->id}}');
        var toggle = document.getElementById('xray_review_toggle{{$invoice->id}}');
        var dateField = document.getElementById('xray_review_date{{$invoice->id}}');
        var needsField = document.getElementById('xray_needs_review{{$invoice->id}}');
        if (toggle && dateField && needsField) {
            toggle.addEventListener('change', function() {
                var checked = this.checked;
                dateField.disabled = !checked;
                dateField.required = checked;
                needsField.disabled = !checked;
                form.action = checked ?
                    "{{ route('rays.review') }}" :
                    "{{ route('rays.store') }}";
            });
        }
        form.addEventListener('submit', function() {
            dateField.disabled = !toggle.checked;
            needsField.disabled = !toggle.checked;
        });
    });
</script>