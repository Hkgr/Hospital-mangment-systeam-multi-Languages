@extends('WebSite.layouts.master')
@section('content')

<section class="hero-banner text-center text-white d-flex align-items-center"
    dir="rtl"
    style="min-height:280px;
                background:
                  linear-gradient(rgba(0, 76, 218, 1), rgba(0, 76, 218, 0.8)),
                  url('{{ asset('WebSite/images/articals/2/main.png') }}') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-6 fw-bold mb-50">النوبة القلبية الصامتة </h1>
    </div>
</section>

<section>
    <h2 class="text-center my-5">النوبة القلبية الصامتة</h2>

    <h3 class="text-center mb-5">
        تقريبا ربع النوبات القلبية هي صامتة، دون ألم في الصدر أو أعراض ملحوظة،
        هذه النوبات الصامتة تكون شائعة بين مرضى السكري
        على الرغم من أن الأعراض في بعض الأحيان قد تكون غامضة وغير واضحة،
        فإن مثل هذه النوبات القلبية التي لا تنتج عنها أعراض أو يرافقها أعراض خفيفة
        يمكن أن تكون خطيرة ومهددة للحياة مثل النوبات القلبية التي تسبب ألماً شديداً في الصدر.
    </h3>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">أعراض النوبة القلبية الصامتة </h2>
                <h3 class="mb-4 text-right">
                    على الرغم من أن النوبة القلبية الصامتة لا تسبب أي أعراض ويمكن أن تكون خطيرة وتتسبب في تلف القلب وفيما يلي بعض الأعراض التي قد تشير إلى النوبة القلبية الصامتة: </h3>
                <h3 class="mb-4 text-right">
                    <ul class="list-unstyled ps-0 vstack gap-3" dir="rtl">
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>الشعور بالتعب الشديد والإرهاق الشديد</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>صعوبة في النوم والاستيقاظ في الصباح بشعور بالتعب والإرهاق.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>اضطراب النوم، مثل الأحلام السيئة أو الفزع الليلي.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>اضطرابات الهضم، مثل الغثيان والتقيؤ والإسهال.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>الصداع الشديد والدوار.</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="flaticon-first-aid-kit display-6 text-primary opacity-75 me-3 lh-1" aria-hidden="true"></i>
                            <span>انخفاض الضغط وارتفاع معدل ضربات القلب.</span>
                        </li>
                    </ul>

                </h3>
            </div>


            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/2/pic1.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" dir="rtl">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- العمود الأول -->
            <div class="col-12 col-lg-6">
                <h2 class="h3 mb-3 text-right">علاج النوبة القلبية :</h2>
                <h3 class="mb-4 text-right">
                يتطلب العلاج  التدخل الطبي الفوري. قد يتم توصيل الأكسجين للمريض وتقديم الأدوية المناسبة لتخفيف الأعراض واستعادة التدفق الدموي الطبيعي. في حالة توقف القلب، قد يتم إجراء عملية إنعاش قلبي رئوي لاستعادة نبض القلب. بعد النوبة القلبية، يتعين على المريض إجراء تغييرات في نمط حياته واتباع نظام غذائي صحي وممارسة النشاط البدني بانتظام، بالإضافة إلى تناول الأدوية الموصوفة للحفاظ على صحة القلب.            </div>

            <!-- العمود الثاني -->
            <div class="col-12 col-lg-6">
                <img src="{{  asset('WebSite/images/articals/2/pic2.png') }}" class="img-fluid rounded mb-10" alt="صورة توضيحية">
            </div>
        </div>
    </div>
</section>

@endsection