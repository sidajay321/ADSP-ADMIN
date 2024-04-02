/*document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
}, false);*/
/*=========Create XMLHttpRequste Object ===============*/
function createAjaxObject()
{
    $xhttp = null;
    if (window.XMLHttpRequest)
    {
        $xhttp = new XMLHttpRequest();
    } else
    {
        $xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    return $xhttp;
}
/*============ this function checks the number and its length ==================*/
function isNumberKeyByGAP($evt, $limitField, $limitNum, $flag) {
    if ($flag === undefined) {
        $flag = false;
    }
    $str = $limitField.value;
    $charCode = ($evt.which) ? $evt.which : $evt.keyCode;
    if ($charCode !== 8 && $charCode !== 9 && ($charCode < 48 || $charCode > 57))
    {
        //showErrorMsg($(limitField),$(limitField),"Not");
        if (!($flag && $charCode === 46 && $str.indexOf(".") === -1)) {
            return false;
        }
    }
    if ($str.indexOf(".") !== -1) {
        $str = $str.substring($str.indexOf("."));
        if ($str.length > 2) {
            return false;
        }
    }
    return checkMaxCharaterByGAP($limitField, $limitNum);
}
/*============  this function limitation in input fields  ==================*/
function checkMaxCharaterByGAP($limitField, $limitNum)
{
    if ($limitField.value.length === $limitNum) {
        return false;
    }
    return true;
}

/*=========== create show error massege function end ================*/
function showErrorMsgByGAP($showMsgafter, $inputBoxId, $msg)
{
    $showMsgafter.next("span.GAPerrmsg").remove();
    $showMsgafter.after('<span class="GAPerrmsg" style="color:#e21414;font-size:12px;">' + $msg + "</span>");
    $beforBoard = $inputBoxId.css("border");
    $inputBoxId.css("border", "none");
    $inputBoxId.css("border-bottom", "red solid 2px");
    $inputBoxId.on("focus", function () {
        $showMsgafter.next("span").remove();
        $inputBoxId.css("border", $beforBoard);
        $inputBoxId.unbind("input");
    });

}
function getRadioInputValue($parentID, $radioName) {
    $returnValue = "";
    $($parentID).find(":input").each(function () {
        if (this.type.toUpperCase() === "RADIO" && this.checked && $(this).attr("name") === $radioName) {
            $returnValue = this.value;
        }
    });
    return $returnValue;
}
/*=========== reset input function start ================*/
function emptyAllInputBoxByGAP($parentID)
{
    $firstInputId = "";
    $($parentID).find(":input").each(function () {
        switch (this.type.toUpperCase())
        {
            case "TEXT" :
            case "HIDDEN" :
            case "NUMBER" :
            case "EMAIL" :
            case "DATE" :
            case "TIME" :
            case "PASSWORD" :
            case "TEXTAREA" :
            case "SELECT-ONE" :
            case "FILE" :
                this.value = "";
                break;
            case "RADIO" :
            case "CHECKBOX" :
                this.checked = false;
        }
    });
}
/*=========== reset input function end ================*/
/*=========== validate input function start ================*/
function isValidateByGAP($parentID)
{
    $validInput = true;
    $($parentID).find(":input").each(function () {
        switch (this.type.toUpperCase())
        {
            case "TEXT" :
            case "HIDDEN" :
            case "NUMBER" :
            case "EMAIL" :
            case "DATE" :
            case "TIME" :
            case "PASSWORD" :
            case "TEXTAREA" :
            case "SELECT-ONE" :
            case "RADIO" :
            case "CHECKBOX" :
                $inputMinLength = 0;
                $inputMaxLength = 999999999;
                $inputType = "TEXT";
                if ($(this).attr("gapminlength") !== undefined)
                    $inputMinLength = parseInt($(this).attr("gapminlength"));
                if ($(this).attr("gapmaxlength") !== undefined)
                    $inputMaxLength = parseInt($(this).attr("gapmaxlength"));
                if ($(this).attr("gapinputtype") !== undefined)
                    $inputType = $(this).attr("gapinputtype").toUpperCase();
                $numbers = /^[0-9.]+$/;
                $(this).parent("div").next("span.GAPerrmsg").remove();
                if (this.value === "" && $(this).prev("label").children("span").html() === " *")
                {
                    showErrorMsgByGAP($(this).parent("div"), $(this), "Requred!");
                    $validInput = false;
                } else if (this.value !== "" && $inputType === "NUMBER" && !this.value.match($numbers))
                {
                    showErrorMsgByGAP($(this).parent("div"), $(this), "Must Be Digit(s)!");
                    $validInput = false;
                } else if (this.value !== "" && this.value.length < $inputMinLength)
                {
                    showErrorMsgByGAP($(this).parent("div"), $(this), "Must Be " + $inputMinLength + " Character!");
                    $validInput = false;
                } else if (this.value !== "" && this.value.length > $inputMaxLength)
                {
                    showErrorMsgByGAP($(this).parent("div"), $(this), "Must Be < " + $inputMaxLength + " Character!");
                    $validInput = false;
                }
        }
    });
    return $validInput;
}
/*=========== validate input function end ================*/
/*=========== create url string function start ================*/
function createURLStringByGAP($parentID)
{
    $returnURL = "";
    if (!isValidateByGAP($parentID))
        return($returnURL);
    $($parentID).find(":input").each(function () {
        switch (this.type.toUpperCase())
        {
            case "TEXT" :
            case "HIDDEN" :
            case "NUMBER" :
            case "EMAIL" :
            case "DATE" :
            case "TIME" :
            case "PASSWORD" :
            case "TEXTAREA" :
            case "SELECT-ONE" :
                if ($returnURL !== "")
                {
                    $returnURL += "&";
                }
                if ($(this).attr("gapurlname") === undefined) {
                    $urlName = this.id;
                } else {
                    $urlName = $(this).attr("gapurlname");
                }
                if ($(this).attr("gapdate") !== undefined) {
                    $value = (this.value.split("/").reverse().join("-"));
                } else {
                    $value = this.value;
                }
                $returnURL += $urlName + "=" + $value;
                break;
            case "RADIO" :
            case "CHECKBOX" :
                if (this.checked)
                {
                    if ($returnURL !== "")
                    {
                        $returnURL += "&";
                    }
                    if ($(this).attr("gapurlname") === undefined) {
                        $urlName = this.id;
                    } else {
                        $urlName = $(this).attr("gapurlname");
                    }
                    $returnURL += $urlName + "=" + this.value;
                }
                break;
        }
    });
    return($returnURL);
}
/*=========== create url string function end ================*/
//image validation start
function validateFileSizeByGAP($component, $maxSize, $msg_id, $msg)
{
    if (navigator.appName === "Microsoft Internet Explorer")
    {
        if ($component.value)
        {
            $oas = new ActiveXObject("Scripting.FileSystemObject");
            $e = $oas.getFile($component.value);
            $size = $e.size;
        }
    } else
    {
        if ($component.files[0] !== undefined)
        {
            $size = $component.files[0].size;
        }
    }
    if ($size !== undefined && $size > $maxSize)
    {
        document.getElementById($msg_id).innerHTML = $msg;
        $component.value = "";
        $component.style.backgroundColor = "#eab1b1";
        $component.focus();
        return false;
    } else
    {
        return true;
    }
}
function displayPhotoByGAP($file, $size, $msgid, $displayid, $imgsourse)
{
    $($msgid).html("");
    $file.style.backgroundColor = "rgb(49,69,89)";
    $($displayid).attr('src', $imgsourse);
    if (validateFileSizeByGAP($file, $size, $msgid, "Document size should be less than " + ($size / 1024) + "Kb !") === false)
    {
        return false;
    }
    $str = $file.value;
    $ext = $str.toString().substr($str.toString().lastIndexOf("."));
    if ($ext === ".png" || $ext === ".jpg" || $ext === ".jpeg")
    {
        if ($file.files && $file.files[0]) {
            $reader = new FileReader();
            $reader.onload = function (e) {
                $($displayid).attr('src', e.target.result);
            };
            $reader.readAsDataURL($file.files[0]);
        }
    } else
    {
        $($msgid).html("Document file should be png, jpg, jpeg!");
        $file.value = "";
        $file.style.backgroundColor = "#eab1b1";
        $file.focus();
        return false;
    }
}
//image validation end

/************ set cookies which takes cookies name , value , and expiry days of cookies **************/
function setCookie($cname, $cvalue, $exdays) {
    $d = new Date();
    $d.setTime($d.getTime() + ($exdays * 24 * 60 * 60 * 1000));
    $expires = "expires=" + $d.toUTCString();
    document.cookie = $cname + "=" + $cvalue + ";" + $expires + ";path=/";
}
/********** retrieve information of set cookies. it takes the cookies name **********/
function getCookie($cname) {
    $name = $cname + "=";
    $decodedCookie = decodeURIComponent(document.cookie);
    $ca = $decodedCookie.split(';');
    for ($i = 0; $i < $ca.length; $i++) {
        var c = $ca[$i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf($name) === 0) {
            return c.substring($name.length, c.length);
        }
    }
    return "";
}
/********** delete cookies. it takes the cookies name **********/
function delete_cookie($cname) {
    document.cookie = $cname + '=; path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
/*============== Show message dialog =========*/
function showAlertMessage($msg, $type)
{
    BootstrapDialog.show({
        title: 'Message From <b>Admin</b>!',
        message: $msg,
        type: $type,
        size: BootstrapDialog.SIZE_SMALL
    });
}
function JSONObjectToOptionTagByGAP($JSONObj,$emptyMsg)
{
    $returnValue = '<option value="">'+$emptyMsg+'</option>';
    for ($i = 0; $i < $JSONObj.length; $i++)
    {
        $returnValue += '<option value="' + $JSONObj[$i].comboID + '">';
        $returnValue += $JSONObj[$i].comboValue + '</option>';
    }
    return $returnValue;
}
function JSONObjectToSelectOptionTagByGAP($JSONObj, $value)
{
    $returnValue = '<option value=""></option>';
    for ($i = 0; $i < $JSONObj.length; $i++)
    {
        $returnValue += '<option value="' + $JSONObj[$i].comboID + '"';
        if ($JSONObj[$i].comboID === $value) {
            $returnValue += " selected";
        }
        $returnValue += '>' + $JSONObj[$i].comboValue + '</option>';
    }
    return $returnValue;
}
function JSONStringToOptionTagByGAP($JSONString,$emptyMsg)
{
    $JSONObj = JSON.parse($JSONString);
    return JSONObjectToOptionTagByGAP($JSONObj,$emptyMsg);
}
function JSONStringToSelectedOptionTagByGAP($JSONString, $value)
{
    $JSONObj = JSON.parse($JSONString);
    return JSONObjectToSelectOptionTagByGAP($JSONObj, $value);
}
function loadMenuPageInDivByGAP($parent, $page)
{
    $("#sidebar" + " ul li").removeClass("active");
    $("#sidebar" + " ul li ul li").removeClass("active");
    $($parent).addClass("active");
    setCookie("privateMenuInfoOfCG", "open", 1 / 1440);
    $("#waitingDiv").show();
    $("#windowpage").load($page, function () {
        window.scrollTo(0, 0);
        $("#waitingDiv").hide();
    });
}
/*Code For Date validation
 * var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
 // Match the date format through regular expression
 $isValidDate = true;
 if (this.value.match(dateformat)) {
 $pdate = this.value.split('/');
 $dd = parseInt($pdate[0]);
 $mm = parseInt($pdate[1]);
 $yy = parseInt($pdate[2]);
 // Create list of days of a month [assume there is no leap year by default]
 var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
 if ($mm === 1 || $mm > 2) {
 if ($dd > ListofDays[$mm - 1]) {
 $isValidDate = false;
 }
 }
 if ($mm === 2) {
 $lyear = false;
 if ((!($yy % 4) && $yy % 100) || !($yy % 400)) {
 $lyear = true;
 }
 if (($lyear === false) && ($dd >= 29)) {
 $isValidDate = false;
 }
 if (($lyear === true) && ($dd > 29)) {
 $isValidDate = false;
 }
 }
 } else {
 $isValidDate = false;
 }
 if (!$isValidDate) {
 showErrorMsgByGAP($(this).parent("div"), $(this), "Invalid Date !");
 $validInput = false;
 }
 }
 */  