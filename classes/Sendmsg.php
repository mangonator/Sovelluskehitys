<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Sendmsg
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        
        // login via post data (if user just submitted a login form)
        if (isset($_POST["data"])) {
            $this->doSendMessage();
        }
    }

    /**
     * log in with post data
     */
    public function doSendMessage()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "You are not logged in";
        } elseif (empty($_POST['send'])) {
            $this->errors[] = "Textfield was empty";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['send'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                 $send = $this->db_connection->real_escape_string($_POST['send']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                //$sql = "INSERT INTO webchat_chat (author, text) VALUES ('" . $user_name . "','" . $send . "');";
                $sql = "INSERT INTO webchat_chat (author, text) VALUES ('" . $user_name . "','" . $send . "');";
                $result_of_login_check = $this->db_connection->query($sql);

                
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

  

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    
}
