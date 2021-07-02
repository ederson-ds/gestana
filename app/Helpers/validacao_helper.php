<?php
function validarSomenteLetrasENumeros($string) {
    return !!preg_match('|^[\pL\s0-9]+$|u', $string);
}
