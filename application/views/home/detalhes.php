<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">Informações</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="col-12">
                                            <img src="<?= $info->imagem[0]->img ?>" class="product-image" alt="Product Image" >
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            <?php foreach($info->imagem as $item): ?>
                                                <div class="product-image-thumb active"><img src="<?= $item->img ?>"  alt="Product Image"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-11 col-sm-12 col-xs-12">
                                                <h3 class="my-3"><?= $info->titulo ?></h3>
                                                <!-- <i class="far fa-heart"></i> -->
                                            </div>
                                            <div class="col-md-1 col-sm-12 col-xs-12">
                                                <br/>
                                                <span id="fav<?= $info->id ?>" class="text-right">
                                                    <?php if(!empty($info->favorito) && $info->favorito->ativo == 1): ?>
                                                        <i class="fas fa-heart float-right" onclick="favoritos('<?= $info->id ?>', 'preenchido')" data-tipo="preenchido" style="color: red" id="item<?= $info->id ?>"></i>
                                                    <?php else: ?>
                                                        <i class="far fa-heart float-right" onclick="favoritos('<?= $info->id ?>', 'vazio')" data-tipo="vazio" style="color: grey" id="item<?= $info->id ?>"></i>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="card-title">Categorias do Jogo</h3>
                                        <br/>
                                        <div class="row">
                                            <?php foreach($info->categoria as $item): ?>
                                                <div class="col-md-4 col-sm-4 ol-xs-12">
                                                    <span class="badge bg-warning"><?= $item->nome ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <hr>
                                        <div class="mt-4">
                                            <h2 class="mb-0">
                                            <?= "R$ ".$info->produto->preco.",00" ?>
                                            </h2>
                                        </div>

                                        <!-- <div class="mt-2">
                                            <h6><b>Quantidade:</b> 4</h6>
                                        </div> -->

                                        <div class="mt-4">
                                            <a href="" class="btn btn-warning btn-block btn-lg">
                                                <i class="fas fa-handshake"></i>
                                                <?= $info->tipo->nome ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Descrição do Jogo</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?= $info->descricao ?>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Descrição feita pelo vendedor</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?= $info->produto->descricao ?>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Duvidas</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h5 class="text-bold">Pergunte ao Prestador</h5>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="pergunta" placeholder="Digite aqui!">
                                                    <span class="input-group-append">
                                                        <button type="button" id="perguntar" class="btn btn-danger">Perguntar!</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pt-5">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3 class="card-title text-bold">Ultimas Realizadas</h3>
                                                <br/>
                                                <br/>
                                                <!-- <?php foreach($info->perguntas as $item): ?>
                                                <h6 class="text-justify"><?= $item->pergunta ?>.</h6>
                                                <ul>
                                                    <li><span class="text-muted"><?= $item->resposta ?>.  <small>- <?= formatar($item->data_resposta, "bd2dt") ?></small></span</li>
                                                </ul>
                                                <?php endforeach; ?> -->
                                                <h6 class="text-justify">Uma pergunta bem longa e muito bem escrita sem nenhum erro de portugues ou nada disso.</h6>
                                                <ul>
                                                    <li><span class="text-muted">Uma resposta muito bem elaborado e descrita sem algum tipo de erro.  <small>- 27/12/2020</small></span</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>