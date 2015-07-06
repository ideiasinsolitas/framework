<?php

namespace Deck\Framework;

use Deck\Types\StringObject;

/**
 * The short description
 *
 * As many lines of extendend description as you want {@link element}
 * links to an element
 * {@link http://www.example.com Example hyperlink inline link} links to
 * a website. The inline
 *
 * @package package name
 * @author  Pedro Koblitz
 */
class View
{

    public function __construct()
    {
        $this->html = new StringObject();
    }

    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    protected function setDocumentHeader($tpl, $data)
    {
        $header = $this->engine->render($tpl, $data);
        $html->append($header);
    }

    protected function setDocumentBody()
    {
        foreach ($this->views as $view) {
            $item = $this->engine->render($view['tpl'], $view['data']);
            $this->html->append($item);
        }
    }

    protected function loadAssets($type)
    {
        switch ($type) {
            case 'css':
            case 'js':
            
            default:
                throw new \Exception("Error Processing Request", 1);
        }
    }

    protected function loadDocument()
    {
        $this->html->append('<html><header>');
        $this->setDocumentHeader();
        $this->loadAssets('css');
        $this->html->append('</header><body>');
        $this->setDocumentBody();
        $this->loadAssets('js');
        $this->html->append('</body></html>');
    }

    public function addAsset($type, $asset)
    {
        $this->assets[$type] = $asset;
    }

    public function addView($tpl, $data)
    {

    }

    public function render()
    {
        $this->loadDocument();

        ob_start();
        echo $this->html;
        ob_end_flush();
    }
}
