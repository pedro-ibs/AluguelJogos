<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-4">
            <button type="button" class="btn btn-outline-danger btn-lg float-right">Cadastrar um Serviço</button>
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
                                    <h3 class="card-title"><?= $item->usuario->nome ?> - <?= $item->nome ?></h3>
                                </div>
                                <div class="card-body">
                                    <i class="fas fa-star" style="color: Gold"></i>
                                    <i class="fas fa-star-half-alt" style="color: Gold"></i>
                                    <i class="far fa-star" style="color: Gold"></i>
                                    <i class="far fa-star" style="color: Gold"></i>
                                    <i class="far fa-star" style="color: Gold"></i> <small class="text-muted">(Media de Avaliação)</small>
                                    <br/>
                                    <p class="text-justify"><?= $item->descricao_curta ?></p>
                                </div>
                                <div class="card-footer">
                                    <h3 class="card-title">Avaliação mais recente</h3>
                                    <br/>
                                    <p class="text-justify"><?= $item->feedback ? $item->feedback : "Esse Serviço ainda não possui avaliação" ?></p>
                                    <!--Nome da pessoa que fez a avaliação - Uma avaliação.-->
                                    <a href="<?= base_url("Home/detalhes/$item->nome") ?>" class="btn btn-block btn-outline-primary">Ver Mais</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h3 class="card-title">Primeiro nome da pessoa - Nome do Serviço</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-star" style="color: Gold"></i>
                                <i class="fas fa-star-half-alt" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i> <small class="text-muted">(Media de Avaliação)</small>
                                <br/>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-title">Avaliação mais recente</h3>
                                <br/>
                                <p class="text-justify">Nome da pessoa que fez a avaliação - Uma avaliação.</p>
                                <button type="button" class="btn btn-block btn-outline-primary">Ver Mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h3 class="card-title">Primeiro nome da pessoa - Nome do Serviço</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-star" style="color: Gold"></i>
                                <i class="fas fa-star-half-alt" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i> <small class="text-muted">(Media de Avaliação)</small>
                                <br/>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-title">Avaliação mais recente</h3>
                                <br/>
                                <p class="text-justify">Nome da pessoa que fez a avaliação - Uma avaliação.</p>
                                <button type="button" class="btn btn-block btn-outline-primary">Ver Mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h3 class="card-title">Primeiro nome da pessoa - Nome do Serviço</h3>
                            </div>
                            <div class="card-body">
                                <i class="fas fa-star" style="color: Gold"></i>
                                <i class="fas fa-star-half-alt" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i>
                                <i class="far fa-star" style="color: Gold"></i> <small class="text-muted">(Media de Avaliação)</small>
                                <br/>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-title">Avaliação mais recente</h3>
                                <br/>
                                <p class="text-justify">Nome da pessoa que fez a avaliação - Uma avaliação.</p>
                                <button type="button" class="btn btn-block btn-outline-primary">Ver Mais</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-5 pb-5">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4 class="text-title">Sugestões de outras categorias</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                            <a class="nav-link" href="aa">Teste nome longo 1</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>