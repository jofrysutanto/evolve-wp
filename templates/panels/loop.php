<?php
    if(empty($panels)):
        return;
    endif;

    foreach($panels as $panel): ?>
    <?=view('panel/' . $panel['acf_fc_layout'], ['panel' => $panel]); ?>
<?php endforeach; ?>