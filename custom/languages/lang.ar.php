<?php
/* 
-----------------
Language: German
-----------------
*/
include './connection.php';
$conn = createConnection();
$qry1 = "SELECT * FROM `tb_index`";
$t1 = $conn->query($qry1);
$r1 = $t1->fetch(PDO::FETCH_ASSOC);
//page menu and header
$qry2 = "SELECT * FROM `tb_page_menu`";
$t2 = $conn->query($qry2);
$r2 = $t2->fetch(PDO::FETCH_ASSOC);
//contact_section
$qry3 = "SELECT * FROM `contact_section`";
$t3 = $conn->query($qry3);
$r3 = $t3->fetch(PDO::FETCH_ASSOC);
//pricing_table
$qry4 = "SELECT * FROM `pricing_table`";
$t4 = $conn->query($qry4);
$r4 = $t4->fetch(PDO::FETCH_ASSOC);
//tb_about
$qry5 = "SELECT * FROM `tb_about`";
$t5 = $conn->query($qry5);
$r5 = $t5->fetch(PDO::FETCH_ASSOC);
//tb_about
$qry6 = "SELECT * FROM `tb_nabd_doctor`";
$t6 = $conn->query($qry6);
$r6 = $t6->fetch(PDO::FETCH_ASSOC);
//tb_specialities_services
$qry7 = "SELECT * FROM `tb_specialities_services`";
$t7 = $conn->query($qry7);
$r7 = $t7->fetch(PDO::FETCH_ASSOC);
//tb_testimonial
$qry8 = "SELECT * FROM `tb_specialities_services`";
$t8 = $conn->query($qry8);
$r8 = $t8->fetch(PDO::FETCH_ASSOC);
$lang = array();
$lang['LANG']='ar';
$lang['PAGE_TITLE'] = 'Meine Webseite Titel';
$lang['HEADER_TITLE'] = 'Meine Website-Header Titel';
$lang['SITE_NAME'] = 'Meine Website';
$lang['SLOGAN'] = 'Mein Slogan hier';
$lang['HEADING'] = 'Position';

// Menu

