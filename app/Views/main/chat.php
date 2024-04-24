<div class="card" id="kt_chat_messenger">
    <div class="card-header" id="kt_chat_messenger_header">
        <div class="card-title">
            <div class="d-flex justify-content-center flex-column me-3">
                <span class="fs-4 fw-bold text-gray-900 me-1 mb-2 lh-1 text-capitalize"><?php echo $contact[0]->username; ?></span>
                <div class="mb-0 lh-1">
                    <span class="fs-7 fw-semibold text-muted"><?php if (empty($contact[0]->description)) echo 'Sin descripción';
                                                                else echo $contact[0]->description; ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body" id="kt_chat_messenger_body">
        <div id="main-messages" class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-scroll="true" data-kt-scroll-height="{default: '200px', lg: '400px'}" style="max-height: 60vh;">
        </div>
    </div>
    <div class="card-footer pt-4 row" id="kt_chat_messenger_footer">
        <div class="col-10">
            <textarea class="form-control form-control-flush mb-3" rows="1" id="txt-message<?php echo $uniqid; ?>" placeholder="Escribe un mensaje a <?php echo $contact[0]->username; ?>"></textarea>
        </div>
        <div class="col-2 text-end">
            <button id="btn-send<?php echo $uniqid; ?>" class="btn btn-primary" type="button">
                <span class="indicator-label">
                    Enviar
                </span>
                <span class="indicator-progress">
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        <div class="d-flex flex-stack">
            <div class="d-flex align-items-center me-2">
                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-bs-original-title="Coming soon" data-kt-initialized="1">
                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                </button>
                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-bs-original-title="Coming soon" data-kt-initialized="1">
                    <i class="ki-duotone ki-exit-up fs-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getMessages("<?php echo $contact[0]->id; ?>");

        function startInterval() {
            if (interval) {
                clearInterval(interval);
            }

            interval = setInterval(function() {
                getMessages("<?php echo $contact[0]->id; ?>");
            }, 5000);
        }

        startInterval();

        var buttonSend = document.querySelector("#btn-send<?php echo $uniqid; ?>");

        $('#btn-send<?php echo $uniqid; ?>').on('click', function() {
            let message = $('#txt-message<?php echo $uniqid; ?>').val();
            let receiveUserID = "<?php echo $contact[0]->id; ?>";
            let sentUserID = "<?php echo $user[0]->id; ?>";

            if (message == '') {
                $('#txt-message<?php echo $uniqid; ?>').addClass('is-invalid');
            } else {
                buttonSend.setAttribute("data-kt-indicator", "on");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Home/sentMessage'); ?>",
                    data: {
                        'message': message,
                        'receiveUserID': receiveUserID,
                        'sentUserID': sentUserID
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.error == 0) {
                            $('#txt-message<?php echo $uniqid; ?>').val('');
                            getMessages("<?php echo $contact[0]->id; ?>");
                        } else if (response.error == 1) {
                            globalError();
                        }
                        buttonSend.removeAttribute("data-kt-indicator");
                    },
                    error: function(error) {
                        globalError();
                        buttonSend.removeAttribute("data-kt-indicator");
                    }
                });
            }

        });

        $('#txt-message<?php echo $uniqid; ?>').on('input change', function() {
            $(this).removeClass('is-invalid');
        });
    });
</script>