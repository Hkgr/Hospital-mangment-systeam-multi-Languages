@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/deps/eye/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">قسم العناية بالعيون</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">طب وجراحة العيون</h2>
                <h3 class="mb-4 text-right">
                    يتوفر في هذا القسم أجهزة حديثة لتشخيص وعلاج الحالات دوائيًا وجراحيًا إذا لزم الأمر، حيث تتوفر أجهزة طبية متطورة لإجراء عمليات المياه البيضاء، المياه الزرقاء، الحول، تعديل الجفون، فتح القنوات الدمعية وغيرها من العمليات الكبرى والصغرى.
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/eye/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">العمليات المتقدمة في العيون:</h2>
                <h3 class="mb-4 text-right">
                يُجري المشفى عمليات دقيقة مثل المياه البيضاء والزرقاء، الحول، تعديل الجفون وفتح القنوات الدمعية باستخدام تقنيات حديثة مثل جهاز الفاكو.                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">فحوصات وتشخيصات متطورة:</h2>
                <h3 class="mb-4 text-right">
                يوفر قسم العيادات الخارجية أجهزة مثل السلت لامب، مقياس العدسة، وفحص قاع العين، إضافة إلى عيادات متخصصة لأمراض الجفون، الشبكية، القرنية وحول الأطفال.            </div>
        </div>
    </div>
</section>

@endsection