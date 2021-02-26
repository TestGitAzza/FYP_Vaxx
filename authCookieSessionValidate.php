<?php
require_once "Auth.php";
require_once "Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (!empty($_SESSION["member_id"])) {
    $isLoggedIn = true;
}
// Check if loggedin session exists
else if (!empty($_COOKIE["member_login"]) && !empty($_COOKIE["random_password"]) && !empty($_COOKIE["random_selector"])) {
    // Initiate auth token verification diirective to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;

    // Get token for username
    $userToken = $auth->getTokenByUsername($_COOKIE["member_login"], 0);

    // Validate random password cookie with database
    if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
        $isPasswordVerified = true;
    }

    // Validate random selector cookie with database
    if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
        $isSelectorVerified = true;
    }

    // check cookie expiration by date
    if ($userToken[0]["expiry_date"] >= $current_date) {
        $isExpiryDareVerified = true;
    }

    // Redirect if all cookie based validation retuens true
    // Else, mark the token as expired and clear cookies
    if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDareVerified) {
        $isLoggedIn = true;

        $user = $auth->getMemberByUsername($_COOKIE["member_login"]);
        $_SESSION['id'] = $user[0]["id"];
        $_SESSION['uwlspecialid'] = $user[0]["id"];
        $_SESSION['user_name'] = $user[0]["user_name"];
        $_SESSION['user_fullname'] = $user[0]["user_fullname"];
        $_SESSION['user_email'] = $user[0]["user_email"];
        $_SESSION['user_role'] = $user[0]["user_role"];
        $_SESSION['user_dp'] = $user[0]["user_dp"];
        $_SESSION["member_id"] = $user[0]["id"];
    } else {
        if (!empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
        // clear cookies
        $util->clearAuthCookie();
    }
}
