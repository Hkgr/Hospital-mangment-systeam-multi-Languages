@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/deps/Neurology/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">قسم المخ والأعصاب</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">المخ والأعصاب</h2>
                <h3 class="mb-4 text-right">
                    يقدم قسم الأعصاب في الرعاية الطبية لمختلف الحالات العصبية مثل (جلطات ونزيف المخ - الصداع بأنواعه - رسم المخ الكهربي - رسم الأعصاب والعضلات)
                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/Neurology/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">أمراض العضلات</h2>
                <h3 class="mb-4 text-right">
                    مراض العضلات تؤدي إلى ضعف أو تصلب أو ألم في العضلات.
                    يقدم المشفى تشخيصًا دقيقًا باستخدام تخطيط العضلات وتحاليل مخبرية.
                    يُشرف على العلاج أطباء أعصاب متخصصون بخطط علاج مخصصة لكل حالة. </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">التهابات الأعصاب. </h2>
                <h3 class="mb-4 text-right">
                    تُسبب ألمًا وتنميلًا وضعفًا في العضلات.
                    يقدّم المشفى تشخيصًا دقيقًا باستخدام EMG وMRI.
                    يعالجها أطباء مختصون بأدوية وعلاج فيزيائي حسب حالة المريض.
                </h3>
            </div>
        </div>
    </div>
</section>

@endsection