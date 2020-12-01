<?php
/**
 * Recipe class file
 *
 * PHP Version 5.2
 *
 * @category Recipe
 * @package  Recipe
 * @author   Lorna Jane Mitchell <lorna@ibuildings.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/recipes
 */
class Config 
{ 
    public $dbhost;
    public $dbuser;
    public $dbpass;
    public $dbname;
  
    function __construct()
    {  
        $this->dbhost="localhost";
        $this->dbuser="root";
        $this->dbpass="";
        $this->dbname="taxibook";
    }
    function createConnection() 
    {
        $this->con=new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if ($this->con->connect_error) {
             die("Connection failed".$this->con->connect_error);
        } else {
            return $this->con;
        } 
    }
}
?>