<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informações</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="col-12">
                                            <img src="https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_AnimalCrossingNewHorizons_image1600w.jpg" class="product-image" alt="Product Image" >
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            <div class="product-image-thumb active"><img src="https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_AnimalCrossingNewHorizons_image1600w.jpg"  alt="Product Image"></div>
                                            <div class="product-image-thumb" ><img src="https://s2.glbimg.com/5rK3_CrzgsEQIjTxZypq9YVv78M=/0x0:1200x675/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2020/J/6/BfbXamRiKY6TxLVysI2Q/switch-acnh-0220-direct-advanced-scrn-08-copy.0.jpg" alt="Product Image"></div>
                                            <div class="product-image-thumb" ><img src="https://http2.mlstatic.com/D_NQ_NP_759312-MLB41133535419_032020-W.jpg" alt="Product Image"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <h3 class="my-3"><?= $info->titulo ?></h3>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                                <i class="fas fa-heart" style="color: Red"></i>
                                                <!-- <i class="far fa-heart"></i> -->
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="mt-4">
                                            <h2 class="mb-0">
                                            <?= $info->produto->preco ?>
                                            </h2>
                                        </div>

                                        <!-- <div class="mt-2">
                                            <h6><b>Quantidade:</b> 4</h6>
                                        </div> -->

                                        <div class="mt-4">
                                            <a href="" class="btn btn-warning btn-block btn-lg">
                                                <i class="fas fa-handshake"></i>
                                                <?= $info->produto->descricao ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pb-5">
                                        <h3 class="card-title">Descrição</h3>
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
                                                        <button type="button" id="perguntar" class="btn btn-primary">Perguntar!</button>
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