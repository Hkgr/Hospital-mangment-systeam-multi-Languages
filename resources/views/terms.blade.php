@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center" dir="rtl"
    style="min-height:280px;
      background:
        linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
        url('{{ asset('WebSite/images/background/5.jpg') }}') center/cover no-repeat;">
  <div class="container">
    <h1 class="display-6 fw-bold mb-50">الشروط والأحكام</h1>
  </div>
</section>

<section class="py-5 bg-light" dir="rtl" style="text-align: right;">
  <div class="container">
    <h2 class="h4 mb-4">قبول الشروط</h2>
    <p class="mb-4">باستخدامك لهذا الموقع فإنك توافق على هذه الشروط والأحكام وسياسة الخصوصية. يرجى قراءتها بعناية قبل الاستخدام.</p>

    <h3 class="h5 mt-4">الخدمات</h3>
    <p>يقدم الموقع معلومات وخدمات طبية عامة وحجوزات وفق التوافر. قد نُجري تحديثات على الخدمات أو نوقف بعضها دون إشعار مسبق.</p>

    <h3 class="h5 mt-4">حساب المستخدم</h3>
    <p>إنشاء الحساب واستخدامه مسؤوليتك. يجب الحفاظ على سرية بيانات الدخول وإبلاغنا عند الاشتباه بأي استخدام غير مصرح.</p>

    <h3 class="h5 mt-4">المحتوى</h3>
    <p>المحتوى لأغراض معلوماتية ولا يُعد بديلاً عن الاستشارة الطبية المتخصصة. يرجى مراجعة الأطباء المختصين قبل اتخاذ أي قرار صحي.</p>

    <h3 class="h5 mt-4">القيود والمسؤولية</h3>
    <p>لا نتحمل مسؤولية أي أضرار مباشرة أو غير مباشرة ناتجة عن استخدام الموقع أو الاعتماد على محتواه إلى الحد الذي يسمح به القانون.</p>

    <h3 class="h5 mt-4">التعديلات</h3>
    <p>قد نحدّث هذه الشروط من وقت لآخر. استمرارك باستخدام الموقع بعد النشر يُعد قبولاً للتعديلات.</p>

    <h3 class="h5 mt-4">القانون والاختصاص</h3>
    <p>تخضع هذه الشروط لقوانين الولاية القضائية المعمول بها ويُختص بالفصل في أي نزاع المحاكم المختصة.</p>

    <h3 class="h5 mt-4">التواصل</h3>
    <p>للاستفسارات حول هذه الشروط، راسلنا: <a href="mailto:info@moh.gov.sy">info@moh.gov.sy</a> أو اتصل: <a href="tel:00905528779087">00905528779087</a>.</p>

    <p class="text-muted mt-4">تاريخ آخر تحديث: {{ date('Y-m-d') }}</p>
  </div>
</section>

@endsection
