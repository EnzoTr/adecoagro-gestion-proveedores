<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min' ,'normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->Html->script(['bootstrap.bundle.min']) ?>


    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <main class="main">
    <div class="container mt-5 col-10">
        <div class="jumbotron text-center p-5 rounded-5 content glassy">
            <h1 class="display-3 fw-semibold mb-2">Gestión de Proveedores</h1>
            <p class="lead">Administrar proveedores y circuito de compra.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class=" shadow-sm p-5 rounded-5 content glassy">
                    <div class="card-body text-center">
                        <p class="card-text mb-4 fs-5">Ver y gestionar lista de proveedores.</p>
                        <?= $this->Html->link('Ir a Proveedores', ['controller' => 'Suppliers', 'action' => 'index'], ['class' => 'btn btn-success rounded-4 w-100 py-3']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" shadow-sm p-5 rounded-5 content glassy">
                    <div class="card-body text-center">
                        <p class="card-text mb-4 fs-5">Ver y administrar lista de compras.</p>
                        <?= $this->Html->link('Ir a Compras', ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'btn btn-success rounded-4 w-100 py-3']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" shadow-sm p-5 rounded-5 content glassy">
                    <div class="card-body text-center">
                        <p class="card-text mb-4 fs-5">Registrar una nueva compra.</p>
                        <?= $this->Html->link('Nueva Compra', ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'btn btn-success rounded-4 w-100 py-3']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </main>
</body>
</html>
