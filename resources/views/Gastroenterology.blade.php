@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/deps/Gastroenterology/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">قسم الجهاز الهضمي</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">أمراض الجهاز الهضمي والكبد والمناظير</h2>
                <h3 class="mb-4 text-right">
                    تقدم وحدة أمراض الجهاز الهضمي والكبد والمناظير كافة الخدمات التشخيصية والعلاجية الخاصة بمناظير الجهاز الهضمي والقنوات المرارية. </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/Gastroenterology/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">استخراج الأجسام الغريبة من الجهاز الهضمي.</h2>
                <h3 class="mb-4 text-right">
                    يقدم المشفى خدمة استخراج الأجسام الغريبة من الجهاز الهضمي دون جراحة.
                    يتم ذلك باستخدام منظار داخلي دقيق لضمان سلامة المريض وسرعة الإجراء.
                    يشرف على العملية فريق مختص بأمراض الجهاز الهضمي والتنظير.
                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">استئصال الزوائد اللحمية والأورام بالجهاز الهضمي.</h2>
                <h3 class="mb-4 text-right">
                    يوفر المشفى خدمة استئصال الزوائد اللحمية والأورام من الجهاز الهضمي باستخدام المنظار.
                    تُجرى العملية بدقة عالية دون الحاجة لجراحة تقليدية.
                    يشرف عليها فريق مختص بأمراض الجهاز الهضمي والأورام.
                </h3>
            </div>
        </div>
    </div>
</section>

@endsection