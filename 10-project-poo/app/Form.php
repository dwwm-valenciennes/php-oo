<?php

namespace App;

class Form {
    /**
     * Génére un input en HTML.
     *
     * Le label est optionnel et le type est text par défaut.
     */
    public function input($name, $label = null, $type = 'text') {
        // On a un label custom ou bien le name avec une majuscule
        $label = $label ?? ucfirst($name);

        return "
            <label for='$name'>$label</label>
            <input type='$type' name='$name' id='$name' class='form-control' value=''>
        ";
    }

    /**
     * Génére un textarea en HTML.
     */
    public function textarea($name, $label = null) {
        $label = $label ?? ucfirst($name);

        return "
            <label for='$name'>$label</label>
            <textarea name='$name' id='$name' class='form-control'></textarea>
        ";
    }
}
