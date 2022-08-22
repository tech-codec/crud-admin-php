<?php

namespace App\Html;

class Bootstrapform extends Form
{

    public function cadre($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '<label>';
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getdata($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getdata($name) . '" class="form-control">';
        }

        return $this->cadre($label . $input);
    }

    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '<label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            if ($k == $this->getdata($name)) {
                $attributes = 'selected';
            }
            $input .= "<option value='$k' $attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->cadre($label . $input);
    }
    public function submit()
    {
        return $this->cadre('<button type="text" class="btn btn-primary">Envoyer</button>');
    }
}
