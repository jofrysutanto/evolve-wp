<?php
/**
 * Helps with authenticating
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Authentication Helper</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Social Authenticator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <div class="container">
        <br>
        <?php foreach ($services as $type => $service): $service = fluent($service); ?>
        <?php if ($service['provider'] === 'instagram'): ?>
        <div class="jumbotron">
            <h1>Instagram</h1>
            <form
                method="POST"
                action="<?= route('feed.oauth', compact('type')) ?>">
                <div class="alert alert-info">
                    Ensure that the following redirect url is entered into Instagram: <br>
                    <strong><?= route('feed.oauth-redirect', compact('type')) ?></strong>
                </div>
                <p>
                    <strong>App ID:</strong>
                    <?= $service['instagram_app_id'] ?>
                </p>
                <p>
                    <strong>App Secret:</strong>
                    <?= $service['instagram_app_secret'] ?>
                </p>
                <p>
                    <strong>Account:</strong>
                    <?= $service['account'] ?>
                </p>
                <p>
                    <strong>Access Token:</strong>
                    <input type="text"
                        class="form-control"
                        value="<?= $service['access_token'] ?>"
                        readonly
                        disabled>
                    <p>
                        This access token is displayed based on config value, once you have submitted the this form, remember to update `config/social-feed.php` file.
                    </p>
                </p>
                <hr>
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </form>
        </div>
        <?php elseif ($service['provider'] === 'twitter'): ?>
        <div class="jumbotron">
            <h1>Twitter</h1>
            <form
                method="POST"
                action="<?= route('feed.oauth', compact('type')) ?>">
                <div class="alert alert-info">
                    To create twitter credentials, simply follow the instruction at:
                    <a href="https://github.com/J7mbo/twitter-api-php" target="_blank">
                        https://github.com/J7mbo/twitter-api-php
                    </a>
                </div>
                <p>
                    <strong>Account:</strong>
                    <?= $service['account'] ?>
                </p>
            </form>
        </div>
        <?php elseif ($service['provider'] === 'facebook'): ?>
        <div class="jumbotron">
            <h1>Facebook</h1>
            <form
                method="POST"
                action="<?= route('feed.oauth', compact('type')) ?>">
                <div class="alert alert-info">
                    Ensure that the following url is entered into Facebook App Domains and Site URL: <br>
                    <strong><?= config('app.url') ?></strong>
                </div>
                <p>
                    <strong>App ID:</strong>
                    <?= $service['app_id'] ?>
                </p>
                <p>
                    <strong>App Secret:</strong>
                    <?= $service['app_secret'] ?>
                </p>
                <p>
                    <strong>Account:</strong>
                    <?= $service['account'] ?>
                    <br>
                    <small>
                        Your facebook account is usually a numeric ID which can be found at: <a href="https://findmyfbid.com/" target="_blank">https://findmyfbid.com/</a>
                    </small>
                </p>
                <p>
                    <strong>Access Token:</strong>
                    <input type="text"
                        class="form-control"
                        value="<?= $service['access_token'] ?>"
                        readonly
                        disabled>
                    <p>
                        This access token is displayed based on config value, once you have submitted the this form, remember to update `config/social-feed.php` file.
                    </p>
                </p>
                <hr>
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </form>
        </div>
        <?php endif ?>
        <?php endforeach ?>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>


