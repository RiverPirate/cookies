$username = 'admin';
 $password = 'letmein';
 if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
 {
 if ($_SERVER['PHP_AUTH_USER'] === $username && $_SERVER['PHP_AUTH_PW'] === $password)
 echo "You are now logged in";
 else die("Invalid username/password combination");
 }
 else{
 header('WWW-Authenticate: Basic realm="Restricted Area"');
 header('HTTP/1.0 401 Unauthorized');
 die ("Please enter your username and password");
 }
 function destroy_session_and_data()
 {
 session_start();
 $_SESSION = array();
 setcookie(session_name(), '', time() - 2592000, '/');
 session_destroy();
 }
 session_start();
 if (isset($_SESSION['username']))
 {
 $forename = $_SESSION['forename'];
 $surname = $_SESSION['surname'];
 destroy_session_and_data();
 echo htmlspecialchars("Welcome back $forename.<br>
 Your full name is $forename $surname.");
 }
 else echo "Please <a href='authenticate2.php'>click here</a> to log in.";
 function destroy_session_and_data()
 {
 $_SESSION = array();
 setcookie(session_name(), '', time() - 2592000, '/');
 session_destroy();
 }
 session_start();
 if (!isset($_SESSION['initiated']))
 {
 session_regenerate_id();
 $_SESSION['initiated'] = 1;
 }
 if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
 else ++$_SESSION['count'];
 echo $_SESSION['count'];

?>
