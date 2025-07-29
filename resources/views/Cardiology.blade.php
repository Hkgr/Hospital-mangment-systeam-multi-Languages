@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/deps/Cardiology/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">قسم أمراض القلب</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">أمراض القلب والقسطرة</h2>
                <h3 class="mb-4 text-right">
                    يوفر المستشفى أحدث الأجهزة التشخيصية والعلاجية لمرضى القلب بداية من العيادات الخارجية للفحص والتشخيص ووحدة القسطرة القلبية التشخيصية والعلاجية.
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/Cardiology/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">تشخيص وتوسيع الشرايين وتركيب الدعامات:</h2>
                <h3 class="mb-4 text-right">
                    يوفر المشفى خدمات دقيقة لتشخيص انسداد الشرايين وتوسيعها باستخدام القسطرة، مع تركيب دعامات لتحسين تدفق الدم.
                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">علاج اضطرابات كهربية القلب:</h2>
                <h3 class="mb-4 text-right">
                    يتم علاج اضطرابات نبض القلب من خلال منظمات القلب (Pacemakers) تحت إشراف أطباء قلب متخصصين وبأحدث التقنيات </h3>
            </div>
        </div>
    </div>
</section>

@endsection