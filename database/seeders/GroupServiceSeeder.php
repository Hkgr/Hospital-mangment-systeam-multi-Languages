<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupServiceSeeder extends Seeder
{
    public function run()
    {
        $bundles = [
            ['ar' => 'حزمة فحوصات شاملة', 'en' => 'Comprehensive Checkup', 'note' => 'باقة فحوصات أساسية دورية للكشف المبكر.'],
            ['ar' => 'حزمة القلب', 'en' => 'Cardiac Package', 'note' => 'تقييم عوامل خطورة القلب ووظائفه.'],
            ['ar' => 'حزمة السكري', 'en' => 'Diabetes Package', 'note' => 'متابعة سكر الدم والمضاعفات المرتبطة.'],
            ['ar' => 'حزمة كبد وكلى', 'en' => 'Liver & Kidney Package', 'note' => 'تقييم شامل لوظائف الكبد والكلية.'],
            ['ar' => 'حزمة الغدة الدرقية', 'en' => 'Thyroid Package', 'note' => 'اختبارات تقييم نشاط الغدة الدرقية.'],
            ['ar' => 'حزمة الجهاز الهضمي', 'en' => 'Gastro Package', 'note' => 'تحاليل وتصوير أولي للجهاز الهضمي.'],
            ['ar' => 'حزمة النساء والولادة', 'en' => 'OB/GYN Package', 'note' => 'متابعة نسائية أساسية مع تصوير.'],
            ['ar' => 'حزمة الأطفال', 'en' => 'Pediatrics Package', 'note' => 'فحوصات عامة للأطفال مع لقاحات مختارة.'],
            ['ar' => 'حزمة الأسنان', 'en' => 'Dental Package', 'note' => 'تنظيف وفحص شامل للأسنان واللثة.'],
            ['ar' => 'حزمة العيون', 'en' => 'Ophthalmology Package', 'note' => 'تقييم النظر وقاع العين الأساسي.'],
            ['ar' => 'حزمة العظام', 'en' => 'Orthopedic Package', 'note' => 'تقييم آلام المفاصل مع تصوير بسيط.'],
            ['ar' => 'حزمة الجلدية', 'en' => 'Dermatology Package', 'note' => 'استشارة جلدية وفحوصات تحسّس أساسية.'],
            ['ar' => 'حزمة الصدر والتنفس', 'en' => 'Chest & Respiratory Package', 'note' => 'فحوصات تقييم الرئة والصدر.'],
            ['ar' => 'حزمة ما قبل الجراحة', 'en' => 'Pre‑operative Package', 'note' => 'فحوصات أساسية قبل العمليات الجراحية.'],
            ['ar' => 'حزمة ما بعد الجراحة', 'en' => 'Post‑operative Package', 'note' => 'متابعة وتعويضات بعد العمليات.'],
            ['ar' => 'حزمة ما قبل الزواج', 'en' => 'Premarital Package', 'note' => 'تحاليل واستقصاءات استشارية قبل الزواج.'],
            ['ar' => 'حزمة الحمل الأساسية', 'en' => 'Basic Pregnancy Package', 'note' => 'متابعة أولية للحمل مع تصوير.'],
            ['ar' => 'حزمة السمنة والتغذية', 'en' => 'Obesity & Nutrition Package', 'note' => 'تقييم تغذوي وخطة متابعة للوزن.'],
            ['ar' => 'حزمة العصبية', 'en' => 'Neurology Package', 'note' => 'تقييم أولي للجهاز العصبي.'],
            ['ar' => 'حزمة السرطان الوقائية', 'en' => 'Cancer Screening Package', 'note' => 'تحرٍ مبكر لأهم السرطانات الشائعة.'],
        ];

        $allServiceIds = Service::pluck('id')->all();
        if (count($allServiceIds) === 0) {
            return; // ensure services exist
        }

        foreach ($bundles as $bundle) {
            // pick 4–7 random services with random quantities (1–2)
            $count = random_int(4, 7);
            shuffle($allServiceIds);
            $serviceIds = array_slice($allServiceIds, 0, min($count, count($allServiceIds)));

            $items = [];
            $totalBefore = 0.0;
            foreach ($serviceIds as $sid) {
                $qty = random_int(1, 2);
                $price = (float) Service::find($sid)->price;
                $totalBefore += ($price * $qty);
                $items[] = ['Service_id' => $sid, 'quantity' => $qty];
            }

            $discount = round($totalBefore * (random_int(0, 20) / 100), 2);
            $afterDiscount = max($totalBefore - $discount, 0);
            $taxRate = random_int(0, 10); // 0–10%
            $taxValue = round($afterDiscount * ($taxRate / 100), 2);
            $totalWithTax = round($afterDiscount + $taxValue, 2);

            $group = new Group();
            $group->Total_before_discount = $totalBefore;
            $group->discount_value = $discount;
            $group->Total_after_discount = $afterDiscount;
            $group->tax_rate = (string)$taxRate;
            $group->Total_with_tax = $totalWithTax;
            $group->save();

            // translations
            $group->translateOrNew('ar')->name = $bundle['ar'];
            $group->translateOrNew('ar')->notes = $bundle['note'];
            $group->translateOrNew('en')->name = $bundle['en'];
            $group->translateOrNew('en')->notes = $bundle['note'];
            $group->save();

            // pivot insert (respect actual table name Service_Group)
            foreach ($items as $it) {
                DB::table('Service_Group')->insert([
                    'Group_id' => $group->id,
                    'Service_id' => $it['Service_id'],
                    'quantity' => $it['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

