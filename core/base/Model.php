<?php
namespace core\base;

/**
 * Description of Model
 *
 * @author Root
 */
class Model {
    
    public $pdo;
    public $table; 

    
    public function __construct() {
        require PATH['core'].'/PDOExtended.php';
        
        $this->pdo = new \PDOExtended("mysql:host=127.0.0.1;dbname=fabiwork;charset=utf8",'root','');
    }
}
