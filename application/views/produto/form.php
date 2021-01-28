<div class="container">
    <div class="card card-danger card-outline">
        <form id='submit' enctype="multipart/form-data">
            <div class="card-body box-profile">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="nome">Nome do Anúncio: </label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="<?= isset($jogo) && $jogo->titulo ? $jogo->titulo : "" ?>" placeholder="Nome: ">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="nome">Categorias: </label><br/> 
                                <?php foreach($categorias as $item): ?>
                                    <div class="custom-control custom-checkbox d-inline ml-3">
                                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="categoria[]" type="checkbox" value="<?= $item->id ?>" id="categorias<?= $item->id ?>" <?= isset($jogo) && strrpos($jogo->categoria_conc, (string)$item->id) > 0? "checked=''" : "" ?>/>
                                        <label for="categorias<?= $item->id ?>" class="custom-control-label"><?= $item->nome ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Tipo de Anúncio</label>
                                    <select class="form-control" name="tipo">
                                        <option value="1" <?= set_select("tipo", "1", isset($jogo->id_marca) && $jogo->tipo == 1 ? true : false ) ?>>Venda</option>
                                        <option value="2" <?= set_select("tipo", "2", isset($jogo->id_marca) && $jogo->tipo == 2 ? true : false ) ?>>Aluguel</option>
                                        <option value="3" <?= set_select("tipo", "3", isset($jogo->id_marca) && $jogo->tipo == 3 ? true : false ) ?>>Troca</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control" name="marca">
                                        <?php foreach($marca as $item): ?>
                                            <option value="<?= $item->id ?>" <?= set_select("marca", $item->id, isset($jogo->id_marca) && $jogo->id_marca == $item->id ? true : false ) ?>><?= $item->nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Preço:</label>
                                    <input type="text" class="form-control" value="<?= isset($jogo) && $jogo->preco ? $jogo->preco : "" ?>" id="preco" name="preco" placeholder="Preço">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 mt-3">
                                <label>Status do Jogo:</label>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" <?= isset($jogo->status) && $jogo->status == 0 ? "" : "checked=''" ?>>
                                    <label class="custom-control-label" for="status">Ativo</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Descrição do jogo</label>
                                    <textarea class="form-control" name="descricao_jogo" rows="3" placeholder="Descrição do jogo"><?= isset($jogo) && $jogo->descricao_jogo ? $jogo->descricao_jogo : "" ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Descrição do anúncio</label>
                                    <textarea class="form-control" name="descricao_anuncio" rows="3" placeholder="Descrição Anúncio"><?= isset($jogo) && $jogo->descricao ? $jogo->descricao : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label for="exampleInputFile">Imagens do produto</label>
                        <div id="actions" class="row">
                            <div class="col-lg-12">
                                <div class="btn-group">
                                    <span class="btn btn-success fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Adicionar Imagem</span>
                                    </span>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancelar todas as Imagens</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table table-striped files" id="previews">
                            <div id="template" class="row mt-2">
                                <div class="col-auto">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                        <button data-dz-remove class="btn btn-danger delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($jogo)): ?>
                            <div class="row">
                                <?php foreach($jogo->img as $item): ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12 m-3">
                                        <img src="data:<?= $item->tipo ?>;base64,<?= $item->img ?>" class="img-fluid" style="max-height: 200px;"/>
                                        <div class="text-center mt-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input principal" data-id="<?= $item->id ?>" id="principal<?=$item->id ?>" <?= $item->principal == 1 ? "checked=''" : "" ?>>
                                                    <label class="custom-control-label" for="principal<?= $item->id ?>">Principal</label>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger excluir" data-id="<?= $item->id ?>"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" name="id_produto" value="<?= isset($jogo) ? $jogo->id : "" ?>"/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="text-left">
                            <a href="<?= base_url($local); ?>" class="btn btn-danger">Voltar</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>