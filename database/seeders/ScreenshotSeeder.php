<?php
use App\Models\Screenshot;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class ScreenshotSeeder extends Seeder
{
    public function run()
    {
        // جلب عميل عشوائي
        $customer = Customer::inRandomOrder()->first();

        // التأكد من أن هناك عميل متاح
        if ($customer) {
            // إنشاء الصورة مع العميل المحدد
            Screenshot::create([
                'photo' => 'screenshot1.jpg',
                'customer_id' => $customer->id, // تحديد معرف العميل
            ]);

            // يمكنك إنشاء المزيد من الصور إذا لزم الأمر
        } else {
            // إذا لم يتم العثور على عميل، قم بإظهار رسالة خطأ أو التعامل معه بشكل مناسب
            echo 'No customers found!';
        }
    }
}
