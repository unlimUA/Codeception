<?php
$mail = 'b';
$username = 'QA TEST';
$email = $mail.'@freeletter.me';
$pass = '12345678';
$pass_conf = '12345678';


class LoginPopUp
{
	public static $URL = '/';
	public static $loginPopup = '//*[@id="popup-login"]';
	public static $createAccountLink = 'Create account';
	public static $forgotPasswordLink = 'Forgot password?';
	public static $emailField = "#email";
	public static $passwordField = "#password";
	public static $loginButton = "#loginButton";
	public static $logoutButton = "#logout";
	public static $imgAvatar = "img.avatar";
}

class ForgotPopUp
{
	public static $passwordLink = '//*[@id="forgot-password"]';
	public static $emailField = '//*[@id="email"]';
	public static $resetButton = '//*[@id="resetPasswordButton"]';
}

class Registration
{
	public static $registrationlink = '#popup-registration';
	public static $usernameField = '#username';
	public static $emailField = '#email';
	public static $passwordField = '#password';
	public static $confirmPasswordField = '#password_confirmation';
	public static $registrationButton = '#registrationButton';
}


?>