@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center" dir="rtl"
    style="min-height:280px;
      background:
        linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
        url('{{ asset('WebSite/images/background/5.jpg') }}') center/cover no-repeat;">
  <div class="container">
    <h1 class="display-6 fw-bold mb-50">تواصل معنا</h1>
  </div>
</section>

<section class="py-5 bg-light" dir="rtl" style="text-align: right;">
  <div class="container">
    <h2 class="h4 mb-4">يسعدنا تواصلكم</h2>
    <p class="mb-4">نرحّب باستفساراتكم وملاحظاتكم واقتراحاتكم. تواصلوا معنا عبر القنوات التالية وسنردّ عليكم بأقرب وقت ممكن.</p>

    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="p-3 bg-white h-100 shadow-sm rounded">
          <h3 class="h6">البريد الإلكتروني</h3>
          <p class="mb-1"><a href="mailto:info@moh.gov.sy">info@moh.gov.sy</a></p>
          <small class="text-muted">للاستفسارات العامة والدعم.</small>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="p-3 bg-white h-100 shadow-sm rounded">
          <h3 class="h6">الهاتف</h3>
          <p class="mb-1"><a href="tel:00905528779087">00905528779087</a></p>
          <small class="text-muted">الأحد - الخميس: 8:30 ص - 6:00 م</small>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="p-3 bg-white h-100 shadow-sm rounded">
          <h3 class="h6">العنوان</h3>
          <p class="mb-1">سوريا، حلب</p>
          <small class="text-muted">يرجى تحديد موعد مسبق للزيارة.</small>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <h3 class="h5 mb-3">ملاحظات</h3>
      <ul>
        <li>في الحالات الطارئة يرجى الاتصال بالإسعاف مباشرة.</li>
        <li>لحجز موعد طبي، استخدم صفحة الخدمات أو اتصل بنا.</li>
      </ul>
    </div>
  </div>
</section>

@endsection
