<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Adecoagro | User Management';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->Html->meta('icon','https://companieslogo.com/img/orig/AGRO-fdbaffba.png?t=1720244490') ?>

    <?= $this->Html->css(['bootstrap.min' ,'normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->Html->script(['bootstrap.bundle.min']) ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background: linear-gradient(90deg,rgb(169, 187, 193),rgb(215, 210, 197));">
    <nav class="top-nav mt-4">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><img src="https://companieslogo.com/img/orig/AGRO_BIG-6559c4fd.png?t=1720244490" alt="Adecoagro" style="width: 100%; max-width: 7em;"></a>
        </div>
        <div class="top-nav-links d-flex gap-4">
            <?= $this->Html->link(__('PROVEEDORES'), ['controller' => 'Suppliers', 'action' => 'index']) ?>
            <?= $this->Html->link(__('COMPRAS'), ['controller' => 'Purchases', 'action' => 'index']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
