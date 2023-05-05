<?php $__env->startSection('tittle'); ?>
    <?php echo e($tittle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <?php echo e($header); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card bg-primary text-white">
                <div class="card-header text-center">
                    <?php echo e($name); ?>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            Código: <?php echo e($id); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Nombre: <?php echo e($name); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Nombre Corto: <?php echo e($shortName); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Código Familia: <?php echo e($family); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            PVP (€): <?php echo e($pvp); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Descripción: <?php echo e($description); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <a class="btn btn-success" href="listing.php">Volver</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/templateGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\donat\OneDrive\DAW\Segundo\MP0613 - Desenvolvemento web en contorno servidor\Estudio Final\UD5-2\views/viewDetail.blade.php ENDPATH**/ ?>