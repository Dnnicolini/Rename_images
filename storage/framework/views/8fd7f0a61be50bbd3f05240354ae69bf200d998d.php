<?php $__env->startSection('title', 'Sistema Interno'); ?>

<?php $__env->startSection('content'); ?>


<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>FileAPI HTML5</title>
    </head>
    <body>
        <p>Por favor selecione uma lista:</p>
     
    <h2 class="example">A heading with class="example"</h2>
    <input type="file" name="file" id="file"/>
    <textarea cols="80" rows="10" id="result"></textarea>

        <button style="float: right;" type="button" onclick="downloadInnerHtml(fileName, 'result')">Exportar</button>
    </body>
    </html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\img_projeto\resources\views/welcome.blade.php ENDPATH**/ ?>