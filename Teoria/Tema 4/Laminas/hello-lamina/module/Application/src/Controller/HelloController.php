<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

// Creamos un controlador nuevo.
class HelloController extends AbstractActionController
{
    // Definimos una acción.
    public function helloAction()
    {
        // Recibimos el mensaje por parametros.
        $message = $this->params()->fromQuery('message', 'hello');

        // Pasamos las variables a la vista
        return new ViewModel(['message' => $message]);
    }
}