<?php

//Funciones para forms
function form_input_text(
    $id_name='', 
    $label='Nombrar por favor', 
    $placeholder='Nombrar por favor' , 
    $div_class='form-group',
    $label_class='',
    $input_class='form-control'
) {
    $input = "<div class='$div_class'>";
    $input .= "<label for='$id_name' class='$label_class'>$label</label>";
    $input .= "<input id='$id_name' name='$id_name' class='$input_class' type='text' placeholder='$placeholder'>";
    $input .= "</div> ";
    echo $input;
}

function form_input_number(
    $id_name='', 
    $label='Nombrar por favor', 
    $placeholder='Nombrar por favor' , 
    $div_class='form-group',
    $label_class='',
    $input_class='form-control',
    $min=0,
    $max=100
) {
    $input = "<div class='$div_class'>";
    $input .= "<label for='$id_name' class='$label_class'>$label</label>";
    $input .= "<input id='$id_name' name='$id_name' class='$input_class' min='$min' max='$max' type='number' placeholder='$placeholder'>";
    $input .= "</div> ";
    echo $input;
}

function form_input_check(
    $id_name='', 
    $label='Nombrar por favor', 
    $div_class='form-check',
    $label_class='form-check-label',
    $input_class='form-check-input',
    $value = ''
) {
    $input ="<div class='$div_class'>";
    $input .="<input class='$input_class' type='checkbox' value='$value' id='$id_name'>";
    $input .="<label class='$label_class' for='$id_name'>$label</label>";
    $input .="</div>";
    echo $input;
}

