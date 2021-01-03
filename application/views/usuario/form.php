<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 pt-5">
            <div class="card card-primary">
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
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" name="sobrenome" id="Sobrenome" placeholder="Sobrenome">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF: xxx-xxx-xxx-xx">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Exemplo: 01/01/2004" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Exemplo: (11) 1111-1111">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular" id="celular" placeholder="Exemplo: (11) 11111-1111">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="numero">Numero</label>
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" style="height: 100%" name="estado" id="estado">
                                        <?php foreach($estados as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->nome. " - ".$item->sigla ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
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