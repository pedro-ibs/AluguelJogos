<div class="container">
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://franquia.globalmedclinica.com.br/wp-content/uploads/2016/01/investidores-img-02-01.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $info->nome ?></h3>

                <p class="text-muted text-center"><?= $info->bio ?></p>

                <ul class="list-group list-group-unbordered mb-3 text-center">
                    <li class="list-group-item tabs" id="dados">
                        <i class="fas fa-user-edit"></i>
                        <b>Dados</b>
                    </li>
                    <li class="list-group-item tabs" id="favoritos">
                        <i class="fas fa-heart"></i>
                        <b>Favoritos</b>
                    </li>
                    <li class="list-group-item tabs" id="pedidos">
                        <i class="fas fa-list"></i>
                        <b>Pedidos</b>
                    </li>
                    <li class="list-group-item tabs" id="cadastrado">
                        <i class="fas fa-edit"></i>
                        <b>Cadastrados por você</b>
                    </li>
                    <li class="list-group-item tabs" id="suporte">
                        <i class="fas fa-headset"></i>
                        <b>Suporte</b>
                    </li>
                </ul>
                
                <a href="<?= base_url("Usuario/logout") ?>" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt"></i> <b>Sair</b></a>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="card card-danger card-outline">
                <div class="card-body box-profile">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <div class="tab-pane text-left fade show active" id="dados_tab" role="tabpanel"> <!-- eu -->
                            Editar dados do Usuario
                            
                            <form id="submit" role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com.br">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="confirmacao_senha">Confirmação de Senha</label>
                                    <input type="password" class="form-control" name="confirmacao_senha" id="confirmacao_senha" placeholder="Confirmação de Senha">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Biografia</label>
                                    <textarea class="form-control" rows="3" name="bio" placeholder="Bio ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_usuario" id="id_usuario" value="" />
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>

                        </div>
                        <div class="tab-pane fade" id="favoritos_tab" role="tabpanel"> <!-- eu -->
                            Lista de Favoritos

                    <!--    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <div class="container-fluid">
                                <div class="row">
                                     php foreach($cards as $item):  
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4">
                                            <div class="card h-100">
                                                <img src=" < ?= $item->imagem ? $item->imagem->img : "https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_AnimalCrossingNewHorizons_image1600w.jpg" ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-bold">< ?= $item->titulo ?></h3>
                                                    <span id="fav< ?= $item->id ?>" class="text-right">
                                                        < ?php if(!empty($item->favorito) && isset($item->favorito->ativo) && $item->favorito->ativo == 1): ?>
                                                            <i class="fas fa-heart float-right" onclick="favoritos('< ?= $item->id ?>', 'preenchido')" data-tipo="preenchido" style="color: red" id="item< ?= $item->id ?>"></i>
                                                        < ?php else: ?>
                                                            <i class="far fa-heart float-right" onclick="favoritos('< ?= $item->id ?>', 'vazio')" data-tipo="vazio" style="color: grey" id="item< ?= $item->id ?>"></i>
                                                        < ?php endif; ?>
                                                    </span>
                                                    <br/>
                                                    <p class="text-justify">< ?= $item->descricao_jogo ?></p>
                                                </div> 
                                                <div class="card-footer">
                                                    <a href="< ?= base_url("Home/detalhes/".$item->id) ?>" class="btn btn-block btn-outline-danger">Ver Mais</a>
                                                </div>
                                            </div>
                                        </div>-->
                                    <!-- endforeach;  -->
                                </div>
                            </div>
                        </div>


                        </div>
                        <div class="tab-pane fade" id="pedidos_tab" role="tabpanel">
                            Pedidos
                        </div>
                        <div class="tab-pane fade" id="cadastrado_tab" role="tabpanel"> <!-- eu -->
                            Lista de serviços cadastrados por você
                        </div>
                        <div class="tab-pane fade" id="suporte_tab" role="tabpanel">
                            Pagina de suporte
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>