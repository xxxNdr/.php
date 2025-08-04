<?php

namespace render {

    function r($tpl, $dati)
    {
        $c = file_get_contents($tpl);
        foreach ($dati as $k => $v) {
            $c = str_replace('{{' . $k . '}}', $v, $c);
        }
        return $c;
    }
}

namespace select {

    function select(array $dati, string $opzione_selezionata = "", string $name = "selezione")
    {
        $output = "<label for name=\"$name\">" . ucfirst($name) . "</label>";
        $output .= "<select name=\"$name\" id=\"$name\">";
        foreach ($dati as $k => $v) {
            $selected = ($k === $opzione_selezionata) ? "selected" : "";
            $output .= "<option value= \"$k\" $selected>" . ucfirst($k) . " ($v €)</option>";
        }
        $output .= "</select>";
        return $output;
    }
}

namespace checkbox {
    function checkbox(array $dati){
        $output = "";
        foreach($dati as $k => $v){
            $output .= "<label><input type=\"checkbox\" name=\"optional[]\" value=\"$k\">"
            . ucfirst($k) . " ($v €)</label><br>";
        }
        return $output;
    }
}