<div class="container">
    <div class="card card-danger card-outline">
        <form id='submit'>
            <div class="card-body box-profile">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="nome">Nome do Anúncio: </label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome: ">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="nome">Categorias: </label><br/> 
                                <?php foreach($categorias as $item): ?>
                                    <div class="custom-control custom-checkbox d-inline">
                                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="categoria[]" type="checkbox" value="<?= $item->id ?>" id="categorias<?= $item->id ?>">
                                        <label for="categorias<?= $item->id ?>" class="custom-control-label"><?= $item->nome ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Tipo de Anúncio</label>
                                    <select class="form-control" name="tipo">
                                        <option value="1">Venda</option>
                                        <option value="2">Aluguel</option>
                                        <option value="3">Troca</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control" name="marca">
                                        <?php foreach($marca as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 mt-3">
                                <div class="form-group">
                                    <label>Preço:</label>
                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Descrição do jogo</label>
                                    <textarea class="form-control" name="descricao_jogo" rows="3" placeholder="Descrição do jogo"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Descrição do anúncio</label>
                                    <textarea class="form-control" name="descricao_anuncio" rows="3" placeholder="Descrição Anúncio"></textarea>
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