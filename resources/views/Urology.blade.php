@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
           background-image: linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)), url("{{ asset('WebSite/images/deps/Urology/main.png') }}");
           background-position: center;
           background-size: cover;
           background-repeat: no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">قسم المسالك البولية</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">المسالك البولية</h2>
                <h3 class="mb-4 text-right">
                    يقدم قسم المسالك البولية بالمستشفى العديد من الخدمات منها: (وحدة مناظير المسالك البولية، جراحة الكلى ومناظير البطن - وحدة الأورام - وحدة جراحات النساء البولية) </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/Urology/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">استخراج حصوات الكلى، الحالب والمثانة بالموجات الصوتية والليزر.</h2>
                <h3 class="mb-4 text-right">
                    نقدّم في المشفى خدمة إزالة حصوات الكلى والحالب والمثانة بدون جراحة.
                    تُستخدم تقنيات حديثة مثل الموجات الصوتية والليزر لتفتيت الحصوات بدقة وأمان.
                    يُشرف على الإجراء فريق متخصص في جراحة المسالك البولية لضمان أفضل النتائج
                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">استئصال الكلى والمثانة والغدة الكظرية والبروستاتا بالمنظار الجراحي.</h2>
                <h3 class="mb-4 text-right">
                    يقدم المشفى خدمة استئصال الكلى والمثانة والغدة الكظرية والبروستاتا باستخدام المنظار الجراحي.
                    يُعد المنظار تقنية دقيقة وآمنة تُقلل الألم وتُسرّع التعافي.
                    يُجري العمليات فريق متخصص في الجراحة البولية وبأحدث الأجهزة.
                </h3>
            </div>
        </div>
    </div>
</section>

@endsection
