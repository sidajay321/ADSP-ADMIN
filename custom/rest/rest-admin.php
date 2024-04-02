<?php

date_default_timezone_set("Asia/Kolkata");
require_once '../class/cl-onlineexam.php';
$onlineExam = new OnlineExam();

if (isset($_REQUEST['loginpage'])) {
    if (isset($_REQUEST['admin_id']) && isset($_REQUEST['admin_pwd'])) {
        echo $onlineExam->adminLogin(htmlspecialchars($_REQUEST['admin_id']), htmlspecialchars($_REQUEST['admin_pwd']));
    } else {
        echo 'false';
    }
} else if (isset($_REQUEST['logoutpage'])) {
        echo $onlineExam->adminLogout();
} else if (isset($_REQUEST['fetchcomboboxvalue'])) {
    try {
        $combo_dat_arr = ["combo_id" => htmlspecialchars($_REQUEST['combo_id']), "combo_value" => htmlspecialchars($_REQUEST['combo_value'])];
        echo $onlineExam->fatchComboData(htmlspecialchars($_REQUEST['tb_name']), $combo_dat_arr, $_REQUEST['condition']);
    } catch (Exception $ex) {
        echo "false";
    }
} else if (isset($_REQUEST['saveexamtype'])) {
    try {
        $saveExamTypeArr = ["exam_type_name" => htmlspecialchars($_REQUEST['exam_type_name'])];
        echo $onlineExam->saveExamTypeInDatabase($saveExamTypeArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['savesubjecttype'])) {
    try {
        $saveSubjectTypeArr = ["exam_type_name" => htmlspecialchars($_REQUEST['exam_type_name']), "subject_name" => htmlspecialchars($_REQUEST['subject_name'])];
        echo $onlineExam->saveSubjectTypeInDatabase($saveSubjectTypeArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['showSubjectTypeInfo'])) {
    try {
        $subject_id = "";
        if (isset($_REQUEST['subject_id'])) {
            $subject_id = htmlspecialchars($_REQUEST['subject_id']);
        }
        echo $onlineExam->getSubjectInJSONString($subject_id);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['showQuestionInfo'])) {
    try {
        $fields = ["exam_type_id" => htmlspecialchars($_REQUEST['exam_type_id']), "subject_id" => htmlspecialchars($_REQUEST['subject_id'])];
        echo $onlineExam->getQuestionInJSONString($fields);
    } catch (Exception $ex) {
        echo 'Exception !';
    }
} else if (isset($_REQUEST['showExamTypeInfo'])) {
    try {
        $exam_type_id = "";
        if (isset($_REQUEST['exam_type_id'])) {
            $exam_type_id = htmlspecialchars($_REQUEST['exam_type_id']);
        }
        echo $onlineExam->getExamTypeInJSONString($exam_type_id);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['showSetInfo'])) {
    try {
        $setId = "";
        if (isset($_REQUEST['set_id'])) {
            $set_id = htmlspecialchars($_REQUEST['set_id']);
        }
        echo $onlineExam->getSetInfoInJSONString($setId);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['showExamPackageInfo'])) {
    try {
        $epId = "";
        if (isset($_REQUEST['ep_id'])) {
            $epId = htmlspecialchars($_REQUEST['ep_id']);
        }
        echo $onlineExam->getPackageInfoInJSONString($epId);
    } catch (Exception $ex) {
        echo 'false';
    }
}else if (isset($_REQUEST['showExamPackageInfoUserInfo'])) {
    try {
        $userID = "";
        if (isset($_REQUEST['userID'])) {
            $userID = htmlspecialchars($_REQUEST['userID']);
        }
        echo $onlineExam->getPackageInfoInUserInfoJSONString($userID);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['updateadmin'])) {
    try {
        $updateAdminArr = ["id_admin_type" => htmlspecialchars($_REQUEST['id_admin_type']), "id_userid" => htmlspecialchars($_REQUEST['id_userid']), "id_user_name" => htmlspecialchars($_REQUEST['id_user_name']), "id_emailid" => htmlspecialchars($_REQUEST['id_emailid']), "id_contact" => htmlspecialchars($_REQUEST['id_contact']), "id_address" => htmlspecialchars($_REQUEST['id_address'])];
        echo $onlineExam->updateAdminInDatabase($updateAdminArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['savequestion'])) {
    try {
        $question_ext = strtolower(substr($_FILES['question-image']['name'], strrpos($_FILES['question-image']['name'], ".")));
        $option1_ext = strtolower(substr($_FILES['option1-image']['name'], strrpos($_FILES['option1-image']['name'], ".")));
        $option2_ext = strtolower(substr($_FILES['option2-image']['name'], strrpos($_FILES['option2-image']['name'], ".")));
        $option3_ext = strtolower(substr($_FILES['option3-image']['name'], strrpos($_FILES['option3-image']['name'], ".")));
        $option4_ext = strtolower(substr($_FILES['option4-image']['name'], strrpos($_FILES['option4-image']['name'], ".")));

        $saveQuestionArr = ["exam_type" => htmlspecialchars($_REQUEST['exam_type']),
            "question_type_subject" => htmlspecialchars($_REQUEST['question_type_subject']),
            "question_subject" => htmlspecialchars($_REQUEST['question_subject']),
            "correct_answer" => htmlspecialchars($_REQUEST['correct_answer']),
            "question" => $_REQUEST['question'],
            "option1" => $_REQUEST['option1'],
            "option2" => $_REQUEST['option2'],
            "option3" => $_REQUEST['option3'],
            "option4" => $_REQUEST['option4'],
            "question_ext" => $question_ext,
            "option1_ext" => $option1_ext,
            "option2_ext" => $option2_ext,
            "option3_ext" => $option3_ext,
            "option4_ext" => $option4_ext,
            "question_checked" => htmlspecialchars($_REQUEST['question_checked']),
            "option1_checked" => htmlspecialchars($_REQUEST['option1_checked']),
            "option2_checked" => htmlspecialchars($_REQUEST['option2_checked']),
            "option3_checked" => htmlspecialchars($_REQUEST['option3_checked']),
            "option4_checked" => htmlspecialchars($_REQUEST['option4_checked'])];
        //print_r($saveQuestionArr);
        echo $onlineExam->saveQuestionInDatabase($saveQuestionArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['savesetinfo'])) {
    try {
        $saveSetInfoArr = array();
        $saveSetInfoArr["exam_set_name"] = htmlspecialchars($_REQUEST['exam_set_name']);
        $saveSetInfoArr["exam_marks_per_que"] = htmlspecialchars($_REQUEST['exam_marks_per_que']);
        $saveSetInfoArr["set_negative_marking"] = htmlspecialchars($_REQUEST['set_negative_marking']);
        $saveSetInfoArr["set_duration"] = htmlspecialchars($_REQUEST['set_duration']);
        $saveSetInfoArr["exam_type_name"] = htmlspecialchars($_REQUEST['exam_type_name']);
        $subjectQueNoArr = array();
        $i = 0;
        foreach ($_REQUEST['subject_id'] as $sid) {
            $subjectQueNoArr[$i]['subject_id'] = htmlspecialchars($sid);
            $subjectQueNoArr[$i]['subject_no_question'] = htmlspecialchars($_REQUEST['subject_no_question'][$i]);
            $i++;
        }
        $saveSetInfoArr["subject_question_number"] = $subjectQueNoArr;
        echo $onlineExam->saveSetInfo($saveSetInfoArr);
    } catch (Exception $ex) {
        echo 'false ';
    }
} else if (isset($_REQUEST['checkSetName'])) {
    try {
        echo $onlineExam->checkSetName($_REQUEST['exam_set_name']);
    } catch (Exception $ex) {
        echo 'false ';
    }
} elseif (isset($_REQUEST['save_exam_package'])) {
    try {
        $saveExamPackageArr = ["ep_name" => htmlspecialchars($_REQUEST['ep_name']), "ep_set_id" => htmlspecialchars($_REQUEST['ep_set_id']), "ep_no_of_set" => htmlspecialchars($_REQUEST['ep_no_of_set']), "ep_duration" => htmlspecialchars($_REQUEST['ep_duration']), "ep_price" => htmlspecialchars($_REQUEST['ep_price'])];
        echo $onlineExam->saveExamPackageInDatabase($saveExamPackageArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} elseif (isset($_REQUEST['checkUserName'])) {
    try {
        echo $onlineExam->checkUserEmail($_REQUEST['user_email']);
    } catch (Exception $ex) {
        echo 'false ';
    }
} elseif (isset($_REQUEST['checkContactNumber'])) {
    try {
        echo $onlineExam->checkContactNumber($_REQUEST['contact_number']);
    } catch (Exception $ex) {
        echo 'false ';
    }
} elseif (isset($_REQUEST['save_user_details'])) {
    try {
        $saveUserProfileArr = ["user_name" => htmlspecialchars($_REQUEST['user_name']),"user_date_of_birth" => htmlspecialchars($_REQUEST['user_date_of_birth']),"user_father_name" => htmlspecialchars($_REQUEST['user_father_name']), "user_email" => htmlspecialchars($_REQUEST['user_email']), "contact_number" => htmlspecialchars($_REQUEST['contact_number']), "user_password" => htmlspecialchars($_REQUEST['user_password'])];
        echo $onlineExam->saveUserProfileDatabase($saveUserProfileArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} elseif (isset($_REQUEST['showUserInfo'])) {
    try {
        $userId = "";
        if (isset($_REQUEST['user_id'])) {
            $userId = htmlspecialchars($_REQUEST['user_id']);
        }
        echo $onlineExam->getUserInJSONString($userId);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['show_package_info'])) {
    try {
        $setId = "";
        if (isset($_REQUEST['set_id'])) {
            $setId = htmlspecialchars($_REQUEST['set_id']);
        }
        echo $onlineExam->getPackageInfo($setId);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['save_pp'])) {
    try {
        $savePPArr = ["pp_user_id_fk" => htmlspecialchars($_REQUEST['pp_user_id_fk']), "pp_ep_id_fk" => htmlspecialchars($_REQUEST['pp_ep_id_fk'])];
        echo $onlineExam->savePPDatabase($savePPArr);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['show_package_info'])) {
    try {
        $setId = "";
        if (isset($_REQUEST['set_id'])) {
            $setId = htmlspecialchars($_REQUEST['set_id']);
        }
        echo $onlineExam->getPackageInfo($setId);
    } catch (Exception $ex) {
        echo 'false';
    }
} else if (isset($_REQUEST['show_package_info_details'])) {
    try {
        $setId = htmlspecialchars($_REQUEST['set_id']);
        $userId = htmlspecialchars($_REQUEST['user_id']);
        echo $onlineExam->getPackageInfoDeatils($setId,$userId);
    } catch (Exception $ex) {
        echo 'false';
    }
}else if (isset($_REQUEST['deleteQuestion'])) {
    try {
        $questionID = htmlspecialchars($_REQUEST['questionID']);
        echo $onlineExam->deleteQuestion($questionID);
    } catch (Exception $ex) {
        echo 'false';
    }
}