$lang['MENU_HOME'] = $r2['pm_home_ar'];
$lang['MENU_ABOUT'] = $r2['pm_about_ar'];
$lang['MENU_SPEC'] = $r2['pm_spec_ar'];
$lang['MENU_PATI'] = $r2['pm_pandv_ar'];
$lang['MENU_MEDIA'] = $r2['pm_media_ar'];
$lang['MENU_CONTACT'] = $r2['pm_contact_ar'];
$lang['MENU_ACCOUNTS'] = $r2['pm_accounts_ar'];
$lang['MENU_LOGIN'] = $r2['pm_login_ar'];
$lang['PERSONAL_PACK'] = $r2['pm_personal_ar'];
$lang['FAMILY_PACK'] = $r2['pm_family_ar'];
$lang['BAN_EMG'] =$r1['emergency_btn_txt_ar'];
$lang['BAN_BOOK_APP'] = $r1['book_appointment_ar'];
$lang['BAN_PAR'] = $r1['in_ban_txt_ar'];
$lang['BAN_DOC_DET1'] = $r1['experienced_doctor_txt_ar'];
$lang['BAN_DOC_DET2'] = $r1['hour_service_txt_ar'];
$lang['BAN_DOC_DET3'] = $r1['our_work_txt_ar'];
$lang['READ_MORE'] = 'اقرأ المزيد ';
$lang['WHY_WE_HEAD'] = 'لماذا نحتاج إلى نبض  ';
$lang['WHY_WE_DET'] = $r1['in_why_we_need_txt_ar'];
$lang['SURG_GEN'] = 'الجراحة العامة ';
$lang['SURG_OPH'] = 'جراحة العيون ';
$lang['SURG_ORT'] = 'جراحة العظام ';
$lang['SURG_GYE'] = 'جراحة أمراض النساء ';
$lang['SURG_NEU'] = 'جراحة الأعصاب ';
$lang['SURG_VASC'] = 'جراحة الأوعية الدموية ';
$lang['SIGN_UP'] = 'قم بالتسجيل الآن ';
$lang['REGISTER'] = 'اشترك';
$lang['MEDI_HEAD'] = $r1['mediheal_txt_heading_ar'];
$lang['MEDI_DET'] = $r1['mediheal_txt_ar'];
$lang['SOCI_NOW'] = 'التواصل الاجتماعي ';
//$lang['SOCI_NOW'] = 'التواصل الاجتماعي ';
$lang['EXP_NOW'] = 'استكشف الآن ';
$lang['ADD'] = 'العنوان ';
$lang['ADD_DET'] = $r3['cs_address_ar'];
$lang['PAT_HEAD'] = 'شهادات المرضى';
$lang['PAT_DET'] = 'كانت الخدمات المُقدمة من قِبل المستشفى من أفضل الخدمات، أنا راض كثيرًا عن موظفي الدعم وسلوكهم.';
$lang['OUR_BRAN'] = 'فروعنا ';
$lang['FOR_ANY'] = 'لخدمات الطوارئ';
$lang['ALL_RIGT'] = 'جميع الحقوق محفوظة ';
//about us
$lang['ABT_US'] = $r2['about_header_ar'];
$lang['ABT_US_CONT'] =  $r5['about_nabd_ar'];
$lang['NABD_HEAL'] = '"نبض"';
$lang['NABD_DET'] = 'حسن الكلام يُسهل نطقه؛ ورغم قلة كلماته، يستمر صداها دون توقف. ';
$lang['MET_DOC'] = 'قابل أطبائنا';
$lang['EXPT_HEAL'] = 'خبير رعاية صحية';
$lang['NABD_HEAL'] = 'قيم "نبض"';
$lang['OUR_LOC'] = 'موقعنا';
//registration page
$lang['REG_HEAD']='صفحة التسجيل-';
$lang['GEN_INF'] = 'معلومات عامة';
$lang['FIR_NAME'] = 'الاسم الأول';
$lang['LAS_NAME'] = 'اللقب';
$lang['CON_NUM'] = 'رقم التواصل';
$lang['EMAIL'] = 'البريد الإلكتروني';
$lang['AGE'] = 'العمر';
$lang['GEN'] = 'الجنس';
$lang['COUN'] = 'البلد';
$lang['STATE'] = 'الدولة';
$lang['CITY'] = 'المدينة';
$lang['UP_SEC'] = 'قسم التحميل على الانترنت ';
$lang['GOVE_ID'] = 'الهوية الحكومية';
$lang['PASS'] = 'جواز السفر';
$lang['CHOS_FILE'] = 'اختر ملف';
$lang['NO_FILE'] = 'لم يتم اختيار ملف';
$lang['PAY_INF'] = 'معلومات الدفع';
$lang['PACK_NAME'] = 'اسم المجموعة';
$lang['SEL_PACK'] = 'حدد المجموعة';
$lang['AMOUNT'] = 'المبلغ ';
$lang['TER_CO_HEAD'] = 'الشروط والأحكام:';
$lang['I_AGR'] = 'أوافق';
$lang['TER_CO_1'] = '1-	يجب أن يكون المشترك من عمر سنتين إلى 60 سنة.  ';
$lang['TER_CO_2'] = '2-	يجب أن يقدم المشترك شرحًا واضحًا لحالتهم الصحية، وإذا كانوا يعانون من مرض معين أو سبق لهم أن خضعوا لعملية جراحية معينة، يجب أن يذكروها في البداية.';
$lang['TER_CO_3'] = '3- يمكن للمشترك أن يتمتع بخدماتنا بعد شهرين من التسجيل.';
$lang['TER_CO_4'] = '4- يمكن أن يدفع المشترك اشتراكه بطريقتين: شهري أو سنوي. ';
$lang['TER_CO_5'] = '5- يضع المشترك الذي يدفع على أساس شهري في اعتباره أنه إذا تأخر الدفع لشهر، فعليه الانتظار لشهرين بعد السداد حتى يستطيع الاستفادة من خدماتنا. ';
$lang['TER_CO_6'] = '6- يضع كل مشترك ممن يدفعون على أساس شهري في اعتباره أنه إذا احتاج إجراء عملية جراحية، فعليه دفع رسوم سنة كاملة حتى يتمكن من الاستفادة من خدماتنا. ';
$lang['TER_CO_7'] = '7- يمكن للمشتركين إجراء عمليتين جراحيتين خلال السنة، على أن تكون الفترة الزمنية بين كل عملية جراحية خمسة أشهر.';
$lang['TER_CO_8'] = '8- مدة الاشتراك سنة، ويلتزم المشتركون بدفع اشتراك سنة كاملة. وإذا لم يقم المشتركين بإجراء أي عملية خلال السنة، فعليهم دفع اشتراك رسوم سنة جديدة مرة أخرى لتجديد اشتراكهم لسنة جديدة.';
$lang['TER_CO_9'] = '9- جميع العمليات الجراحية التي تُجرى داخل وخارج مستشفيات البلد، مما يدخل في إطار عقد شركتنا، ولا تدخل الجراحات التي لا يُمكن إجرائها في المستشفيات في إطار عقدنا. ';
$lang['CONT']='إتصل بالدعم';
$lang['MEDIA']='الإعلام';


