$("#login_request").on("click", function () {
    $("#loginform").attr('action', './custom/rest/request.php');
});


$("#bank_tranfer_entry_form").validate({
    rules: {
        bt_bank_receipt_no: {required: true},
        bt_dateofdonation: {required: true},
        bt_dd_id: {required: true},
        bt_amount: {required: true},
        bt_reason: {required: true},
        bt_mode: {required: true},
        bt_transaction_id: {required: true}
    },
    messages: {
        bt_bank_receipt_no: {required: "Required"},
        bt_dateofdonation: {required: "Required"},
        bt_dd_id: {required: "Required"},
        bt_amount: {required: "Required"},
        bt_reason: {required: "Required"},
        bt_mode: {required: "Required"},
        bt_transaction_id: {required: "Required"}
    }
});
$("#cash_entry_form").validate({
    rules: {
        ce_receipt_number: {required: true},
        ce_donation_date: {required: true},
        ce_dd_id: {required: true},
        ce_amount: {required: true},
        ce_reason: {required: true},
        ce_mode: {required: true}
    },
    messages: {
        ce_receipt_number: {required: "Required"},
        ce_donation_date: {required: "Required"},
        ce_dd_id: {required: "Required"},
        ce_amount: {required: "Required"},
        ce_reason: {required: "Required"},
        ce_mode: {required: "Required"}
    }
});
$("#donor_registration_form").validate({
    rules: {
        dd_id: {required: true},
        dd_code: {required: true},
        dd_name: {required: true},
        dd_address: {required: true},
        dd_city: {required: true},
        dd_contact_number: {required: true, maxlength: 10, minlength: 10},
        dd_email_id: {required: true},
        dd_pan_no: {required: true, maxlength: 10, minlength: 10}
    },
    messages: {
        dd_id: {required: "Required"},
        dd_code: {required: "Required"},
        dd_name: {required: "Required"},
        dd_address: {required: "Required"},
        dd_city: {required: "Required"},
        dd_contact_number: {required: "Required", maxlength: "Not more than 10", minlength: "Not less than 10"},
        dd_email_id: {required: "Required"},
        dd_pan_no: {required: "Required", maxlength: "Not more than 10", minlength: "Not less than 10"}
    }
});
$("#volunteer_registration_form").validate({
    rules: {
        volunteer_name: {required: true},
        address: {required: true},
        city: {required: true},
        contact_number: {required: true, maxlength: 10, minlength: 10},
        email_id: {required: true},
        pan_number: {required: true, maxlength: 10, minlength: 10},
        df_id: {required: true, maxlength: 8, minlength: 8},
        password: {required: true},
        confirm_passsword: {required: true}
    },
    messages: {
        volunteer_name: {required: "Required"},
        address: {required: "Required"},
        city: {required: "Required"},
        contact_number: {required: "Required", maxlength: "Not more than 10", minlength: "Not less than 10"},
        email_id: {required: "Required"},
        pan_number: {required: "Required", maxlength: "Not more than 10", minlength: "Not less than 10"},
        df_id: {required: "Required", maxlength: "Not more than 8", minlength: "Not less than 8"},
        password: {required: "Required"},
        confirm_passsword: {required: "Required"}
    }
});
function fetchDonorInfo(donorid)
{
    $ret = $.ajax({
        url: './custom/rest/request.php',
        type: 'POST',
        data: {fetch_donor_info: 'true', com_id: $(donorid).val()},
        async: false
    }).responseText;
    //console.log($ret);
    $obj = JSON.parse($ret);
    $("#dd_contact_number").val($obj.dd_contact_number);
    $("#dd_email_id").val($obj.dd_email_id);
    $("#dd_pan_no").val($obj.dd_pan_no);
    $("#dd_address").val($obj.dd_address);
}
function checkPassword()
{
    if ($('#confirm_passsword').val() !== $('#password').val())
    {
        $('#password').val('');
        $('#confirm_passsword').val('');
        $('#password').focus();
    }
}
function showimagepreview(input, id)
{
    var file = input.value;
    var len = file.length;
    var ext = file.slice(len - 4, len);
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.PNG|\.JPG|\.JPEG|\.pdf|\.PDF)$/i;
    if (!allowedExtensions.exec(file)) {
        input.value = "";
        Swal.fire({title: "Dhyan Foundation", text: "Only .pdf,.png.jpg extension allowed.", type: "danger", confirmButtonColor: "#556ee6"});
    }
    if (ext == ".pdf" || ext == ".PDF")
    {
        $("#us_photo_show").hide();
        $("#pdfViewer").show();
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';
        var file = input.files[0];
        if (file.type == "application/pdf") {
            var fileReader = new FileReader();
            fileReader.onload = function () {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function (pdf) {
                    console.log('PDF loaded');
                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function (page) {
                        console.log('Page loaded');
                        var scale = 1.5;
                        var viewport = page.getViewport({scale: scale});
                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;
                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function () {
                            console.log('Page rendered');
                        });
                    });
                }, function (reason) {
                    // PDF loading error
                    console.error(reason);
                });
            };
            fileReader.readAsArrayBuffer(file);
        }


    } else {
        $("#us_photo_show").show();
        $("#pdfViewer").hide();
        if (input.files && input.files[0])
        {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
            filerdr.readAsDataURL(input.files[0]);
        }
    }
}