<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-4">
            <button type="button" class="btn btn-outline-danger btn-lg float-right">Cadastrar um Produto</button>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div id="accordion1">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Sub Categoria 1
                                </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion1">
                                <div class="card-body">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="checkboxPrimary1">
                                            <label for="checkboxPrimary1">
                                                Sub da Sub categoria 1
                                            </label>
                                        </div>
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="checkboxPrimary2">
                                            <label for="checkboxPrimary2">
                                                Sub da Sub categoria 1
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div id="accordion2">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSecondary">
                                        Sub Categoria 2
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSecondary" class="collapse show" data-parent="#accordion2">
                                <div class="card-body">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="checkboxPrimary21">
                                            <label for="checkboxPrimary21">
                                                Sub da Sub categoria 1
                                            </label>
                                        </div>
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="checkboxPrimary22">
                                            <label for="checkboxPrimary22">
                                                Sub da Sub categoria 1
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($cards as $item): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h3 class="card-title"><?= $item->titulo ?></h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-justify"><?= $item->descricao ?></p>
                                </div>
                                <div class="card-footer">
                                    <br/>
                                    <a href="<?= base_url("Home/detalhes/$item->id") ?>" class="btn btn-block btn-outline-primary">Ver Mais</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>    
</div>