@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/deps/Neurology/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">{{ trans('Departments/Neurology.Title') }}</h1>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Departments/Neurology.Section1_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Departments/Neurology.Section1_Description') }}</h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/deps/Neurology/pic1.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Departments/Neurology.Section1_ImageAlt') }}">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Departments/Neurology.Section2_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Departments/Neurology.Section2_Description') }}</h3>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Departments/Neurology.Section3_Title') }}</h2>
                <h3 class="mb-4 text-right">{{ trans('Departments/Neurology.Section3_Description') }}</h3>
            </div>
        </div>
    </div>
</section>

@endsection