<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 animate__animated animate__shakeX">TextMe</h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div id="userStatus-1<?php echo $uniqid; ?>" <?php if ($user[0]->status == 1) echo 'hidden'; ?>>
                    <button type="button" class="btn btn-sm fw-bold btn-primary btn-change-status<?php echo $uniqid; ?>" data-status="1">Mostrar En Línea</button>
                </div>
                <div id="userStatus-0<?php echo $uniqid; ?>" <?php if ($user[0]->status == 0) echo 'hidden'; ?>>
                    <button type="button" class="btn btn-sm fw-bold btn-danger btn-change-status<?php echo $uniqid; ?>" data-status="0">Ocultar En Línea</button>
                </div>
                <span id="btn-logout<?php echo $uniqid; ?>" class="btn btn-sm fw-bold btn-secondary">Cerrar Sesión</span>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <div class="card card-flush">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <form class="w-100 position-relative" autocomplete="off">
                                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" class="form-control form-control-solid px-13" name="search" value="" placeholder="Nombre de usuario o Email..">
                            </form>
                        </div>
                        <div class="card-body pt-5" id="kt_chat_contacts_body">
                            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px" style="max-height: 615px;">
                                <div class="text-center opacity-50">Mis Contactos</div>
                                <div class="separator mt-2 mb-2"></div>
                                <div id="main-contacts"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-chat" class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="fs-5 animate__animated animate__jackInTheBox text-center p-20 opacity-50">
                        Seleccione un contacto para chatear
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getContacts();

        setInterval(function() {
            getContacts();
        }, 30000);

        // LAST ACTIVITY
        let lastActivity = new Date().getTime();

        document.addEventListener('click', function() {
            lastActivity = new Date().getTime();
        });

        document.addEventListener('keydown', function() {
            lastActivity = new Date().getTime();
        });

        const intervalLastActivity = setInterval(function() {
            let currentTime = new Date().getTime();
            let inactivityTime = currentTime - lastActivity;
            if (inactivityTime > 60000) {
                changeStatus(0, "<?php echo $user[0]->id; ?>");
                clearInterval(intervalLastActivity);
            }
        }, 1000);
        // END LAST ACTIVITY

        $('#btn-logout<?php echo $uniqid; ?>').on('click', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Home/changeStatus'); ?>",
                data: {
                    'status': 0,
                    'userID': "<?php echo $user[0]->id; ?>"
                },
                dataType: "json",
                success: function(response) {
                    if (response.error == 0)
                        window.location.href = "<?php echo base_url('Authentication/login'); ?>";
                    else if (response.error == 1)
                        globalError();
                    else if (response.error == 2)
                        window.location.href = "<?php echo base_url('Authentication/login?session=expired'); ?>";
                },
                error: function(error) {
                    globalError();
                }
            });
        });

        $('.animate__animated').each(function() {
            this.style.setProperty('--animate-duration', '2.0s');
        });

        $('.btn-change-status<?php echo $uniqid; ?>').on('click', function() {
            let status = $(this).attr('data-status');
            $(this).attr('disabled', true);
            changeStatus(status, "<?php echo $user[0]->id; ?>");
        });

        function getContacts() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Home/getContacts'); ?>",
                data: {
                    'uniqid': "<?php echo $uniqid; ?>"
                },
                dataType: "html",
                success: function(response) {
                    $('#main-contacts').html('');
                    $('#main-contacts').html(response);
                },
                error: function(error) {
                    globalError();
                }
            });
        }

        function changeStatus(status, userID) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Home/changeStatus'); ?>",
                data: {
                    'status': status,
                    'userID': userID
                },
                dataType: "json",
                success: function(response) {
                    if (response.error == 0) {
                        if (status == 0) {
                            $('#userStatus-0<?php echo $uniqid; ?>').attr('hidden', true);
                            $('#userStatus-1<?php echo $uniqid; ?>').removeAttr('hidden');
                        } else if (status == 1) {
                            $('#userStatus-1<?php echo $uniqid; ?>').attr('hidden', true);
                            $('#userStatus-0<?php echo $uniqid; ?>').removeAttr('hidden');
                        }
                    } else if (response.error == 1)
                        globalError();
                    else if (response.error == 2)
                        window.location.href = "<?php echo base_url('Authentication/login?session=expired'); ?>";
                    $('.btn-change-status<?php echo $uniqid; ?>').removeAttr('disabled');
                },
                error: function(error) {
                    $('.btn-change-status<?php echo $uniqid; ?>').removeAttr('disabled');
                    globalError();
                }
            });
        }
    });
</script>