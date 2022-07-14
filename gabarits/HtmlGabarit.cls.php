<?php
// Importer les symboles de leurs namespaces
use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

class HtmlGabarit 
{
    protected $variables = array();
    protected $module;
    protected $action;
    private $twig;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;
        // Instance de l'engin de gabarit Twig
        $this->twig = new Environment(new FilesystemLoader(['vues/']), []);
    }

    public function affecter($nom, $valeur)
    {
        $this->variables[$nom] = $valeur;
    }

    public function affecterActionParDefaut($nomAction) {
        $this->action = $nomAction;
    }
 
    public function genererVue() 
    {
        $this->twig->display("$this->module.$this->action.twig", $this->variables);
    }
}