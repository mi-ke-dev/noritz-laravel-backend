

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nova::auth.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form
        class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
    >

        <?php $__env->startComponent('nova::auth.partials.heading'); ?>
            <?php echo e(__('Welcome Back!')); ?>

        <?php echo $__env->renderComponent(); ?>

        <?php if($errors->any()): ?>
            <p class="text-center font-semibold text-danger my-3">
                <?php if($errors->has('email')): ?>
                    <?php echo e($errors->first('email')); ?>

                <?php endif; ?>
            </p>
        <?php endif; ?>

        <p class="m-4">

        </p>

            <a class="w-full h- btn btn-default btn-primary hover:bg-primary-dark text-center"
               href="<?php echo e(route('nova.login.google')); ?>">
                Sign in using Google
            </a>

            <a class="mt-8 w-full h- btn btn-default btn-primary hover:bg-primary-dark text-center"
               href="<?php echo e(route('nova.login.azure')); ?>">
                Sign in using Azure
            </a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('nova::auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\noritz-laravel-backend\resources\views/vendor/nova/auth/login.blade.php ENDPATH**/ ?>