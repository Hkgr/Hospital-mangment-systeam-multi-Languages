@extends('WebSite.layouts.master')
@section('content')
<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/articals/1/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">الجلطات الدماغية</h1>
    </div>
</section>

<section>
    <h2 class="text-center my-5"> الجلطات الدماغية: أنواع، الأعراض، الأسباب، طرق العلاج والوقاية </h2>

    <h3 class="text-center mb-5">
        الجلطة الدماغية (Stroke) حالة طبية طارئة تحدث عندما يتوقف تدفق الدم إلى الدماغ،
        إما بسبب انسداد أحد الأوعية الدموية (جلطة إقفارية)،
        أو بسبب انفجار وعاء دموي (جلطة نزفية).
        كلما طال وقت انقطاع الدم، زاد الضرر في خلايا الدماغ.
    </h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h3 class="h3 mb-3 text-right">أنواع الجلطات الدماغية</h3>

                <section dir="rtl" class="container py-3 text-end text-right">
                    <ol class="mb-0">
                        <li class="mb-3">
                            <h3 class="fw-bold mb-2">
                                1. الجلطة الدماغية الإقفارية <span dir="ltr" class="fst-italic">(Ischemic Stroke)</span>:
                            </h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">الأكثر شيوعاً، تمثل حوالي 85% من الحالات.</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">تحدث بسبب انسداد شريان دماغي بجلطة دموية أو تراكمات دهنية.</h4>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-3">
                            <h3 class="fw-bold mb-2">
                              2.  الجلطة الدماغية النزفية <span dir="ltr" class="fst-italic">(Hemorrhagic Stroke)</span>:
                            </h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">تحدث عندما يتمزق أحد الأوعية الدموية داخل الدماغ.</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">غالباً بسبب ارتفاع ضغط الدم أو تمدد الأوعية الدموية.</h4>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <h3 class="fw-bold mb-2">
                              3.  النوبة الإقفارية العابرة <span dir="ltr" class="fst-italic">(TIA)</span>:
                            </h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">تُعرف أيضاً بـ"الجلطة الصغيرة".</h4>
                                </li>
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">أعراضها تشبه الجلطة الدماغية لكنها تختفي خلال دقائق أو ساعات.</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">إنذار قوي لاحتمال حدوث جلطة حقيقية لاحقاً.</h4>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </section>




            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic3.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">الأسباب وعوامل الخطر</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>ارتفاع ضغط الدم</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>مرض السكري</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>ارتفاع الكوليسترول</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>التدخين</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>السمنة</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>قلة النشاط البدني</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>أمراض القلب مثل الرجفان الأذيني</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>تناول الكحول بإفراط</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>التاريخ العائلي للإصابة بالجلطة</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <h2 class="text-center mb-4">طرق علاج الجلطة الدماغية</h2>
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">في الحالات الطارئة:</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>حقن مذيبات الجلطات خلال أول 3–4.5 ساعات (في حالة الجلطة الإقفارية).</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>القسطرة الدماغية لإزالة الجلطات.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>الجراحة لوقف النزيف أو تخفيف الضغط داخل الجمجمة (في حالات النزيف).</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">في الحالات الطارئة:</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>العلاج الطبيعي والتأهيلي لاستعادة المهارات الحركية والنطق.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>الأدوية المميعة للدم.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>السيطرة على الأمراض المزمنة كارتفاع الضغط والسكري.</span>
                        </li>
                    </ul>


                </h4>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">طرق الوقاية من الجلطات الدماغية</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>الحفاظ على ضغط دم طبيعي.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>ضبط مستوى السكر والكوليسترول.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>التوقف عن التدخين.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>ممارسة النشاط البدني بانتظام.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>تناول غذاء صحي غني بالخضار والفواكه.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>التحكم بالوزن.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>متابعة الطبيب بانتظام.</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic2.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>


@endsection