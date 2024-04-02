<?php

date_default_timezone_set("Asia/Kolkata");
require_once '../connection/dbconnect.php';

class OnlineExam {

    protected $glv_connObj = NULL;

    function __construct() {
        $this->glv_connObj = new Connection();
    }

    protected function getMaxId($tbName, $fName) {
        $maxIdResult = $this->glv_connObj->fatchRecordFromTable($tbName, "max(" . $fName . ") AS max_id", "");
        $maxId = $maxIdResult[0]["max_id"] + 1;
        return $maxId;
    }

    protected function isRecordExsistInTable($tbName, $condition) {
        $Result = $this->glv_connObj->fatchRecordFromTable($tbName, "*", $condition);
        if ($Result == NULL) {
            return false;
        } else {
            return true;
        }
    }

    public function fatchComboData($tbName, $fieldName, $condition) {
        $Result = $this->glv_connObj->fatchRecordFromTable($tbName, $fieldName['combo_id'] . " AS comboID," . $fieldName['combo_value'] . " AS comboValue", $condition);
        return json_encode($Result);
    }

    public function getSubjectInJSONString($subject_id) {
        $condition = $subject_id == "" ? "" : "where subject_id like'" . $subject_id . "'";
        $subject_info = $this->glv_connObj->fatchRecordFromTable("subject_info si join exam_type et on si.exam_type_id_fk=et.exam_type_id", "*", $condition);
        return json_encode($subject_info);
    }

    public function getUserInJSONString($userId) {
        $condition = $userId == "" ? "" : "where contact_number like'" . $userId . "' or user_email like '" . $userId . "'";
        $user_info = $this->glv_connObj->fatchRecordFromTable("tb_user_profile", "*", $condition);
        return json_encode($user_info);
    }

