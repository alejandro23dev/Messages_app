<!DOCTYPE html>
<html>

<head>
    <title><?php echo COMPANY_NAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="hola" />
    <meta name="keywords" content="barber, hairdresser, hairstylist, hair salon, stylist, grooming salon, groomer, haircutter, hair stylist, hair care, estilista, estilismo, cortador de pelo, salón de belleza, estética, peluquería masculina, peluquería femenina, tijeras, afeitado, aparato de afeitar" />
    <link rel="canonical" href="<?php echo base_url('/'); ?>" />
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/media/logos/bhiconv2.ico'); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?php echo base_url('public/assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/global/plugins.bundle.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.bundle.css'); ?>" type="text/css" />
    <link href="<?php echo base_url('public/assets/sass/components/_variables.scss'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/animate.css/animate.min.css'); ?>" type="text/css" />

    <script>
        var hostUrl = "<?php echo base_url('public/assets/'); ?>";
        document.documentElement.setAttribute("data-bs-theme", "light");
    </script>

    <script src="<?php echo base_url('public/assets/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/scripts.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/widgets.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/custom/datatables/datatables.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/custom/widgets.js'); ?>"></script>

    <!-- ALERTS -->
    <script>
        function simpleAlert(text, icon) {
            Swal.fire({
                text: text,
                icon: icon,
                buttonsStyling: false,
                confirmButtonText: "<?php echo lang('Text.ok'); ?>",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        function globalError() {
            Swal.fire({
                text: "<?php echo lang('Text.error_label_msg'); ?>",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "<?php echo lang('Text.ok'); ?>",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        function simpleSuccessAlert(text) {
            Swal.fire({
                position: "top-end",
                text: text,
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 3000,
            });
        }
    </script>

    <script>
        var interval;

        function getMessages(contactID) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Home/getMessagesChat'); ?>",
                data: {
                    'contactID': contactID
                },
                dataType: "html",
                success: function(response) {
                    $('#main-messages').html('');
                    $('#main-messages').html(response);
                },
                error: function(error) {
                    globalError();
                }
            });
        }
    </script>

</head>

<body id="kt_app_body" data-kt-app-layout="dark-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="app-modal"></div>
            <div class="app-main flex-column flex-row-fluid app-container container-xxl" id="kt_app_main">
                <!-- Page -->
                <?php echo view($page); ?>
            </div>
            <!-- Footer -->
            <div id="kt_app_footer" class="app-footer">
                <div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                    <div class="text-dark order-2 order-md-1">
                        <a href="https://barberhi.com/" target="_blank">
                            <span class="text-gray-800"><?php echo POWERED_BY; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>