<?php

namespace App\Html;

/**
 * la class Form
 * permet de la creeation d'un formulaire
 */
class Form
{
    /**
     * données utilisé pqr le for,ulqire
     *
     * @var [array]
     */
    private $data;
    /**
     * permet d'encadrer les element de notre formulaire sur forme de paragraphe
     *
     * @var string
     */
    private $tag = 'p';
    /**
     * @param array $data
     */

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    protected function getdata($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }

        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function cadre($html)
    {
        return "<{$this->tag}>{$html}</{$this->tag}>";
    }

    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->cadre('<input type="' . $type . '" name="' . $name . '" value="' . $this->getdata($name) . '">');
    }

    public function submit()
    {
        return $this->cadre('<button type="text">Envoyer</button>');
    }
}
