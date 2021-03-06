<style type="text/css">
  body.login {
      position: relative;
      background-color: #f6f9fc;
      background-position: bottom center;
      background-repeat: no-repeat;
  }
  .login h1 a {
      filter: grayscale(1);
      opacity: 0.1;
  }
  .login #login {
      width: 340px;
  }
  .login form#loginform {
      background-color: transparent;
      box-shadow: none;
      padding-bottom: 0;
      border: 0;
  }
  .login .button.wp-hide-pw {
    top: 6px;
    right: 3px;
  }
  .login form#loginform label[for="user_login"],
  .login form#loginform label[for="user_pass"] {
      font-size: 11px;
      text-transform: uppercase;
  }
  .login form#loginform input[type="text"],
  .login form#loginform input[type="password"] {
      padding: 15px 15px;
      height: auto;
      border: 0;
      border-radius: 3px;
      background-color: #fff;
      box-shadow: 0 1px 3px 0 #cfd7df;
      font-size: 1.1rem;
  }
  .login form#loginform input[type="text"]::placeholder,
  .login form#loginform input[type="password"]::placeholder {
      color: #ddd;
  }
  .login form#loginform input:-webkit-autofill,
  .login form#loginform input:-webkit-autofill:hover,
  .login form#loginform input:-webkit-autofill:focus,
  .login form#loginform input:-webkit-autofill:active  {
      background-color: none;
  }
  .login form#loginform .forgetmenot {
      float: none;
  }
  .login form#loginform .submit {
      margin-top: 15px;
  }
  .login form#loginform .button-primary {
      float: none;
      width: 100%;
      padding: 5px 30px;
      box-shadow: none;
      border: 0;
      height: 40px;
      font-size: 0.9rem;
      text-transform: uppercase;
      text-shadow: none;
  }
</style>
<script>
    (function () {
        let byId = document.getElementById;
        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('user_login').setAttribute("placeholder", "Username");
            document.getElementById('user_pass').setAttribute("placeholder", "Password");
            document.getElementById('loginform').onsubmit = () => {
                document.getElementById('wp-submit')
                    .setAttribute('value', 'Please wait...');
                document.getElementById('wp-submit')
                    .setAttribute('disabled', 'disabled');
            }
        });
    })();
</script>
