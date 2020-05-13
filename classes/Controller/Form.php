<?php


namespace controller;


class Form
{
    public function autocompleteForm($array,$function)
    {
        $quantidade = count($array);
        $contador = 0;
        foreach ($array as $a) {
            echo "\"".$a->{$function}()."\": null";
            if($contador < $quantidade-1){
                echo ",";
                $contador++;
            }
        }
    }
    public function selectForm($array,$function,$name)
    {
        echo "<select name='";
        echo $name;
        echo "'>'";
        echo "<option value ='null' disabled selected>Selecione</option>";
        foreach ($array as $a){
            echo "<option value='";
            echo $a->getId();
            echo "'>";
            echo $a->{$function}();
            echo "</option>";
        }
        echo '</select>';
    }
}