$lang['CONTACT']='اتصل بالدعم';
$lang['CONTENT_TO_BE_ADDED']='المحتويات المراد إضافتها';
$lang['ANA_SMITH']='آنا سميث';
$lang['CARDIO']='طبيبة قلب';
$lang['TONY']='توني ستارك';
$lang['ANESTHE']='طبيب التخدير';
$lang['JOHN']='جون سنو';
$lang['NURSE']='ممرّض متدرّب';
$lang['EXPERT']='خبير الرعاية الصحية';
$lang['ALONG_ESTA']='ومن الحقائق الثابتة  أن القارئ';
$lang['PROMT_READ']='هو قارئ سريع';
$lang['ANALYSE_FINER']='وبإمكانه  تحليل التفاصيل الدقيقة.';
$lang['NABD_HEALTH']='القيم الصحية ل "نبض"';
$lang['LEARN_MORE']='تعّلم المزيد';
$lang['OUR_PROMISE']='وعدنا /أو تعّهدنا';
$lang['OUR_VISION']='رؤيتنا';
$lang['OUR_MISSION']='رسالتنا';
$lang['MEDIA']='وسائل الإعلام';
$lang['JOE']='جو';
$lang['MICHAEL']='ميشيل';
$lang['USER_NAME']='اسم المستخدم';
$lang['NABD_USER']='مستخدم نبض';
$lang['PASSWORD']='كلمة المرور';
$lang['NEW_USER']='مستخدم جديد';
$lang['CREATE_ACCOUNT']='إنشاء حساب	';
$lang['PRICING_TABLE']='جدول الأسعار';
$lang['OUR_PRICING']='أسعارنا';
$lang['CAN_SAVE_UPLOADED_DATA']='يمكن حفظ البيانات التي تم تحميلها';
$lang['CAN_CHANGE_PLAN_ANYTIME']='يمكن تغيير الخطة في أي وقت';
$lang['APPOINTMENT_ANYTIME']='الموعد في أي وقت';
$lang['BUY_NOW']='اشترك الان';
$lang['USER_REG']='تسجيل المستخدم';
$lang['SEL_GEN']='اختر الجنس';
$lang['MALE']='ذكر';
$lang['FEMALE']='أنثى';
$lang['OTHERS']='أخرى';
$lang['FAM_DET']='تفاصيل العائلة';
$lang['COUNT_FAM']='ادخل عدد أفراد العائلة';
$lang['FAMILY_COUNTING']='احسب عائلتك';
$lang['NAME']='الاسم';
$lang['BLOOD_GROUP']='فصيلة الدم';
$lang['RELATION']='العلاقة';
$lang['NEXT']='التالي';
$lang['PAY']='الدفع';

$lang['DIFF_COUNT_SUBS']='لدى نبض تعاقدات مع افضل المستشفيات الخاصة في العديد من الدول ،  اذ تقوم بأرسال مشتركيها الى تلك المستشفيات لاجراء عملياتهم الجراحية في حال تعذر اجرائها في العراق او البلد الذي يقيمون فيه';
$lang['COMING_SOON']='قريبا ترقبوا';
$lang['YEAR']='';
$lang['SOCIAL_CONTACT']='اتصل بالدعم';

$lang['UNIQ_ID']='الهوية ';
$lang['SEL_UNIQ_ID']='اختر الهوية ';
$lang['IF_ANY_CHRON_DIS']='اذا كان لديك امراض مزمنة';
$lang['PAY_MODE']='طريقة الدفع ';
$lang['PAY_YEARLY']='سنوي ';
$lang['PAY_MONTHLY']=' شهري ';
?>
