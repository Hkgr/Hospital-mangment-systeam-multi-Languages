<div>
    @if($message === true)
    <script>
        alert('تم ارسال تفاصيل الحجز الي المستشفيي')
        location.reload()
    </script>
    @endif
    <form wire:submit.prevent="store">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label>المريض</label>
                <select wire:model="patient_id" class="form-select">
                    <option value="">مريض جديد</option>
                    @foreach($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>

            @if(!$patient_id)
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" wire:model="name" placeholder="اسمك"> <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="البريد الالكتروني">
                <span class="icon fa fa-envelope"></span>
            </div>
            @endif


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">الدكتور</label>
                <select name="doctor" wire:model="doctor" class="form-select" id="exampleFormControlSelect1">
                    @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">القسم</label>
                <select class="form-select" name="section" wire:model="section" id="exampleFormControlSelect1">
                    <option>-- اختار من القائمة --</option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach

                </select>
            </div>
            @if(!$patient_id)
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="رقم الهاتف">
                <span class="icon fas fa-phone"></span>
            </div>
            @endif

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="ملاحظات"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">تاكيد</span></button>
            </div>
        </div>
    </form>
</div>