<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-4">
            <a href="<?= base_url("Produto/jogo") ?>" class="btn btn-outline-danger btn-lg float-right">Cadastrar um Produto</a>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div id="accordion1">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Tipo de Produto
                                </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion1">
                                <div class="card-body">
                                    <div class="form-group clearfix">
                                        <div class="icheck-danger">
                                            <input type="checkbox" id="venda">
                                            <label for="venda">
                                                Venda
                                            </label>
                                        </div>
                                        <div class="icheck-danger">
                                            <input type="checkbox" id="troca">
                                            <label for="troca">
                                                Troca
                                            </label>
                                        </div>
                                        <div class="icheck-danger">
                                            <input type="checkbox" id="aluguel">
                                            <label for="aluguel">
                                                Aluguel
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <button id="filtrar" type="button" class="btn btn-block btn-outline-danger">Filtrar</button>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($cards as $item): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                            <div class="card h-100">
                                <img src="<?= $item->imagem ? $item->imagem->img : "https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_AnimalCrossingNewHorizons_image1600w.jpg" ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-bold"><?= $item->titulo ?></h3>
                                    <span id="fav<?= $item->id ?>" class="text-right">
                                        <?php if(!empty($item->favorito) && isset($item->favorito->ativo) && $item->favorito->ativo == 1): ?>
                                            <i class="fas fa-heart float-right" onclick="favoritos('<?= $item->id ?>', 'preenchido')" data-tipo="preenchido" style="color: red" id="item<?= $item->id ?>"></i>
                                        <?php else: ?>
                                            <i class="far fa-heart float-right" onclick="favoritos('<?= $item->id ?>', 'vazio')" data-tipo="vazio" style="color: grey" id="item<?= $item->id ?>"></i>
                                        <?php endif; ?>
                                    </span>
                                    <br/>
                                    <p class="text-justify"><?= $item->descricao_jogo ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= base_url("Home/detalhes/".$item->id) ?>" class="btn btn-block btn-outline-danger">Ver Mais</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>    
</div>