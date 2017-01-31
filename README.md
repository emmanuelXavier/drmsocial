# DRM Social
DRM Social proteção de arquivos pdf com inserção de dados dos usuário em cada páginas do arquivo utilizando as bibliotecas [FPDF](http://www.fpdf.org/) e [FPDI](https://www.setasign.com/products/fpdi/about/).

```php

require_once 'vendor/DRMSocial.php'; 

$dados['name'] = 'username';
$dados['email'] = 'email@email.com';
$dados['fone'] = '99 99999-9999';
$dados['cpf'] = '999-999-999-99';

drmPDF($dados, '/pdf-padão.pdf', "/pdf-modificado.pdf");

```