<?php if (empty($contacts)) { ?>
    <div class="text-center bg-secondary opacity-50 pt-5 pb-5 ">
        No hay contactos
    </div>
<?php } ?>
<?php foreach ($contacts as $c) { ?>
    <?php
    $dateA = $c->lastSession;
    $dateB = date('Y-m-d H:i:s');

    $diff = abs(strtotime($dateB) - strtotime($dateA));

    if ($diff < 60) {
        $diff = 'Ultima vez hace menos de un minuto';
    } else if ($diff < 3600) {
        $diff = 'Ultima vez hace ' . floor($diff / 60) . ' minutos';
    } else if ($diff < 86400) {
        $diff = 'Ultima vez hace ' . floor($diff / 3600) . ' horas';
    } else {
        $diff = 'Ultima vez hace ' . floor($diff / 86400) . ' días';
    }; ?>
    <div class="d-flex flex-stack py-4 hover cursor-pointer user<?php echo $uniqid; ?>" data-user-id="<?php echo $c->id; ?>">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-55px symbol-circle">
                <?php if (!empty($c->avatar)) { ?>
                    <img src="data:image/png;base64,<?php echo base64_encode($c->avatar); ?>" class="border border-2 border-secondary" alt="Avatar">
                <?php } else { ?>
                    <span class="symbol-label bg-light-warning text-warning fs-6 fw-bolder text-uppercase border border-2 border-secondary"><?php echo $c->username[0]; ?></span>
                <?php } ?>
            </div>
            <div class="ms-5">
                <span class="fs-5 fw-bold text-gray-900 mb-2 text-capitalize"><?php echo $c->username; ?></span>
                <?php if ($c->status == 0) { ?>
                    <div class="fw-semibold text-muted animate__animated animate__lightSpeedInRight"><?php echo $diff; ?></div>
                <?php } else { ?>
                    <div>
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-semibold text-muted animate__animated animate__lightSpeedInRight">En línea</span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="separator separator-dotted <?php if (sizeof($contacts) == 1) echo 'd-none'; ?>"></div>
<?php } ?>

<script>
    $('.user<?php echo $uniqid; ?>').on('click', function() {
        let userID = $(this).attr('data-user-id');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/getUserChat'); ?>",
            data: {
                'userID': userID
            },
            dataType: "html",
            success: function(response) {
                $('#main-chat').html('');
                $('#main-chat').html(response);
            },
            error: function(error) {
                globalError();
            }
        });
    });
</script>