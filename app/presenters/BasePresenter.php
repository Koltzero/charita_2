<?php

namespace App\Presenters;

use Nette;


class BasePresenter extends Nette\Application\UI\Presenter{
    private $database;

    public function __construct(Nette\Database\Context $database){
        $this->database = $database;
    }
    
    /** @var \App\Components\ChatControl @inject **/
    public $chatControl;
    
    public function createComponentChat(){
        return $this->chatControl->create($this);
    }
}
