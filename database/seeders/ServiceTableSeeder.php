<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['ar' => 'استشارة عامة', 'en' => 'General Consultation', 'price' => 50, 'note' => 'زيارة تقييم أولي مع طبيب عام وتشخيص مبدئي وخطة علاج.'],
            ['ar' => 'زيارة قسم الإسعاف', 'en' => 'Emergency Room Visit', 'price' => 80, 'note' => 'تقييم وعلاج الحالات الإسعافية غير المجدولة.'],
            ['ar' => 'استشارة أطفال', 'en' => 'Pediatric Consultation', 'price' => 60, 'note' => 'فحص وتشخيص للأطفال مع متابعة نمو وتطعيمات.'],
            ['ar' => 'زيارة نسائية وتوليد', 'en' => 'Obstetrics & Gynecology Visit', 'price' => 70, 'note' => 'متابعة الحمل ومشاكل النسائية والفحوصات الدورية.'],
            ['ar' => 'استشارة عظمية', 'en' => 'Orthopedic Consultation', 'price' => 70, 'note' => 'تشخيص أمراض وإصابات الجهاز الحركي والعظام.'],
            ['ar' => 'استشارة قلبية', 'en' => 'Cardiology Consultation', 'price' => 80, 'note' => 'تقييم أمراض القلب وضبط عوامل الخطورة.'],
            ['ar' => 'استشارة عصبية', 'en' => 'Neurology Consultation', 'price' => 90, 'note' => 'تقييم أمراض الجهاز العصبي والصداع والصرع.'],
            ['ar' => 'استشارة جلدية', 'en' => 'Dermatology Consultation', 'price' => 60, 'note' => 'فحص الجلد والشعر والأظافر ووضع خطة العلاج.'],
            ['ar' => 'استشارة أنف وأذن وحنجرة', 'en' => 'ENT Consultation', 'price' => 60, 'note' => 'تقييم التهابات وأمراض الأذن والأنف والحنجرة.'],
            ['ar' => 'استشارة عينية', 'en' => 'Ophthalmology Consultation', 'price' => 60, 'note' => 'فحص بصري شامل وتشخيص أمراض العين.'],
            ['ar' => 'فحص أسنان', 'en' => 'Dental Checkup', 'price' => 40, 'note' => 'تنظيف وفحص الأسنان وتقييم اللثة.'],
            ['ar' => 'جلسة علاج فيزيائي', 'en' => 'Physiotherapy Session', 'price' => 45, 'note' => 'جلسة علاج تأهيلي لتحسين الحركة وتخفيف الألم.'],
            ['ar' => 'تحليل تعداد دم كامل (CBC)', 'en' => 'Complete Blood Count (CBC)', 'price' => 20, 'note' => 'تحليل يقيّم خلايا الدم لكشف الالتهابات وفقر الدم.'],
            ['ar' => 'تحليل سكر الدم', 'en' => 'Blood Glucose Test', 'price' => 15, 'note' => 'قياس سكر الدم للصيام أو العشوائي.'],
            ['ar' => 'تحليل دهون الدم (Lipid Profile)', 'en' => 'Lipid Profile', 'price' => 35, 'note' => 'قياس الكوليسترول والبروتينات الشحمية وتقييم خطر القلب.'],
            ['ar' => 'وظائف الكبد', 'en' => 'Liver Function Test', 'price' => 30, 'note' => 'إنزيمات الكبد والبيليروبين لتقييم سلامة الكبد.'],
            ['ar' => 'وظائف الكلية', 'en' => 'Kidney Function Test', 'price' => 30, 'note' => 'قياس الكرياتينين واليوريا لتقييم عمل الكلى.'],
            ['ar' => 'تحليل وظائف الغدة الدرقية (TSH)', 'en' => 'Thyroid Function Test (TSH)', 'price' => 35, 'note' => 'تقييم اضطرابات الدرق باستخدام TSH وربما T3/T4.'],
            ['ar' => 'تحليل بول', 'en' => 'Urinalysis', 'price' => 10, 'note' => 'فحص التهابات المسالك ومؤشرات الاستقلاب.'],
            ['ar' => 'تحليل براز', 'en' => 'Stool Analysis', 'price' => 10, 'note' => 'كشف الطفيليات والدم الخفي والالتهابات.'],
            ['ar' => 'فحص PCR كوفيد‑19', 'en' => 'COVID‑19 PCR', 'price' => 50, 'note' => 'كشف المادة الوراثية لفيروس كورونا بدقة عالية.'],
            ['ar' => 'صورة أشعة للصدر', 'en' => 'Chest X‑ray', 'price' => 25, 'note' => 'تشخيص الالتهابات والكسور وأمراض الرئة.'],
            ['ar' => 'إيكو البطن', 'en' => 'Abdominal Ultrasound', 'price' => 40, 'note' => 'تصوير الكبد والمرارة والطحال والكلى بالأمواج فوق الصوتية.'],
            ['ar' => 'إيكو الحوض', 'en' => 'Pelvic Ultrasound', 'price' => 40, 'note' => 'تقييم الأعضاء الحوضية عند النساء والرجال.'],
            ['ar' => 'إيكو قلب', 'en' => 'Echocardiography', 'price' => 90, 'note' => 'تقييم بنية القلب ووظيفته بالصدى.'],
            ['ar' => 'تخطيط قلب (ECG)', 'en' => 'Electrocardiogram (ECG)', 'price' => 25, 'note' => 'تسجيل النشاط الكهربائي للقلب لاكتشاف الاضطرابات.'],
            ['ar' => 'جهاز هولتر 24 ساعة', 'en' => '24‑Hour Holter Monitoring', 'price' => 120, 'note' => 'مراقبة نظم القلب على مدار اليوم.'],
            ['ar' => 'تخطيط دماغ (EEG)', 'en' => 'Electroencephalogram (EEG)', 'price' => 80, 'note' => 'تقييم النشاط الكهربائي للدماغ وحالات الاختلاجات.'],
            ['ar' => 'طبقي محوري للدماغ', 'en' => 'CT Scan – Head', 'price' => 150, 'note' => 'تصوير مقطعي لتقييم النزوف والاحتشاءات.'],
            ['ar' => 'رنين مغناطيسي للدماغ', 'en' => 'MRI – Brain', 'price' => 300, 'note' => 'تصوير عالي الدقة لبنى الدماغ دون أشعة مؤينة.'],
            ['ar' => 'طبقي محوري للبطن/الحوض', 'en' => 'CT Scan – Abdomen/Pelvis', 'price' => 220, 'note' => 'تشخيص الأورام والالتهابات في البطن والحوض.'],
            ['ar' => 'رنين مغناطيسي للعمود الفقري', 'en' => 'MRI – Spine', 'price' => 320, 'note' => 'تقييم الديسك والقناة الفقرية والضغط العصبي.'],
            ['ar' => 'تصوير الثدي الشعاعي (ماموغرام)', 'en' => 'Mammography', 'price' => 100, 'note' => 'تحري مبكر لسرطان الثدي للسيدات.'],
            ['ar' => 'مسحة عنق الرحم', 'en' => 'Pap Smear', 'price' => 35, 'note' => 'كشف التبدلات الخلوية بعنق الرحم مبكرًا.'],
            ['ar' => 'لقاح الإنفلونزا', 'en' => 'Influenza Vaccination', 'price' => 20, 'note' => 'جرعة لقاح موسمية للوقاية من الإنفلونزا.'],
            ['ar' => 'تبديل ضماد', 'en' => 'Wound Dressing', 'price' => 15, 'note' => 'تنظيف وتغيير الضماد مع تقييم الجرح.'],
            ['ar' => 'تفجير خراج (عملية صغرى)', 'en' => 'Abscess Drainage (Minor Surgery)', 'price' => 120, 'note' => 'تفريغ الخراج تحت التعقيم وتضميد الجرح.'],
            ['ar' => 'تنظير هضمي علوي', 'en' => 'Upper GI Endoscopy', 'price' => 200, 'note' => 'فحص المريء والمعدة والاثني عشري بالمنظار.'],
            ['ar' => 'تنظير قولون', 'en' => 'Colonoscopy', 'price' => 220, 'note' => 'فحص القولون لاكتشاف الأورام والقرحات.'],
            ['ar' => 'جلسة غسيل كلوي', 'en' => 'Hemodialysis Session', 'price' => 180, 'note' => 'تنقية الدم من السموم والسوائل الزائدة.'],
            ['ar' => 'ولادة طبيعية', 'en' => 'Normal Vaginal Delivery', 'price' => 500, 'note' => 'إجراء الولادة المهبلية ورعاية المولود والأم.'],
            ['ar' => 'عملية قيصرية', 'en' => 'Caesarean Section', 'price' => 1000, 'note' => 'ولادة جراحية وفق الاستطبابات الطبية.'],
            ['ar' => 'رعاية حضانة حديثي الولادة/اليوم', 'en' => 'NICU Day Care', 'price' => 250, 'note' => 'رعاية مكثفة لحديثي الولادة حسب اليوم.'],
            ['ar' => 'إقامة في جناح/اليوم', 'en' => 'Inpatient Ward Day', 'price' => 120, 'note' => 'إقامة المريض في الجناح مع التمريض العام.'],
            ['ar' => 'إقامة في العناية المشددة/اليوم', 'en' => 'ICU Day', 'price' => 400, 'note' => 'رعاية حرجة ومراقبة لصيقة في العناية.'],
            ['ar' => 'نقل دم', 'en' => 'Blood Transfusion', 'price' => 90, 'note' => 'إعطاء مكونات الدم حسب الاستطباب وتوافق الزمر.'],
            ['ar' => 'جلسة علاج كيماوي', 'en' => 'Chemotherapy Session', 'price' => 350, 'note' => 'إعطاء بروتوكول العلاج الكيماوي تحت إشراف.'],
            ['ar' => 'جلسة علاج شعاعي', 'en' => 'Radiotherapy Session', 'price' => 400, 'note' => 'جلسة علاج بالأشعة ضمن خطة أورام.'],
            ['ar' => 'خطة تأهيل حركي', 'en' => 'Rehabilitation Plan (Physiatry)', 'price' => 150, 'note' => 'تقييم شامل وخطة جلسات تأهيلية فردية.'],
            ['ar' => 'استشارة تغذية', 'en' => 'Nutrition Consultation', 'price' => 40, 'note' => 'تقييم الحالة الغذائية وخطة حمية علاجية.'],
        ];

        foreach ($services as $s) {
            $service = new Service();
            $service->price = $s['price'];
            $service->status = 1;
            $service->description = $s['note'];
            $service->save();

            $service->translateOrNew('ar')->name = $s['ar'];
            $service->translateOrNew('en')->name = $s['en'];
            $service->save();
        }
    }
}
