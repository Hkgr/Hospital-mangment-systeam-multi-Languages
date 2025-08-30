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
                <input type="text" name="username" wire:model="name" placeholder="اسمك"> <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="البريد الالكتروني">
                <span class="icon fa fa-envelope"></span>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <select wire:model="gender" class="form-select">
                    <option value="">الجنس</option>
                    <option value="ذكر">ذكر</option>
                    <option value="أنثى">أنثى</option>
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <select wire:model="blood_group" class="form-select">
                    <option value="">فصيلة الدم</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <input type="text" name="address" wire:model="address" placeholder="العنوان">
                <span class="icon fa fa-map-marker"></span>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="doctorSelect">الدكتور</label>
                <select name="doctor" wire:model="doctor" class="form-select" id="doctorSelect" wire:key="doctor-select">
                    <option value="">-- اختار طبيب  --</option>
                    @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="sectionSelect">القسم</label>
                <select class="form-select" name="section" wire:model="section_id" wire:change="loadDoctors($event.target.value)" id="sectionSelect" wire:key="section-select">
                    <option value="">-- اختار القسم  --</option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="date" name="date_birth" wire:model="date_birth" placeholder="تاريخ الميلاد">
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="رقم الهاتف">
                <span class="icon fas fa-phone"></span>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="ملاحظات"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">طلب موعد</span></button>
            </div>
        </div>
    </form>
</div>
