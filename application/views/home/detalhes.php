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
                                            <img src="<?= "data:".$info->imagem[0]->tipo.";base64,".$info->imagem[0]->img ?>" class="product-image" alt="Product Image" >
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            <?php foreach($info->imagem as $item): ?>
                                                <div class="product-image-thumb active"><img src="<?= "data:".$item->tipo.";base64,".$item->img ?>"  alt="Product Image"></div>
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
                                                    <?php if(!empty($info->favorito) && isset($info->favorito->ativo) && $info->favorito->ativo == 1): ?>
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
                                            <?= $info->preco ?>
                                            </h2>
                                        </div>

                                        <!-- <div class="mt-2">
                                            <h6><b>Quantidade:</b> 4</h6>
                                        </div> -->

                                        <div class="mt-4">
                                            <button type="button" id="contratar" class="btn btn-warning btn-block btn-lg">
                                                <i class="fas fa-handshake"></i>
                                                <?= $info->tipo->nome ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Descrição do Jogo</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?= $info->descricao_jogo ?>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Descrição feita pelo vendedor</h3>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?= $info->descricao ?>
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
                                                <div class="pergunta">
                                                    <?php if($info->perguntas): ?>
                                                        <?php foreach($info->perguntas as $item): ?>
                                                        <h6 class="text-justify"><?= $item->pergunta ?>.</h6>
                                                        <ul>
                                                            <?php if($item->resposta): ?>
                                                                <li><span class="text-muted"><?= $item->resposta ?>.  <small>- <?= formatar($item->data_resposta, "bd2dt") ?></small></span</li>
                                                            <?php else: ?>
                                                                <li><span class="text-muted">Sem resposta ainda!</span</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="callout callout-warning mensagem_pergunta">
                                                            <p>Este Jogo ainda não possui perguntas. Seja o primeiro a realizar.</p>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="id_jogo" value="<?= $info->id ?>"/>
                                <input type="hidden" id="id_usuario" value="<?= $info->id_usuario ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>