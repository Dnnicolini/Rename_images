

<?php $__env->startSection('title', 'imagens'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid mt-4 p-2">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex  mb-3 mx-auto">
                <h2 class="fw-bold">
                    <i class="bi bi-image" aria-hidden="true"></i>
                    Imagens cadastradas
                </h2>
            </div>
            <?php if( $btn == false): ?>
            <div class="d-flex mx-auto p-2">
                <a href='<?php echo e(url("/imagens/create")); ?>' class="btn btn-success float-r">
                    <i class="bi bi-plus"></i>Adicionar imagem</a>
            </div>

            <?php else: ?>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-row-reverse p-2 mx-auto">
                <a href='<?php echo e(url("/downloads")); ?>' class="btn btn-success float-r">
                    <i class="bi bi-save"></i> Baixar Imagens</a>
            </div>

            <div class="d-flex flex-row-reverse p-2 mx-auto">
                <form method="POST" action='<?php echo e(route('imagens.delete')); ?>' style="display:contents">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button type="submit" class="btn btn-danger">Remover
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>




<div class="container-fluid ms-auto">

    <div class="container-flex p-2">
        <table class="table table-bordered border-dark border-3 align-middle">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $imagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($img->codigo); ?></td>
                    <td class="border px-4 py-2"><?php echo e($img->nome); ?></td>
                    <td class="border px-4 py-2">
                        <a href='<?php echo e(url("/storage/imagens/$img->imagem")); ?>' target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('default.view_front_image')); ?>" style="margin-right: 3px" class="btn btn-info btn-sm">
                            <i class="bi bi-image"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


        <nav aria-label="Navegação de página exemplo">
            <ul class="pagination justify-content-center">
                <?php echo e($imagens->links()); ?>


            </ul>
        </nav>
    </div>




    <?php echo $__env->yieldContent('content'); ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\img_projeto\resources\views/imagens/index.blade.php ENDPATH**/ ?>