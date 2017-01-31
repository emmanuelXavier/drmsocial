<?php

require_once 'drm/DRMSocial.php';

$dados['name'] = 'username';
$dados['email'] = 'email@email.com';
$dados['fone'] = '99 99999-9999';
$dados['cpf'] = '999.999.999-99';

drmPDF($dados, 'arquivo-principal.pdf', "arquivo-modificado.pdf");
