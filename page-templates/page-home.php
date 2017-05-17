<?php
    /**
     * Template Name: Home
     */
?>

<style>
    body,
    main {
        position: fixed;
        min-height: 100vh;
        width: 100%;
    }
    .welcome {
        position: absolute;
        width: 100%;
        top: 50%;
        padding-left: 40px; padding-right: 40px;
        transform: translate(0, -50%);
    }
    h1 {
        font-family: "Helvetica Neue", "Arial";
        font-size: 64px;
        font-weight: 300;
        text-align: center;
    }
</style>

<div class="welcome">
    <img src="<?= asset('img/common/true-logo-footer-black.png') ?>" alt="True" class="center-block img-responsive">
    <h1>Build awesome site.</h1>
</div>