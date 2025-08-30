<div>
    @if($message === true)
    <script>
        alert('طھظ… ط§ط±ط³ط§ظ„ طھظپط§طµظٹظ„ ط§ظ„ط­ط¬ط² ط§ظ„ظٹ ط§ظ„ظ…ط³طھط´ظپظٹظٹ')
        location.reload()
    </script>
    @endif
    <form wire:submit.prevent="store">
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" wire:model="name" placeholder="ط§ط³ظ…ظƒ"> <span class="icon fa fa-user"></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="ط§ظ„ط¨ط±ظٹط¯ ط§ظ„ط§ظ„ظƒطھط±ظˆظ†ظٹ">
                <span class="icon fa fa-envelope"></span>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <select wire:model="gender" class="form-select">
                    <option value="">ط§ظ„ط¬ظ†ط³</option>
                    <option value="ط°ظƒط±">ط°ظƒط±</option>
                    <option value="ط£ظ†ط«ظ‰">ط£ظ†ط«ظ‰</option>
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <select wire:model="blood_group" class="form-select">
                    <option value="">ظپطµظٹظ„ط© ط§ظ„ط¯ظ…</option>
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
                <input type="text" name="address" wire:model="address" placeholder="ط§ظ„ط¹ظ†ظˆط§ظ†">
                <span class="icon fa fa-map-marker"></span>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="sectionSelect">�?�?�?�?�?</label>
                <select class="form-select" name="section" wire:model="section" id="sectionSelect">
                    <option value="">-- �?�?�?�?�? �?�? �?�?�?�?�?�?�? --</option>
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="doctorSelect">�?�?�?�?�?�?�?</label>
                <select name="doctor" wire:model="doctor" class="form-select" id="doctorSelect" @if($doctors->isEmpty()) disabled @endif>
                    <option value="">-- �?�?�?�?�? �?�?�?�?�?�?�? --</option>
                    @foreach($doctors as $doc)
                        <option value="{{$doc->id}}">{{$doc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="date" name="date_birth" wire:model="date_birth" placeholder="طھط§ط±ظٹط® ط§ظ„ظ…ظٹظ„ط§ط¯">
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="ط±ظ‚ظ… ط§ظ„ظ‡ط§طھظپ">
                <span class="icon fas fa-phone"></span>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="ظ…ظ„ط§ط­ط¸ط§طھ"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">طھط§ظƒظٹط¯</span></button>
            </div>
        </div>
    </form>
</div>
