@extends('WebSite.layouts.master')
@section('content')
<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/articals/1/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">{{ trans('Articles/Article1.Title') }}</h1>
    </div>
</section>

<section>
    <h2 class="text-center my-5">{{ trans('Articles/Article1.Headline') }}</h2>

    <h3 class="text-center mb-5">{{ trans('Articles/Article1.Intro') }}</h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h3 class="h3 mb-3 text-right">{{ trans('Articles/Article1.TypesTitle') }}</h3>

                <section dir="rtl" class="container py-3 text-end text-right">
                    <ol class="mb-0">
                        <li class="mb-3">
                            <h3 class="fw-bold mb-2">{!! trans('Articles/Article1.Type1Title') !!}</h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type1Item1') }}</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type1Item2') }}</h4>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-3">
                            <h3 class="fw-bold mb-2">{!! trans('Articles/Article1.Type2Title') !!}</h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type2Item1') }}</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type2Item2') }}</h4>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <h3 class="fw-bold mb-2">{!! trans('Articles/Article1.Type3Title') !!}</h3>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type3Item1') }}</h4>
                                </li>
                                <li class="mb-1">
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type3Item2') }}</h4>
                                </li>
                                <li>
                                    <h4 class="m-0 fw-normal">{{ trans('Articles/Article1.Type3Item3') }}</h4>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </section>




            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic3.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Articles/Article1.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article1.RiskTitle') }}</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskHighBP') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskDiabetes') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskHighCholesterol') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskSmoking') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskObesity') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskInactivity') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskHeartDisease') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskAlcohol') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RiskFamily') }}</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic1.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Articles/Article1.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <h2 class="text-center mb-4">{{ trans('Articles/Article1.TreatmentTitle') }}</h2>
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article1.EmergencyTitle') }}</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.TreatmentEmergencyItem1') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.TreatmentEmergencyItem2') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.TreatmentEmergencyItem3') }}</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article1.EmergencyTitle') }}</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RecoveryItem1') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RecoveryItem2') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-tick-inside-circle fs-4 text-primary opacity-75 me-4 mt-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.RecoveryItem3') }}</span>
                        </li>
                    </ul>


                </h4>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">{{ trans('Articles/Article1.PreventionTitle') }}</h2>
                <h4 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem1') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem2') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem3') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem4') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem5') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem6') }}</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-brain display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>{{ trans('Articles/Article1.PreventionItem7') }}</span>
                        </li>
                    </ul>


                </h4>
            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/1/pic2.png') }}" class="img-fluid rounded mb-10" alt="{{ trans('Articles/Article1.ImageAlt') }}">
            </div>
        </div>
    </div>
</section>


@endsection