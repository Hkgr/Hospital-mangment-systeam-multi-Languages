<!-- Modal -->
<div class="modal fade" id="laboratorie_conversion{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="lab_exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="lab_exampleModalLabel">تحويل الي قسم المختبر</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="lab_form{{$invoice->id}}" action="{{route('Laboratories.store')}}" method="POST">
                                @csrf
                <div class="modal-body">

                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                    <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                    <input type="hidden" name="doctor_id" value="{{$invoice->doctor_id}}">
                    <input type="hidden" name="needs_review" id="lab_needs_review{{$invoice->id}}" value="1" disabled>
                                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">المطلوب</label>
                        <textarea class="form-control" name="description" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="lab_review_toggle{{$invoice->id}}">
                        <label class="custom-control-label" for="lab_review_toggle{{$invoice->id}}">تحديد مراجعة للمريض؟</label>
                        </div>
                    </div>
                    <div class="form-group" style="position:relative;">
                        <label>تاريخ المراجعة</label>
                        <input class="form-control fc-datepicker" id="lab_review_date{{$invoice->id}}" name="review_date" type="text" disabled>
                                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                </div>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var form = document.getElementById('lab_form{{$invoice->id}}');
                    var toggle = document.getElementById('lab_review_toggle{{$invoice->id}}');
                    var dateField = document.getElementById('lab_review_date{{$invoice->id}}');
                    var needsField = document.getElementById('lab_needs_review{{$invoice->id}}');
                    if (toggle && dateField && needsField) {
                        toggle.addEventListener('change', function() {
                            var checked = this.checked;
                            dateField.disabled = !checked;
                            dateField.required = checked;
                            needsField.disabled = !checked;
                            form.action = checked ?
                                "{{ route('Laboratories.review') }}" :
                                "{{ route('Laboratories.store') }}";
                        });
                    }
                    form.addEventListener('submit', function () {
                        dateField.disabled = !toggle.checked;
                        needsField.disabled = !toggle.checked;
                    });
                });
            </script>
        </div>
    </div>
</div>
