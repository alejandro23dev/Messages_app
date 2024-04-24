<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">
                <!--begin::Form-->
                <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3"><?php echo COMPANY_NAME; ?></h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">Introduzca sus credenciales</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Login options-->
                    <div class="row g-3 mb-9">
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <!--begin::Google link=-->
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3">Inicie Sesión con Google</a>
                            <!--end::Google link=-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <!--begin::Google link=-->
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3">
                                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3">Inicie Sesión con Apple</a>
                            <!--end::Google link=-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Login options-->
                    <!--begin::Separator-->
                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">O con su Email</span>
                    </div>
                    <div class="fv-row mb-8 fv-plugins-icon-container">
                        <input id="txt-email<?php echo $uniqid; ?>" type="text" placeholder="Correo Electrónico" class="form-control email<?php echo $uniqid;?> bg-transparent required<?php echo $uniqid; ?>">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="fv-row mb-3 fv-plugins-icon-container">
                        <input id="txt-pass<?php echo $uniqid; ?>" type="password" placeholder="Contraseña" autocomplete="off" class="form-control bg-transparent required<?php echo $uniqid; ?>">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <a href="#" class="link-primary">Olvide mi contraseña ?</a>
                    </div>
                    <div class="d-grid mb-10">
                        <button type="button" id="btn-login<?php echo $uniqid; ?>" class="btn btn-primary">
                            <span class="indicator-label">Iniciar Sesión</span>
                            <span class="indicator-progress">Iniciando Sesión...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <div class="text-gray-500 text-center fw-semibold fs-6">No tienes una cuenta?
                        <a href="../../demo1/dist/authentication/layouts/corporate/sign-up.html" class="link-primary">Registrarme</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
            <!--begin::Languages-->
            <div class="me-10">
                <!--begin::Toggle-->
                <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                    <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/spain.svg" alt="">
                    <span data-kt-element="current-lang-name" class="me-1">Español</span>
                    <span class="d-flex flex-center rotate-180">
                        <i class="ki-duotone ki-down fs-5 text-muted m-0"></i>
                    </span>
                </button>
                <!--end::Toggle-->
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
                            <span class="symbol symbol-20px me-4">
                                <img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/united-states.svg" alt="">
                            </span>
                            <span data-kt-element="lang-name">English</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                            <span class="symbol symbol-20px me-4">
                                <img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/spain.svg" alt="">
                            </span>
                            <span data-kt-element="lang-name">Español</span>
                        </a>
                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Languages-->
            <!--begin::Links-->
            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                <a href="#" target="_blank">Terminos</a>
                <a href="#" target="_blank">Planes</a>
                <a href="#" target="_blank">Contactanos</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Body-->
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(assets/media/misc/auth-bg.png)">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
            <!--begin::Logo-->
            <a href="../../demo1/dist/index.html" class="mb-0 mb-lg-12">
                <img alt="Logo" src="assets/media/logos/custom-1.png" class="h-60px h-lg-75px">
            </a>
            <!--end::Logo-->
            <!--begin::Image-->
            <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="assets/media/misc/auth-screens.png" alt="">
            <!--end::Image-->
            <!--begin::Title-->
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
                <br>and provides some background information about
                <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                <br>work following this is a transcript of the interview.
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Aside-->
</div>

<script>
    $(document).ready(function() {
        $('#btn-login<?php echo $uniqid; ?>').on('click', function() {
            let result = checkRequiredValues();
            if (result == 0) {
                let resultEmail = checkEmailFormat();
                if (resultEmail == 0) {
                    $('#btn-login<?php echo $uniqid; ?>').attr('disabled', true);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('Authentication/loginProccess'); ?>",
                        data: {
                            'email': $('#txt-email<?php echo $uniqid; ?>').val(),
                            'pass': $('#txt-pass<?php echo $uniqid; ?>').val()
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.error == 0) {
                                window.location.href = "<?php echo base_url('Home/main'); ?>";
                            } else if (response.error == 1) {
                                if (response.msg == 'EMAIL_NOT_FOUND') {
                                    simpleAlert('<?php echo lang('Text.invalid_credentials_msg') ?>', 'warning');
                                    $('#txt-email<?php echo $uniqid; ?>').addClass('required is-invalid');
                                    $('#txt-pass<?php echo $uniqid; ?>').addClass('required is-invalid');
                                } else if (response.msg == 'USER_INACTIVE') {
                                    simpleAlert('<?php echo lang('Text.user_inactive_msg'); ?>', 'warning');
                                } else if (response.msg == 'INVALID_PASSWORD') {
                                    simpleAlert('<?php echo lang('Text.invalid_password_msg'); ?>', 'warning');
                                    $('#txt-pass<?php echo $uniqid; ?>').addClass('is-invalid');
                                    $('#btn-login<?php echo $uniqid; ?>').removeAttr('disabled');
                                } else {
                                    globalError();
                                    $('#btn-login<?php echo $uniqid; ?>').removeAttr('disabled');
                                }
                                $('#btn-login<?php echo $uniqid; ?>').removeAttr('disabled');
                            }
                        },
                        error: function(error) {
                            globalError();
                            $('#btn-login<?php echo $uniqid; ?>').removeAttr('disabled');
                        }
                    });
                } else
                    simpleAlert('<?php echo lang('Text.invalid_email_format_msg'); ?>', 'warning');
            } else
                simpleAlert('<?php echo lang("Text.required_values_msg"); ?>', 'warning');
        });

        function checkRequiredValues() {
            let result = 0;
            let value = "";
            $('.required<?php echo $uniqid; ?>').each(function() {
                value = $(this).val();
                if (value == "") {
                    $(this).addClass('is-invalid');
                    result = 1;
                }
            });
            return result;
        }

        $('.required<?php echo $uniqid; ?>').on('focus', function() {
            $(this).removeClass('is-invalid');
        });

        function checkEmailFormat() {
            let inputValue = '';
            let response = 0;
            let regex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
            $('.email<?php echo $uniqid;?>').each(function() {
                inputValue = $(this).val();
                if (!regex.test(inputValue)) {
                    $(this).addClass('is-invalid');
                    response = 1;
                }
            });
            return response;
        }

        var session = "<?php echo $session; ?>";

        if (session == "expired") {
            simpleAlert("<?php echo lang('Text.session_expired_msg'); ?>", "error");
        }

        document.addEventListener("DOMContentLoaded", function() {
            let form = document.getElementById("kt_login");
            form.addEventListener("keypress", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    $('#btn-login<?php echo $uniqid; ?>').trigger('click');
                }
            });
        });
    });
</script>