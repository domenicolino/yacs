<?php
namespace Lino\Yacs\Core\View;
use Lino\Yacs\Core\Libs\Bag;
use Lino\Yacs\Core\Response\ViewModel;
Abstract class AbstractView extends Bag {
    protected $template;
    protected $domain;
    protected $templateDir;
    protected $viewModel;
    protected $view;

    public function __construct($domain, $templateDir) {
        $this->domain = $domain;
        $this->setTemplateDir($templateDir);
    }

    abstract public function display(ViewModel $response);

    public function getDomain() {
        return $this->domain;
    }

    public function setTemplateDir($templateDir) {
        $this->templateDir = $templateDir . 'View/Templates/';
        return $this;
    }
    public function getTemplateDir() {
        return $this->templateDir;
    }

    public function setTemplate($template) {
        $this->template = $template;
        return $this;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function unsetTemplate() {
        $this->tempalte = false;
    }

}