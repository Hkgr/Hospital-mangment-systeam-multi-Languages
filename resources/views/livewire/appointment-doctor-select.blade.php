<div>
    <div class="row row-xs align-items-center mg-b-20">
        <div class="col-md-1">
            <label for="section_id">{{ trans('doctors.section') }}</label>
        </div>
        <div class="col-md-11 mg-t-5 mg-md-t-0">
            <select wire:model="section_id" name="section_id" class="form-control SlectBox">
                <option value="" selected disabled>------</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row row-xs align-items-center mg-b-20">
        <div class="col-md-1">
            <label for="doctor_id">الدكتور</label>
        </div>
        <div class="col-md-11 mg-t-5 mg-md-t-0">
            <select wire:model="doctor_id" name="doctor_id" class="form-control SlectBox">
                <option value="" selected disabled>------</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>