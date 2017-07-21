<?php



namespace core\base;

/**
 * Description of View
 *
 * @author Root
 */
class View {
    public $route;
    
    
    /**
     * текущий вид
     * @var string 
     */
    
    public $tpl;
    
    /**
     * текущий шаблон
     * @var string
     */
    
    public $layout;
    
    
    
    private $fenom;


    public function __construct($route,$tpl,$layout) {
        $this->route = $route;
        
        if ($layout === false) {
             $this->layout = false;
        } else {
              $this->tpl = $tpl;      
              $this->layout = $layout;
        }  
    }
    
    public function render(array $data = []) {
      
      \Fenom::registerAutoload();

      $this->fenom = \Fenom::factory(PATH['app'] . '/views',PATH['core'] . '/libs/Fenom/cache', \Fenom::DISABLE_CACHE);
      
      $this->fenom->addAccessorSmart("errors", "errors", \Fenom::ACCESSOR_PROPERTY);
      
      $this->fenom->errors = $GLOBALS['validErrors'];
      
      extract($data);
      
      if($this->layout !== false){
         require PATH['app']. "/views/layouts/{$this->layout}.php"; 
     }
   }
   
} 