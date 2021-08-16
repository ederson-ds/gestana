<?php

function validarSomenteLetrasENumeros($campos, $model, $data, $self) {
    $data['error'] = false;
    $data['msg'] = "";
    foreach ($campos as $campo) {
        $data[$campo . "_error"] = "";
    }
    if ($self->getMethod() === 'post') {
        foreach ($campos as $campo) {
            $model->$campo = $self->getPost($campo);
            if ($model->$campo && !preg_match('|^[\pL\s0-9\.\-]+$|u', $model->$campo)) {
                $data[$campo . "_error"] = "É permitido apenas letras e números";
                $data['error'] = true;
            }
        }
    }
    $data[$model->table] = $model;
    $data['data'] = $data;
    return $data;
}

function validaCamposObrigatorios($campos, $model, $data, $self) {
    if ($self->getMethod() === 'post') {
        foreach ($campos as $campo) {
            $model->$campo = $self->getPost($campo);
            if (!$model->$campo) {
                $data[$campo . "_error"] = "Campo obrigatório";
                $data['error'] = true;
            }
        }
    }
    $data['data'] = $data;
    return $data;
}
