@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/servics/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">خدماتنا الطبية</h1>
    </div>
</section>

<section>
<h2 class="text-center my-5">  الخدمات </h2>

    <h3 class="text-center mb-5">
        تقدم المستشفيات مجموعة واسعة من الخدمات الطبية للمرضى
        والتي تشمل الرعاية الطارئة، والتشخيص، والعلاج، والجراحة، بالإضافة إلى خدمات الرعاية الوقائية
    </h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">1. الرعاية الطارئة </h2>
                <h3 class="mb-4 text-right">
                    تقدم المستشفيات خدمات الطوارئ على مدار الساعة للحالات الحرجة.
                    تشمل هذه الخدمات الرعاية الفورية والتدخل الطارئة.
                </h3>


                <h2 class="h3 mb-3 text-right">2. التشخيص </h2>
                <h3 class="mb-4 text-right">
                    تشمل خدمات التشخيص توفير الرعاية عالية الجودة تشمل خدمات التشخيص المختبرات، والأشعة، وعلم الأمراض، والتصوير الطبي.
                </h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/servics/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">

            <!-- العمود الأول -->

            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/servics/pic2.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>


            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">3. العلاج </h2>
                <h3 class="mb-4 text-right">
                    توفر المستشفيات خدمات علاجية للحالات المختلفة، بما في ذلك الحالات الحرجة والحادة.
                    تشمل خدمات العلاج الرعاية الطبية، وتقديم الخدمات الصحية التخصصية، والرعاية الصحية الوقائية.
                </h3>


                <h2 class="h3 mb-3 text-right">4. الجراحة </h2>
                <h3 class="mb-4 text-right">
                    تقدم المستشفيات خدمات جراحية متنوعة، بما في ذلك الجراحة العامة، وجراحة القلب، وجراحة العظام، وجراحة الأعصاب، وغيرها. </h3>
            </div>
        </div>
    </div>
</section>

<section>
    <h2 class="text-center my-5"> الذكاء الاصطناعي </h2>

    <h3 class="text-center mb-5">
        من المعروف أن الرعاية الصحية تواجه تحديات كبيرة في تشخيص الأمراض، وتحديد العلاجات الملائمة، وتحسين عمليات الرعاية المستمرة.
        هنا يأتي دور الذكاء الاصطناعي ليقدم حلاً مبتكرًا، حيث يمكنه معالجة كميات هائلة من البيانات واستخراج الأنماط والتوجيهات الهامة التي تساعد في اتخاذ القرارات الطبية بشكل أسرع وأدق. </h3>


<section class="py-5" dir="rtl">
  <div class="container">
    <div class="row text-center g-4">

      <div class="col-12 col-md-4">
        <i class="icon flaticon-magnifying-glass display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">تحسين دقة التشخيصات</h3>
      </div>

      <div class="col-12 col-md-4">
        <i class="icon flaticon-checked  display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">تقليل الأخطاء الطبية</h3>
      </div>

      <div class="col-12 col-md-4">
        <i class="icon flaticon-file-2 display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">تحسين إدارة المعلومات الطبية</h3>
      </div>

    </div>
  </div>
</section>

</section>

@endsection