    public function deleteQuestion($questionID) {
        $setValue = "deleted_question='Y'";
        $condition = "where question_id=" . $questionID;
        if ($this->glv_connObj->updateDataInTable("question_info", $setValue, $condition)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function getQuestionInJSONString($fields) {
        //$arr='[{"question_id":"19","question_ext":".png","option1txt":"<p>lkclskdcdskmc lksd clkdsmckdsc sdklclkdsmcldsk</p>","option2_ext":".png","option3txt":"<p>sa;lx;lasmxlkasma</p>","option4_ext":".png","correct_answer":"A","subject_id_fk":"1","exam_type_id_fk":"1"}]';
        $r = $this->glv_connObj->link->query("SELECT question_id,question_txt,option1txt,option2txt,option3txt,option4txt,option5txt,question_ext,option1_ext,option2_ext,option3_ext,option4_ext,option5_ext,correct_answer,exam_type_id_fk,subject_id_fk FROM question_info where deleted_question like'N' and exam_type_id_fk=" . $fields['exam_type_id'] . " and subject_id_fk=" . $fields['subject_id']);
        $records = $r->fetchAll(PDO::FETCH_ASSOC);
        if ($records != NULL) {
            $c = 1;
            $returnValue = "";
            $returnValue .= "<table class='table table-bordered'><thead><tr><th>Sr.No</th><th>Question / Option</th><th style='width:100px;'>Action</th></tr></thead><tbody>";
            foreach ($records as $r) {
                $returnValue .= '<tr><td>' . ($c) . '</td><td><table style="width:100%;">';

                if ($r['question_txt'] != NULL)
                    $returnValue .= '<tr><td style="width:15%;">Question ' . ($c) . '.</td><td>' . $r['question_txt'] . '</td></tr>';
                else if ($r['question_ext'] != NULL)
                    $returnValue .= '<tr><td>Question ' . ($c) . '.</td><td><img src="custome/image/question/q_' . $r['question_id'] . $r['question_ext'] . '" alt=""/></td></tr>';


                if ($r['option1txt'] != NULL)
                    $returnValue .= '<tr><td>Option 1</td><td>' . $r['option1txt'] . '</td></tr>';
                else if ($r['option1_ext'] != NULL)
                    $returnValue .= '<tr><td>Option 1</td><td><img src="custome/image/question/qo1_' . $r['question_id'] . $r['option1_ext'] . '" alt=""/></td></tr>';


                if ($r['option2txt'] != NULL)
                    $returnValue .= '<tr><td>Option 2</td><td>' . $r['option2txt'] . '</td></tr>';
                else if ($r['option2_ext'] != NULL)
                    $returnValue .= '<tr><td>Option 2</td><td><img src="custome/image/question/qo2_' . $r['question_id'] . $r['option2_ext'] . '" alt=""/></td></tr>';


                if ($r['option3txt'] != NULL)
                    $returnValue .= '<tr><td>Option 3</td><td>' . $r['option3txt'] . '</td></tr>';
                else if ($r['option3_ext'] != NULL)
                    $returnValue .= '<tr><td>Option 3</td><td><img src="custome/image/question/qo3_' . $r['question_id'] . $r['option3_ext'] . '" alt=""/></td></tr>';



                if ($r['option4txt'] != NULL)
                    $returnValue .= '<tr><td>Option 4</td><td>' . $r['option4txt'] . '</td></tr>';
                else if ($r['option4_ext'] != NULL)
                    $returnValue .= '<tr><td>Option 4</td><td><img src="custome/image/question/qo4_' . $r['question_id'] . $r['option4_ext'] . '" alt=""/></td></tr>';

                $returnValue .= '<tr><td>Correct Answer</td><td>' . $r['correct_answer'] . '</td></tr>';
                $returnValue .= '</tbody></table></td><td><button onclick="deleteQuestion(\'' . $r['question_id'] . '\');" class="fa fa-trash btn btn-danger btn-sm" title="Delete"></button> <button class="fa fa-edit btn btn-primary btn-sm" title="Edit");"></button></td></tr>';
                $c++;
            }
            $returnValue .= '</table>';

            return $returnValue;
        }else {
            return "<table class='table table-bordered'><tr><td><h1 style='text-align:center;'>No Record...</h1></td></tr></table>";
        }



        /* $question_info = $this->glv_connObj->fatchRecordFromTable("question_info qi join exam_type et on qi.exam_type_id_fk=et.exam_type_id join subject_info si on qi.subject_id_fk=si.subject_id", "qi.question_id,qi.exam_type_id_fk,qi.subject_id_fk,qi.added_by_id_fk,correct_answer,et.exam_type_name,si.subject_name", "where qi.exam_type_id_fk=" . $fields['exam_type_id'] . " and qi.subject_id_fk=" . $fields['subject_id']);
          return json_encode($question_info); */
    }

    public function getExamTypeInJSONString($exam_type_id) {
        $condition = $exam_type_id == "" ? "" : "where exam_type_id like'" . $exam_type_id . "'";
        $subject_info = $this->glv_connObj->fatchRecordFromTable("exam_type", "*", $condition);
        return json_encode($subject_info);
    }

    public function saveQuestionInDatabase($arrguments) {
        $id = $this->getMaxId("question_info", "question_id");
        $fielsNames = "question_id";
        $fieldValue = "'$id'";
        if ($arrguments['question_checked'] === "1") {
            $fielsNames .= ",question_txt";
            $fieldValue .= ",'{$arrguments['question']}'";
        } else {
            $fielsNames .= ",question_ext";
            $fieldValue .= ",'{$arrguments['question_ext']}'";
        }
        if ($arrguments['option1_checked'] === "1") {
            $fielsNames .= ",option1txt";
            $fieldValue .= ",'{$arrguments['option1']}'";
        } else {
            $fielsNames .= ",option1_ext";
            $fieldValue .= ",'{$arrguments['option1_ext']}'";
        }
        if ($arrguments['option2_checked'] === "1") {
            $fielsNames .= ",option2txt";
            $fieldValue .= ",'{$arrguments['option2']}'";
        } else {
            $fielsNames .= ",option2_ext";
            $fieldValue .= ",'{$arrguments['option2_ext']}'";
        }
        if ($arrguments['option3_checked'] === "1") {
            $fielsNames .= ",option3txt";
            $fieldValue .= ",'{$arrguments['option3']}'";
        } else {
            $fielsNames .= ",option3_ext";
            $fieldValue .= ",'{$arrguments['option3_ext']}'";
        }
        if ($arrguments['option4_checked'] === "1") {
            $fielsNames .= ",option4txt";
            $fieldValue .= ",'{$arrguments['option4']}'";
        } else {
            $fielsNames .= ",option4_ext";
            $fieldValue .= ",'{$arrguments['option4_ext']}'";
        }


        $fielsNames .= ",added_by_id_fk";
        $fieldValue .= ",'0'";
        $fielsNames .= ",correct_answer";
        $fieldValue .= ",'{$arrguments['correct_answer']}'";
        $fielsNames .= ",exam_type_id_fk";
        $fieldValue .= ",'{$arrguments['exam_type']}'";
        $fielsNames .= ",exam_sub_type_id_fk";
        $fieldValue .= ",'{$arrguments['question_type_subject']}'";
        $fielsNames .= ",subject_id_fk";
        $fieldValue .= ",'{$arrguments['question_subject']}'";


        /*         * **************   question image*********************** */

        /*         * **   Work Of Rest**** *///
        //   $question_ext = strtolower(substr($_FILES['question-image']['name'], strrpos($_FILES['question-image']['name'], ".")));


        if ($arrguments['question_checked'] === "0") {
            $uploadedfile = $_FILES['question-image']['tmp_name'];
            if ($arrguments['question_ext'] == ".jpg" || $arrguments['question_ext'] == ".jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($arrguments['question_ext'] == ".png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            $newwidth = $width;
            $newheight = $height;
            $tmp = imagecreatetruecolor($newwidth, $newheight);
            $filename = "../image/question/q_" . $id . $arrguments['question_ext'];
            if (is_file($filename)) {
                unlink($filename);
            }
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            if ($arrguments['question_ext'] == ".jpg" || $arrguments['question_ext'] == ".jpeg") {
                imagejpeg($tmp, $filename, 100);
            } else if ($arrguments['question_ext'] == ".png") {
                imagepng($tmp, $filename, 9);
            } else {
                imagegif($tmp, $filename);
            }
            imagedestroy($src);
            imagedestroy($tmp);
        }
        /*         * **************   option1 image*********************** */
        if ($arrguments['option1_checked'] === "0") {
            $uploadedfile = $_FILES['option1-image']['tmp_name'];
            if ($arrguments['option1_ext'] == ".jpg" || $arrguments['option1_ext'] == ".jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($arrguments['option1_ext'] == ".png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            $newwidth = $width;
            $newheight = $height;
            $tmp = imagecreatetruecolor($newwidth, $newheight);
            $filename = "../image/question/qo1_" . $id . $arrguments['option1_ext'];
            if (is_file($filename)) {
                unlink($filename);
            }
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            if ($arrguments['option1_ext'] == ".jpg" || $arrguments['option1_ext'] == ".jpeg") {
                imagejpeg($tmp, $filename, 100);
            } else if ($arrguments['option1_ext'] == ".png") {
                imagepng($tmp, $filename, 9);
            } else {
                imagegif($tmp, $filename);
            }
            imagedestroy($src);
            imagedestroy($tmp);
        }


        /*         * **************   option2 image*********************** */
        if ($arrguments['option2_checked'] === "0") {
            $uploadedfile = $_FILES['option2-image']['tmp_name'];
            if ($arrguments['option2_ext'] == ".jpg" || $arrguments['option2_ext'] == ".jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($arrguments['option2_ext'] == ".png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            $newwidth = $width;
            $newheight = $height;
            $tmp = imagecreatetruecolor($newwidth, $newheight);
            $filename = "../image/question/qo2_" . $id . $arrguments['option2_ext'];
            if (is_file($filename)) {
                unlink($filename);
            }
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            if ($arrguments['option2_ext'] == ".jpg" || $arrguments['option2_ext'] == ".jpeg") {
                imagejpeg($tmp, $filename, 100);
            } else if ($arrguments['option2_ext'] == ".png") {
                imagepng($tmp, $filename, 9);
            } else {
                imagegif($tmp, $filename);
            }
            imagedestroy($src);
            imagedestroy($tmp);
        }

        /*         * **************   option3 image*********************** */
        if ($arrguments['option3_checked'] === "0") {
            $uploadedfile = $_FILES['option3-image']['tmp_name'];
            if ($arrguments['option3_ext'] == ".jpg" || $arrguments['option3_ext'] == ".jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($arrguments['option3_ext'] == ".png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            $newwidth = $width;
            $newheight = $height;
            $tmp = imagecreatetruecolor($newwidth, $newheight);
            $filename = "../image/question/qo3_" . $id . $arrguments['option3_ext'];
            if (is_file($filename)) {
                unlink($filename);
            }
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            if ($arrguments['option3_ext'] == ".jpg" || $arrguments['option3_ext'] == ".jpeg") {
                imagejpeg($tmp, $filename, 100);
            } else if ($arrguments['option3_ext'] == ".png") {
                imagepng($tmp, $filename, 9);
            } else {
                imagegif($tmp, $filename);
            }
            imagedestroy($src);
            imagedestroy($tmp);
        }

        /*         * **************   option4 image*********************** */
        if ($arrguments['option4_checked'] === "0") {
            $uploadedfile = $_FILES['option4-image']['tmp_name'];
            if ($arrguments['option4_ext'] == ".jpg" || $arrguments['option4_ext'] == ".jpeg") {
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($arrguments['option4_ext'] == ".png") {
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            $newwidth = $width;
            $newheight = $height;
            $tmp = imagecreatetruecolor($newwidth, $newheight);
            $filename = "../image/question/qo4_" . $id . $arrguments['option4_ext'];
            if (is_file($filename)) {
                unlink($filename);
            }
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            if ($arrguments['option4_ext'] == ".jpg" || $arrguments['option4_ext'] == ".jpeg") {
                imagejpeg($tmp, $filename, 100);
            } else if ($arrguments['option4_ext'] == ".png") {
                imagepng($tmp, $filename, 9);
            } else {
                imagegif($tmp, $filename);
            }
            imagedestroy($src);
            imagedestroy($tmp);
        }

        return $this->glv_connObj->insertDataInTable("question_info", $fielsNames, $fieldValue);
    }

    public function savePPDatabase($arrguments) {
        $id = $this->getMaxId("package_purchasing", "pp_id");
        $fielsNames = "pp_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",pp_user_id_fk";
        $fieldValue .= ",'{$arrguments['pp_user_id_fk']}'";
        $fielsNames .= ",pp_date";
        $fieldValue .= ",'" . date('Y-m-d') . "'";
        $fielsNames .= ",pp_ep_id_fk";
        $fieldValue .= ",'{$arrguments['pp_ep_id_fk']}'";
        if ($this->glv_connObj->insertDataInTable("package_purchasing", $fielsNames, $fieldValue)) {
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

    public function saveExamPackageInDatabase($arrguments) {
        if ($this->isRecordExsistInTable("exam_package", "WHERE ep_name like'{$arrguments['ep_name']}'")) {
            return '{"eventStatus":"duplicate"}';
        }
        $id = $this->getMaxId("exam_package", "ep_id");
        $fielsNames = "ep_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",ep_name";
        $fieldValue .= ",'{$arrguments['ep_name']}'";
        $fielsNames .= ",ep_set_id";
        $fieldValue .= ",'{$arrguments['ep_set_id']}'";
        $fielsNames .= ",ep_no_of_set";
        $fieldValue .= ",'{$arrguments['ep_no_of_set']}'";
        $fielsNames .= ",ep_duration";
        $fieldValue .= ",'{$arrguments['ep_duration']}'";
        $fielsNames .= ",ep_price";
        $fieldValue .= ",'{$arrguments['ep_price']}'";
        $fielsNames .= ",ep_offer";
        $fieldValue .= ",'0'";
        if ($this->glv_connObj->insertDataInTable("exam_package", $fielsNames, $fieldValue)) {
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

    public function saveExamTypeInDatabase($arrguments) {
        if ($this->isRecordExsistInTable("exam_type", "WHERE exam_type_name like'{$arrguments['exam_type_name']}'")) {
            return '{"eventStatus":"duplicate"}';
        }
        $id = $this->getMaxId("exam_type", "exam_type_id");
        $fielsNames = "exam_type_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",exam_type_name";
        $fieldValue .= ",'{$arrguments['exam_type_name']}'";
        if ($this->glv_connObj->insertDataInTable("exam_type", $fielsNames, $fieldValue)) {
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

    public function saveSubjectTypeInDatabase($arrguments) {
        if ($this->isRecordExsistInTable("subject_info", "WHERE subject_name like'{$arrguments['subject_name']}' and exam_type_id_fk=" . $arrguments['exam_type_name'])) {
            return '{"eventStatus":"duplicate"}';
        }
        $id = $this->getMaxId("subject_info", "subject_id");
        $fielsNames = "subject_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",exam_type_id_fk";
        $fieldValue .= ",'{$arrguments['exam_type_name']}'";
        $fielsNames .= ",subject_name";
        $fieldValue .= ",'{$arrguments['subject_name']}'";
        if ($this->glv_connObj->insertDataInTable("subject_info", $fielsNames, $fieldValue)) {
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

    public function checkSetName($setName) {
        if ($this->isRecordExsistInTable("set_info", "WHERE set_name like'" . $setName . "'")) {
            return '{"eventStatus":"duplicate"}';
        } else
            return '{"eventStatus":"not_matched"}';
    }

    public function checkUserEmail($userEmail) {
        if ($this->isRecordExsistInTable("tb_user_profile", "WHERE user_email like'" . $userEmail . "'")) {
            return '{"eventStatus":"duplicate"}';
        } else
            return '{"eventStatus":"not_matched"}';
    }

    public function checkContactNumber($userContact) {
        if ($this->isRecordExsistInTable("tb_user_profile", "WHERE contact_number like'" . $userContact . "'")) {
            return '{"eventStatus":"duplicate"}';
        } else
            return '{"eventStatus":"not_matched"}';
    }

    public function saveQueNo($arguments, $setId) {
        foreach ($arguments as $subjectQueNo) {
            $fielsNames = "set_question_id";
            $fieldValue = "'" . $this->getMaxId("set_question_info", "set_question_id") . "'";
            $fielsNames .= ",set_id_fk";
            $fieldValue .= ",'$setId'";
            $fielsNames .= ",subject_id_fk";
            $fieldValue .= ",'{$subjectQueNo['subject_id']}'";
            $fielsNames .= ",no_of_question";
            $fieldValue .= ",'{$subjectQueNo['subject_no_question']}'";
            $this->glv_connObj->insertDataInTable("set_question_info", $fielsNames, $fieldValue);
        }
    }

    public function saveSetInfo($arrguments) {
        if ($this->isRecordExsistInTable("set_info", "WHERE set_name like'{$arrguments['exam_set_name']}' and exam_type_id_fk=" . $arrguments['exam_type_name'])) {
            return '{"eventStatus":"duplicate"}';
        }
        $id = $this->getMaxId("set_info", "set_id");
        $fielsNames = "set_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",set_name";
        $fieldValue .= ",'{$arrguments['exam_set_name']}'";
        $fielsNames .= ",exam_type_id_fk";
        $fieldValue .= ",'{$arrguments['exam_type_name']}'";
        $fielsNames .= ",per_question_marks";
        $fieldValue .= ",'{$arrguments['exam_marks_per_que']}'";
        $fielsNames .= ",negative_marking";
        $fieldValue .= ",'{$arrguments['set_negative_marking']}'";
        $fielsNames .= ",duration";
        $fieldValue .= ",'{$arrguments['set_duration']}'";
        if ($this->glv_connObj->insertDataInTable("set_info", $fielsNames, $fieldValue)) {
            $result = $this->saveQueNo($arrguments['subject_question_number'], $id);
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

    public function getSetInfoInJSONString($setId) {
        $condition = $setId == "" ? "" : "where set_id like'" . $setId . "'";
        $set_info = $this->glv_connObj->fatchRecordFromTable("set_info se_in join exam_type et on se_in.exam_type_id_fk=et.exam_type_id", "*", $condition);
        $setInfo = "[";
        foreach ($set_info as $r) {
            $subject_que_info = $this->glv_connObj->fatchRecordFromTable("set_question_info sq_in join subject_info su_in on sq_in.subject_id_fk=su_in.subject_id", "*", "where sq_in.set_id_fk=" . $r['set_id']);
            $subQueInfo = "[";
            foreach ($subject_que_info as $sqi) {
                if ($subQueInfo != '[')
                    $subQueInfo = $subQueInfo . ',';
                $subQueInfo .= '{"set_question_id":"' . $sqi['set_question_id'] . '","set_id_fk":"' . $sqi['set_id_fk'] . '","no_of_question":"' . $sqi['no_of_question'] . '","subject_name":"' . $sqi['subject_name'] . '"}';
            }
            $subQueInfo = $subQueInfo . ']';



            if ($setInfo != '[')
                $setInfo = $setInfo . ',';
            $setInfo .= '{"set_id":"' . $r['set_id'] . '","set_name":"' . $r['set_name'] . '","exam_type_name":"' . $r['exam_type_name'] . '","exam_type_id_fk":"' . $r['exam_type_id_fk'] . '","per_question_marks":"' . $r['per_question_marks'] . '","negative_marking":"' . $r['negative_marking'] . '","duration":"' . $r['duration'] . '","subject_question_info":' . $subQueInfo . '}';
        }
        $setInfo = $setInfo . ']';

        echo $setInfo;
        //return json_encode($subject_info);
    }

    public function getPackageInfoInJSONString($epId) {
        $condition = $epId == "" ? "" : "where ep_id like'" . $epId . "'";
        $package_info = $this->glv_connObj->fatchRecordFromTable("exam_package ep join set_info si on ep.ep_set_id=si.set_id join exam_type et on si.exam_type_id_fk=et.exam_type_id", "*", $condition);
        echo json_encode($package_info);
    }

    public function getPackageInfoInUserInfoJSONString($userID) {
        $condition = $userID == "" ? "" : "where ep_id like'" . $userID . "'";
    }

    public function getPackageInfo($setID) {
        $condition = $setID == "" ? "" : "where ep_set_id like'" . $setID . "'";
        $package_info = $this->glv_connObj->fatchRecordFromTable("exam_package ep join set_info si on ep.ep_set_id=si.set_id join exam_type et on si.exam_type_id_fk=et.exam_type_id", "*", $condition);
        echo json_encode($package_info);
    }

    public function getPackageInfoDeatils($setID, $userId) {
        $condition = $setID == "" ? "" : "where ep_set_id like'" . $setID . "'";
        $set_info = $this->glv_connObj->fatchRecordFromTable("exam_package ep join set_info si on ep.ep_set_id=si.set_id join exam_type et on si.exam_type_id_fk=et.exam_type_id", "*", $condition);
        $ppInfo = "[";
        foreach ($set_info as $r) {
            $ppUserInfo = $this->glv_connObj->fatchRecordFromTable("package_purchasing", "*", " where pp_user_id_fk=" . $userId . " and pp_ep_id_fk=" . $r['ep_id']);

            if ($ppInfo != '[')
                $ppInfo = $ppInfo . ',';
            $ppInfo .= '{"ep_id":"' . $r['ep_id'] . '","ep_name":"' . $r['ep_name'] . '","ep_set_id":"' . $r['ep_set_id'] . '","ep_no_of_set":"' . $r['ep_no_of_set'] . '","ep_duration":"' . $r['ep_duration'] . '","ep_price":"' . $r['ep_price'] . '","ep_offer":"' . $r['ep_offer'] . '","ep_selected":"' . ($ppUserInfo == NULL ? 0 : 1) . '"}';
        }
        $ppInfo = $ppInfo . ']';
        return $ppInfo;
    }

    public function saveUserProfileDatabase($arrguments) {

        $id = $this->getMaxId("tb_user_profile", "user_id");
        $fielsNames = "user_id";
        $fieldValue = "'$id'";
        $fielsNames .= ",user_login_id";
        $fieldValue .= ",'BTOE" . $id . strtoupper(substr($arrguments['user_name'], 0, 1)) . "'";
        $fielsNames .= ",user_name";
        $fieldValue .= ",'{$arrguments['user_name']}'";
        $fielsNames .= ",user_date_of_birth";
        $fieldValue .= ",'{$arrguments['user_date_of_birth']}'";
        $fielsNames .= ",user_father_name";
        $fieldValue .= ",'{$arrguments['user_father_name']}'";
        $fielsNames .= ",user_password";
        $fieldValue .= ",'{$arrguments['user_password']}'";
        $fielsNames .= ",user_email";
        $fieldValue .= ",'{$arrguments['user_email']}'";
        $fielsNames .= ",contact_number";
        $fieldValue .= ",'{$arrguments['contact_number']}'";
        if ($this->glv_connObj->insertDataInTable("tb_user_profile", $fielsNames, $fieldValue)) {
            return '{"eventStatus":"true"}';
        } else {
            return '{"eventStatus":"false"}';
        }
    }

}
