<?php
/* 
------------------
Language: English
------------------
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

$lang['LANG']='en';
$lang['PAGE_TITLE'] = 'My website page title';
$lang['HEADER_TITLE'] = 'My website header title';
$lang['SITE_NAME'] = 'My Website';
$lang['SLOGAN'] = 'My slogan here';
$lang['HEADING'] = 'Heading';

// Menu

$lang['MENU_HOME'] = $r2['pm_home_en'];
$lang['MENU_ABOUT'] = $r2['pm_about_en'];
$lang['MENU_SPEC'] = $r2['pm_spec_en'];
$lang['MENU_PATI'] = $r2['pm_pandv_en'];
$lang['MENU_MEDIA'] = $r2['pm_media_en'];
$lang['MENU_CONTACT'] = $r2['pm_contact_en'];
$lang['MENU_ACCOUNTS'] = $r2['pm_accounts_en'];
$lang['MENU_LOGIN'] = $r2['pm_login_en'];
$lang['PERSONAL_PACK'] = $r2['pm_personal_en'];
$lang['FAMILY_PACK'] = $r2['pm_family_en'];
$lang['BAN_EMG'] =$r1['emergency_btn_txt_en'];
$lang['BAN_BOOK_APP'] = $r1['book_appointment_en'];
$lang['BAN_PAR'] = $r1['in_ban_txt_en'];
$lang['BAN_DOC_DET1'] = $r1['experienced_doctor_txt_en'];
$lang['BAN_DOC_DET2'] = $r1['hour_service_txt_en'];
$lang['BAN_DOC_DET3'] = $r1['our_work_txt_en'];
$lang['READ_MORE'] = 'Read More';
$lang['WHY_WE_HEAD'] = 'WHY WE NEED NABD';
$lang['WHY_WE_DET'] = $r1['in_why_we_need_txt_en'];
$lang['SURG_GEN'] = 'General Surgery';
$lang['SURG_OPH'] = 'Ophthalmological Surgery';
$lang['SURG_ORT'] = 'Orthopedic Surgery';
$lang['SURG_GYE'] = 'Gynecological Surgery';
$lang['SURG_NEU'] = 'Neurosurgery';
$lang['SURG_VASC'] = 'Vascular Surgery';
$lang['SIGN_UP'] = 'Sign-up Now';
$lang['REGISTER'] = 'Register';
$lang['MEDI_HEAD'] = $r1['mediheal_txt_heading_en'];
$lang['MEDI_DET'] = $r1['mediheal_txt_en'];
$lang['EXP_NOW'] = 'Explore Now.';
$lang['SOCI_NOW'] = 'Social Connect';
$lang['ADD'] = 'Address';
$lang['ADD_DET'] = $r3['cs_address_en'];
$lang['PAT_HEAD'] = 'Patient Testimonials';
$lang['PAT_DET'] = 'The services provided by the hospital were best. I am very much satisfied by the support staff and their behavior.';
$lang['OUR_BRAN'] = 'Our Branches';
$lang['FOR_ANY'] = 'For Any Emergency Service';
$lang['ALL_RIGT'] = 'All Rights Reserved';
//about us
$lang['ABT_US'] =  $r2['about_header_en'];
$lang['ABT_US_CONT'] =  $r5['about_nabd_en'];
$lang['NABD_HEAL'] = 'NABD HEALTH';
$lang['NABD_DET'] = 'Kind words can be short and easy to speak, but their echoes are truly endless.';
$lang['MET_DOC'] = 'MEET OUR DOCTORS';
$lang['EXPT_HEAL'] = 'Expert Healthcare';
$lang['NABD_HEAL'] = 'NABD Health Values';
$lang['OUR_LOC'] = 'Our Location';
//registration page
$lang['GEN_INF'] = 'General Info';
$lang['FIR_NAME'] = 'First Name';
$lang['LAS_NAME'] = 'Last Name';
$lang['CON_NUM'] = 'Contact Number';
$lang['EMAIL'] = 'Email';
$lang['AGE'] = 'Age';
$lang['GEN'] = 'Gender';
$lang['COUN'] = 'Country';
$lang['STATE'] = 'State';
$lang['CITY'] = 'City';
$lang['UP_SEC'] = 'Upload Section';
$lang['GOVE_ID'] = 'Government ID';
$lang['PASS'] = 'Passport';
$lang['CHOS_FILE'] = 'Choose File';
$lang['NO_FILE'] = 'No file chosen';
$lang['PAY_INF'] = 'Payment Info';
$lang['PACK_NAME'] = 'Package Name';
$lang['SEL_PACK'] = 'Select Package';
$lang['AMOUNT'] = 'Amount';
$lang['TER_CO_HEAD'] = 'Terms and Conditions:';
$lang['I_AGR'] = 'I Agree';
$lang['TER_CO_1'] = '1.	Subscribers must be between two and sixty years old. ';
$lang['TER_CO_2'] = '2.	Subscribers must provide a complete and clear explanation of their health, and if they have a specific illness or have previously undergone a specific surgery, they must state it in their initial registration form.';
$lang['TER_CO_3'] = '3-	Subscribers can use our services after two months of registration.';
$lang['TER_CO_4'] = '4-	Subscribers can pay for their subscription in two ways: Monthly or annual ';
$lang['TER_CO_5'] = '5-	Subscribers who receive payment on a monthly basis should keep in mind that if their payment is delayed for one month, they will have to wait two months after repayment to be able to use our services.';
$lang['TER_CO_6'] = '6-	Every subscriber who pays on a monthly basis should keep in mind that if they need surgery, they must pay their subscription fee for a full year in order to use our services.';
$lang['TER_CO_7'] = '7-	Subscribers can have two surgeries during the year and the time interval between each surgery is five months.';
$lang['TER_CO_8'] = '8-	The subscription period is one year and subscribers are required to pay one full year. If subscribers do not have any surgery during the year, they will have to pay the new year subscription fee again to renew their subscription for the new year.';
$lang['TER_CO_9'] = '9-	All surgeries are performed in hospitals inside and outside the country, which are part of our company\'s contract, and surgery is not possible in hospitals outside our contract.';
$lang['CONT']='Contact';
$lang['MEDIA']='Media';
///new translated files
$lang['CONTACT']='Contact';
$lang['CONTENT_TO_BE_ADDED']='Contents to be added';
$lang['ANA_SMITH']='Anna Smith';
$lang['CARDIO']='Cardiologist';
$lang['TONY']='Tony Stark';
$lang['ANESTHE']='Anesthesiologist';
$lang['JOHN']='John Snow';
$lang['NURSE']='Nurse Practitioner';
$lang['EXPERT']='Expert Healthcare';
$lang['ALONG_ESTA']='It is along established fact that reader';
$lang['PROMT_READ']='is a prompt reader';
$lang['ANALYSE_FINER']='and can analyse finer details.';
$lang['NABD_HEALTH']='NABD Health Values';
$lang['LEARN_MORE']='Learn More';
$lang['OUR_PROMISE']='Our Promise';
$lang['OUR_VISION']='Our Vision';
$lang['OUR_MISSION']='Our Mission';
$lang['MEDIA']='Media';
$lang['JOE']='Joe';
$lang['MICHAEL']='Michael';
$lang['USER_NAME']='Username';
$lang['NABD_USER']='NABD User';
$lang['PASSWORD']='Password';
$lang['NEW_USER']='New User';
$lang['CREATE_ACCOUNT']='Create an account';
$lang['PRICING_TABLE']='Pricing Table';
$lang['OUR_PRICING']='Our Pricing';
$lang['CAN_SAVE_UPLOADED_DATA']='CAN SAVE UPLOADED DATA';
$lang['CAN_CHANGE_PLAN_ANYTIME']='CAN CHANGE PLAN ANYTIME';
$lang['APPOINTMENT_ANYTIME']='APPOINTMENT ANYTIME';
$lang['BUY_NOW']='Buy Now';
$lang['USER_REG']='User Registration';
$lang['SEL_GEN']='Select gender';
$lang['MALE']='Male';
$lang['FEMALE']='Female';
$lang['OTHERS']='Others';
$lang['FAM_DET']='Family Details';
$lang['COUNT_FAM']='Enter Count Of Family';
$lang['FAMILY_COUNTING']='Your Family Counting';
$lang['NAME']='Name';
$lang['BLOOD_GROUP']='Blood Group';
$lang['RELATION']='Relation';
$lang['NEXT']='Next';
$lang['PAY']='Pay';

$lang['DIFF_COUNT_SUBS']='We also send subscribers to different countries for surgery';
$lang['COMING_SOON']='Coming Soon';
$lang['YEAR']='YEAR';
$lang['SOCIAL_CONTACT']='Contact';


$lang['UNIQ_ID']='Unique I’d';
$lang['SEL_UNIQ_ID']='Select unique id';
$lang['IF_ANY_CHRON_DIS']='If any chronic diseases';
$lang['PAY_MODE']='Payment mode';
$lang['PAY_YEARLY']='Yearly';
$lang['PAY_MONTHLY']='Monthly';
?>
