<?php $__env->startSection('tittle'); ?>
    <?php echo e($tittle); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form name="formLogin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_self">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <label class="input-group-text" for="user"><i class="bi bi-person-fill"></i></label>
                            <input class="form-control" type="text" name="user" id="user" placeholder="usuario"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <label class="input-group-text" for="pass"><i class="bi bi-key-fill"></i></label>
                            <input class="form-control" type="password" name="pass" id="pass"
                                placeholder="contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <a class="btn btn-info" href="listing.php">Acceso como Invitado</a>
                        <button class="btn btn-success ms-3" type="submit" name="login">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/templateLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\donat\OneDrive\DAW\Segundo\MP0613 - Desenvolvemento web en contorno servidor\Estudio Final\UD5-2\views/viewLogin.blade.php ENDPATH**/ ?>