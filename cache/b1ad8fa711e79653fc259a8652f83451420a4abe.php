<?php $__env->startSection('tittle'); ?>
    <?php echo e($tittle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <?php echo e($header); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-9 mx-auto">
            <div class="row">
                <div class="col">
                    <?php if($_SESSION['user'] === 'invitado'): ?>
                        <a class="btn btn-success disabled" href="create.php">
                            <span class=""><i class="bi bi-plus"></i></span>
                            <span class="">Crear</span>
                        </a>
                    <?php else: ?>
                        <a class="btn btn-success" href="create.php">
                            <span class=""><i class="bi bi-plus"></i></span>
                            <span class="">Crear</span>
                        </a>
                        <?php if($delete === 'ok'): ?>
                            <span class="text-danger ms-5">Elemento Borrado correctamente</span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <form name="formListProducts" method="post" action="<?php echo e($_SERVER['PHP_SELF']); ?>" target="_self">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th>Detalle</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $listProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <td>
                                            <button type="submit" class="btn btn-info text-white" name="detail"
                                                value="<?php echo e($product['id']); ?>">Detalle</button>
                                        </td>
                                        <td><?php echo e($product['id']); ?></td>
                                        <td><?php echo e($product['nombre']); ?></td>
                                        <td>
                                            <?php if($_SESSION['user'] === 'invitado'): ?>
                                                <button type="submit" class="btn btn-warning disabled" name="update"
                                                    value="<?php echo e($product['id']); ?>">Actualizar</button>
                                            <?php else: ?>
                                                <button type="submit" class="btn btn-warning me-2" name="update"
                                                    value="<?php echo e($product['id']); ?>">Actualizar</button>
                                                <button type="submit" class="btn btn-danger" name="delete"
                                                    value="<?php echo e($product['id']); ?>">Borrar</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/templateGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\donat\OneDrive\DAW\Segundo\MP0613 - Desenvolvemento web en contorno servidor\Estudio Final\UD5-2\views/viewListing.blade.php ENDPATH**/ ?>