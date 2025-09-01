@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/articals/2/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">{{ trans('Articles/Article2.Title') }}</h1>
    </div>
</section>

<section>
    <h2 class="text-center my-5">{{ trans('Articles/Article2.Headline') }}</h2>

    <h3 class="text-center mb-5">{{ trans('Articles/Article2.Intro') }}</h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article2.SymptomsTitle') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Articles/Article2.SymptomsIntro') }}</h3>
                <h3 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom1') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom2') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom3') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom4') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom5') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article2.Symptom6') }}</span>
                        </li>
                    </ul>

                </h3>
            </div>


            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/2/pic1.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Articles/Article2.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article2.TreatmentTitle') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Articles/Article2.TreatmentIntro') }}</h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/2/pic2.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Articles/Article2.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>

@endsection