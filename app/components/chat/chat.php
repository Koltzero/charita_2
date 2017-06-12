<?php
namespace App\Components;  
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class ChatControl extends Control{
    protected $presenter;
    
    public function render(){
        $this->template->setFile(__DIR__."/chat.latte");
        $this->template->render();
    }
    
    public function create($presenter){
        $this->presenter = $presenter;
        return $this;
    }
    
    public function createComponentForm(){
        $form = new Form;
        $form->addText("email","Email");
        
        $form->addTextArea("message","Zpráva");
        
        $form->addSubmit("submit","Odeslat dotaz");
        
        $form->onSuccess[] = [$this,"onSuccess"];
        
        return $form;
    }
    
    public function onSuccess(Form $form, $values){
        $this->flashMessage("Zpráva se odeslala úspěšně!","alert alert-success");
        $this->redrawControl();
    }
}