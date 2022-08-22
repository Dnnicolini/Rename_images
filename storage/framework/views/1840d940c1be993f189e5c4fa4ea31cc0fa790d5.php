

<?php $__env->startSection('title', 'Criar imagem'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Seleção de imagem </h2>
    </div>
</div>


<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="<?php echo e(url('/imagens')); ?>" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url('/imagens/store')); ?>" enctype="multipart/form-data" method="post" id="formAdd">
                <div class="row">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-6 p-2">
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <div class="form-group">
                                    <label for="">Arquivo:<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control mt-2" accept=".txt" name="file" id="file" />
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group">
                                    <label for="">Imagem:<span class="text-danger">*</span></label>
                                    <input type="file" name="imagem" class="form-control mt-2" id="imagem" required>

                                    <?php if($errors->has('imagem')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('imagem')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2 mt-4">
                        <div class="row">
                            <div class="col-md-10 ms-4 p-2">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="form-group">
                                            <label for="checkbox">Mostrar nomes carregados</label>
                                            <input type="checkbox" name="checkbox" onclick="var div = document.getElementById('result'); if(this.checked)
                                        { div.hidden = false; div.focus();}else{div.hidden=true;}" />

                                        </div>
                                    </div>
                                    <div class="card-body" style="min-height: 100px;">
                                        <div id="result" hidden>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <script>
                        const JS_EOL = "\n";

                        function $(selector) {
                            let el = document.querySelector(selector);
                            return el;
                        }
                        $('#file').addEventListener('change', function(event) {
                            let input = event.target
                                , file = new FileReader();
                            file.readAsText(input.files[0]);
                            file.onload = function(e) {
                                let data = file.result.split("\n");
                                for (let i = 0; i < data.length; i++) {
                                    let row = data[i].trim();
                                    if (!row.length) {
                                        continue;
                                    }

                                    $('#result').innerHTML += '<tr id="rowText' + i + '""><td class="col-md-3"><input type="text" name="text[' + i + '][nome]" placeholder="" class="form-control" value="' + row +
                                        '"  readonly="readonly"></td></tr>'


                                }
                            };
                        }, false);

                    </script>

                    <div class="col-md-12">
                        <hr>
                        <button class="btn btn-success float-r" type="submit" id="btnAdicionar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\img_projeto\resources\views/imagens/create.blade.php ENDPATH**/ ?>