<div class="modal fade" id="ambulanceRequestModal" tabindex="-1" role="dialog" aria-labelledby="ambulanceRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ambulanceRequestModalLabel">اطلب اسعاف الطوارئ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="ambulance-call-form" method="POST" action="{{ route('ambulance.call.store') }}">
                @csrf
                <input type="hidden" name="call_time" value="{{ now() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ambulance-phone">رقم الهاتف</label>
                        <input type="tel" class="form-control" id="ambulance-phone" name="phone" required inputmode="numeric" pattern="[0-9]*" autocomplete="tel" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                    </div>
                    <div class="form-group">
                        <label for="ambulance-details">تفاصيل الحالة</label>
                        <textarea class="form-control" id="ambulance-details" name="details" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ambulance-address">العنوان</label>
                        <textarea class="form-control" id="ambulance-address" name="address" rows="2" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            alert("{{ session('success') }}");
            document.getElementById('ambulance-call-form').reset();
        });
    </script>
@endif
