<!-- Modal -->
<div class="modal fade" id="add_diagnosis{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  تشخيص حالة {{ $invoice->Patient->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="diagnosis_form{{$invoice->id}}" action="{{route('Diagnostics.store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                    <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                    <input type="hidden" name="doctor_id" value="{{$invoice->doctor_id}}">
                    <input type="hidden" name="needs_review" id="needs_review{{$invoice->id}}" value="1" disabled>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">التشخيص</label>
                        <textarea class="form-control" name="diagnosis" rows="6" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">الادوية</label>
                        <textarea class="form-control" name="medicine" rows="6" required></textarea>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="review_toggle{{$invoice->id}}">
                            <label class="custom-control-label" for="review_toggle{{$invoice->id}}">تحديد مراجعة للمريض؟</label>
                        </div>
                    </div>

                    <div class="form-group" style="position:relative;">
                        <label>تاريخ المراجعة</label>
                        <input class="form-control fc-datepicker" id="review_date{{$invoice->id}}" name="review_date" type="text" disabled>
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
        var form = document.getElementById('diagnosis_form{{$invoice->id}}');
        var toggle = document.getElementById('review_toggle{{$invoice->id}}');
        var dateField = document.getElementById('review_date{{$invoice->id}}');
        var needsField = document.getElementById('needs_review{{$invoice->id}}');
        if (toggle && dateField && needsField) {
            toggle.addEventListener('change', function() {
                var checked = this.checked;
                dateField.disabled = !checked;
                dateField.required = checked;
                needsField.disabled = !checked;
                form.action = checked ?
                    "{{ route('add_review') }}" :
                    "{{ route('Diagnostics.store') }}";
            });
        }
        form.addEventListener('submit', function () {
            dateField.disabled = !toggle.checked;
            needsField.disabled = !toggle.checked;
        });
    });
</script>