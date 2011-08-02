<?php

class ErrorController extends Zend_Controller_Action {
    
    public function errorAction(){
        
        $errorHandler = $this->_getParam('error_handler'); // !!!!!
        $exception = $errorHandler->exception;
        
        $this->view->message = $exception->getMessage();
        $this->view->code = $exception->getCode();
        
    }
    
    
    
    
}