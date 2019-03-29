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
        background-color: #393939;
        color: #fff;
        background: #232526;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #414345, #232526);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #414345, #232526); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    .welcome {
        position: absolute;
        width: 100%;
        top: 50%;
        padding-left: 40px; padding-right: 40px;
        transform: translate(0, -50%);
    }
    .welcome-logo {
        position: relative;
        display: block;
        width: 90px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
    }
    h1 {
        font-family: "Helvetica Neue", "Arial";
        font-size: 64px;
        font-weight: 600;
        text-align: center;
    }
</style>

<div class="welcome">
    <img class="welcome-logo" src="<?= asset('img/common/true-logo-white.svg') ?>" alt="True" class="img-fluid">
    <h1>Build awesome site.</h1>
</div>