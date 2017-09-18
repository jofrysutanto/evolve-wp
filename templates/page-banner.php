<?php
    /**
     * @param type
     * @param line1
     * @param line2
     * @param downArrow
     * @param showButton
     * @param button
     * @param bannerImage
     * @param videoMP4
     * @param videoWebM
     */

    $bgImage =  '';

    if($type == 'VIDEO'):

    else:
        $bgImage = $bannerImage['sizes']['full-height-banner'];
    endif;

?>

<div class="page-banner" style="background-image: url('<?=$bgImage?>')">
    
    <?php if($type == 'VIDEO'): ?>
    <div class="page-banner__video">
        <video autoplay="true" loop="true">
            <source src="<?=$videoMP4['url']?>" type="video/mp4">
        </video>
    </div>
    <?php endif; ?>

    <div class="page-banner__overlay">
        <div class="layout-table">
            <div class="layout-table__cell">
                <div class="container">
                    <?php if(!empty($line1)):?>
                    <h1><?=$line1?></h1>
                    <?php endif; ?>

                    <?php if(!empty($line2)):?>
                    <h2><?=$line2?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    </div>
</div>