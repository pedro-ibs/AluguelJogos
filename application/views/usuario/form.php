<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 pt-5">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Formulário de Cadastro de Novos Usuarios</h3>
                </div>
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
                                    <label for="senha">Senha</label> <small>(Necessário no minimo conter 8 digitos e no minimo 1 numero)</small>
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
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>