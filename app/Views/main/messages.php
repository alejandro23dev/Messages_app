<?php if (empty($messages)) { ?>
    <div class="text-center opacity-50 p-5">Esta conversación no tiene mensajes</div>
<?php }; ?>
<?php foreach ($messages as $m) { ?>
    <!-- MESSAGE RECEIVE -->
    <?php if ($m->sent_user_id == $contact[0]->id) { ?>
        <div class="d-flex justify-content-start mb-5">
            <div class="d-flex flex-column align-items-start">
                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start">
                    <?php echo $m->message; ?>
                </div>
                <span class="text-end opacity-50 mb-0 mt-1 ms-2"><?php echo date('g:i a', strtotime($m->date)); ?></span>
            </div>
        </div>
    <?php } ?>
    <!-- MESSAGE SENT -->
    <?php if ($m->sent_user_id == $user[0]->id) { ?>
        <div class="d-flex justify-content-end mb-5">
            <div class="d-flex flex-column align-items-end">
                <div class="p-5 rounded bg-light-success text-dark fw-semibold mw-lg-400px text-end">
                    <?php echo $m->message; ?>
                </div>
                <span class="text-end opacity-50 mb-0 mt-1 me-2"><?php echo date('g:i a', strtotime($m->date)); ?></span>
            </div>
        </div>
    <?php } ?>
<?php } ?>