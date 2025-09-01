@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/servics/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">{{ trans('Services/Services.Title') }}</h1>
    </div>
</section>

<section>
<h2 class="text-center my-5">{{ trans('Services/Services.Section_Title') }}</h2>

    <h3 class="text-center mb-5">{{ trans('Services/Services.Intro') }}</h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Services/Services.Emergency_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Services/Services.Emergency_Description') }}</h3>


                <h2 class="h3 mb-3 text-right">{{ trans('Services/Services.Diagnosis_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Services/Services.Diagnosis_Description') }}</h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/servics/pic1.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Services/Services.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">

            <!-- العمود الأول -->

            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/servics/pic2.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Services/Services.ImageAlt') }}">
            </div>


            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Services/Services.Treatment_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Services/Services.Treatment_Description') }}</h3>


                <h2 class="h3 mb-3 text-right">{{ trans('Services/Services.Surgery_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Services/Services.Surgery_Description') }}</h3>
            </div>
        </div>
    </div>
</section>

<section>
    <h2 class="text-center my-5">{{ trans('Services/Services.AI_Title') }}</h2>

    <h3 class="text-center mb-5">{{ trans('Services/Services.AI_Intro') }}</h3>


<section class="py-5" dir="rtl">
  <div class="container">
    <div class="row text-center g-4">

      <div class="col-12 col-md-4">
        <i class="icon flaticon-magnifying-glass display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">{{ trans('Services/Services.AI_Benefit1') }}</h3>
      </div>

      <div class="col-12 col-md-4">
        <i class="icon flaticon-checked  display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">{{ trans('Services/Services.AI_Benefit2') }}</h3>
      </div>

      <div class="col-12 col-md-4">
        <i class="icon flaticon-file-2 display-3  d-block mb-2 lh-1"></i>
        <h3 class="text-center">{{ trans('Services/Services.AI_Benefit3') }}</h3>
      </div>

    </div>
  </div>
</section>

</section>

@endsection