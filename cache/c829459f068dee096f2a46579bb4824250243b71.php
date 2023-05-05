<?php $__env->startSection('tittle'); ?>
    <?php echo e($tittle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <?php echo e($header); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form name="formCreateProduct" method="post" action="<?php echo e($_SERVER['PHP_SELF']); ?>" target="_self">
        <div class="row d-flex justify-content-center">
            <div class="col-9">
                <div class="row">
                    <div class="col">
                        <label class="input-text mb-2" id="name" for="name">Nombre</label>
                        <?php if(isset($registerProduct)): ?>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                value="<?php echo e($registerProduct['nombre']); ?>" required>
                        <?php else: ?>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                required>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <label class="input-text mb-2" id="shortName" for="shortName">Nombre Corto</label>
                        <?php if(isset($registerProduct)): ?>
                            <input type="text" class="form-control" name="shortName" id="shortName"
                                placeholder="Nombre Corto" value="<?php echo e($registerProduct['nombre_corto']); ?>" required>
                        <?php else: ?>
                            <input type="text" class="form-control" name="shortName" id="shortName"
                                placeholder="Nombre Corto" required>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label class="input-text mb-2" id="pvp" for="pvp">Precio (€)</label>
                        <?php if(isset($registerProduct)): ?>
                            <input type="number" class="form-control" name="pvp" id="pvp"
                                placeholder="Precio (€)" min="0" step="0.01" value="<?php echo e($registerProduct['pvp']); ?>"
                                required>
                        <?php else: ?>
                            <input type="number" class="form-control" name="pvp" id="pvp"
                                placeholder="Precio (€)" min="0" step="0.01" required>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <label class="input-text mb-2" id="family" for="family">Familia</label>
                        <select class="form-select" name="family" id="family">
                            <?php $__currentLoopData = $tableFamilies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($registerProduct)): ?>
                                    <?php if($registerProduct['familia'] === $family['cod']): ?>
                                        <option value="<?php echo e($family['cod']); ?>" selected><?php echo e($family['nombre']); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($family['cod']); ?>"><?php echo e($family['nombre']); ?></option>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <option value="<?php echo e($family['cod']); ?>"><?php echo e($family['nombre']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-9">
                        <label class="input-text mb-2" for="description">Descripción</label>
                        <?php if(isset($registerProduct)): ?>
                            <textarea class="form-control" name="description" id="description" rows="10"><?php echo e($registerProduct['descripcion']); ?></textarea>
                        <?php else: ?>
                            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <?php if(isset($registerProduct)): ?>
                            <button type="submit" name="update" value="<?php echo e($registerProduct['id']); ?>"
                                class="btn btn-primary">Modificar</button>
                        <?php else: ?>
                            <button type="submit" name="create" class="btn btn-primary">Crear</button>
                        <?php endif; ?>
                        <button type="reset" name="reset" class="btn btn-success mx-2">Limpiar</button>
                        <a class="btn btn-secondary" href="listing.php">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-9 mx-auto">
            <?php if($result === 'ok'): ?>
                <?php if(isset($resgisterProduct)): ?>
                    <span class="text-success">Producto actualizado correctamente</span>
                <?php else: ?>
                    <span class="text-success">Producto insertado correctamente</span>
                <?php endif; ?>
            <?php elseif($result === 'noOk'): ?>
                <?php if(isset($registerProdcut)): ?>
                    <span class="text-danger">Fallo en la actualización del producto</span>
                <?php else: ?>
                    <span class="text-danger">Fallo en la actualización del producto</span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/templateGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\donat\OneDrive\DAW\Segundo\MP0613 - Desenvolvemento web en contorno servidor\Estudio Final\UD5-2\views/viewCreate.blade.php ENDPATH**/ ?>