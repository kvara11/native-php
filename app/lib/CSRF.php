<?php 

/**
 * Handle Cross Site Request Forgery
 * 
 * @author Craig <craig@analogrepublic.com>
 */
class CSRF {

	/**
	 * Check to see if the CSRF token is valid
	 * 
	 * @return Boolean
	 */
	public static function check() {
	    if(isset($_SESSION['csrf_token']) && isset($_POST['csrf_token'])) {
	        return ($_POST['csrf_token'] === $_SESSION['csrf_token']);
	    }

	    return false;
	}

	/**
	 * Grab the token stored in the session
	 * 
	 * @return string
	 */
	public static function getToken() {
	    return $_SESSION['csrf_token'];
	}

	/**
	 * Get the form field which holds the token
	 * 
	 * @return String
	 */
	public static function getField() {
		return '<input type="hidden" name="csrf_token" value="' . self::getToken() . '">';
	}

	/**
	 * Generate a new token
	 * 
	 * @return String
	 */
	public static function generate() {
		$rand = str_shuffle((string)time());
		$token = md5($rand);
		$_SESSION['csrf_token'] = $token;
		return $token;
	}

}