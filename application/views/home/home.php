<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/bltcfa4652c8d383f56/5e21837f63d1b6503160d39b/Home-page.jpg" alt="First slide" style="max-height: 750px;">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://store.nintendo.com.br/media/catalog/product/cache/1aff59ff6f21b2058ac5563c018426d7/m/k/mk8_hero_1.jpg" alt="Second slide" style="max-height: 750px;">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://image.api.playstation.com/vulcan/img/rnd/202010/2618/itbSm3suGHSSHIpmu9CCPBRy.jpg" alt="Third slide" style="max-height: 750px;">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 co-xs-12">
                    <h3 class="text-title">Alguns Jogos cadastrados!</h3>
                </div>
                <?php foreach($cards as $item): ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                        <div class="card h-100">
                            <img src="<?= $item->imagem ? "data:".$item->imagem->tipo.";base64,".$item->imagem->img : "https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_AnimalCrossingNewHorizons_image1600w.jpg" ?>" class="card-img-top" alt="..." style="max-height: 180px;">
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
                                <a href="<?= base_url("Home/detalhes/".$item->categoria->nome."/".$item->id) ?>" class="btn btn-block btn-outline-danger">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>