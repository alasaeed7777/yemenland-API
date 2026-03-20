<?php
    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// إعدادات التشفير - يجب أن تطابق السي شارب تماماً
$secret_key = "ALAA_ANWAR_2026_SYS_YEMEN_LAND_#"; 
$iv = "1234567890123456";

// استقبال البيانات المشفرة القادمة من البرنامج
$encrypted_data = file_get_contents('php://input');

if ($encrypted_data) {
    // فك تشفير البيانات (AES-256)
    $decrypted_sql = openssl_decrypt(
        base64_decode($encrypted_data), 
        'AES-256-CBC', 
        $secret_key, 
        OPENSSL_RAW_DATA, 
        $iv
    );

    if ($decrypted_sql) {
        // إذا نجح فك التشفير، نرسل رد تأكيد للبرنامج
        // (مستقبلاً هنا سنضع كود الاتصال بقاعدة البيانات)
        echo "SUCCESS_DECRYPTED:" . $decrypted_sql;
    } else {
        echo "ERROR:فشل فك التشفير";
    }
} else {
    // هذه الرسالة تظهر فقط عند فتح الرابط في المتصفح يدوياً
    echo "مرحباً يا ألاء.. الوسيط جاهز وينتظر بيانات مشفرة من نظام SYS_YemenLand";
}
?>