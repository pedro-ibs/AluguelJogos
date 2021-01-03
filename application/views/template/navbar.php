<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("") ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("Home/lista") ?>" class="nav-link">Lista</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("Home/detalhes"); ?>" class="nav-link">Detalhes</a>
      </li>
      <?php foreach($categorias[0]["filho"] as $item): ?>
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <?= $item["nome"] ?>
          </a>
          <ul class="dropdown-menu">
            <?php foreach($item["filho"] as $value): ?>
              <li><a class="dropdown-item" href="<?= base_url("Home/lista/").$item["nome"]."/".$value->nome ?>"><?= $value->nome ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
      <?php if(!isset($dados) || empty($dados)): ?>
      <a href="<?= base_url("Usuario") ?>" class='nav-link dropdown'>Criar conta</a>
      <a href="<?= base_url("Usuario/login") ?>" class='nav-link dropdown'>Autentificar</a>
      <?php else: ?>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <!-- <img src="https://www.microlins.com.br/galeria/repositorio/images/noticias/como-posicionar-melhor-seu-perfil-no-linkedin/02-Como-posicionar-melhor-seu-perfil-do-Linkedin.png" class="user-image img-circle elevation-2" alt="User Image"> -->
          <span class="d-none d-md-inline"><?= $dados->nome." ".$dados->sobrenome ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="bg-warning">
            <div class="text-center pt-3">
              <img src="https://www.microlins.com.br/galeria/repositorio/images/noticias/como-posicionar-melhor-seu-perfil-no-linkedin/02-Como-posicionar-melhor-seu-perfil-do-Linkedin.png" class="img-circle elevation-2" alt="User Image" style="max-width: 75px;">
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 p-4">
                <p class="text-center">
                  <?= $dados->nome." ".$dados->sobrenome ?>
                  <br/>
                  <small>Membro desde <?= formata_data_info($dados->data_criacao) ?></small>
                </p>
              </div>
            </div>
          </li>
          <li class="user-body">
            <button type="button" class="btn btn-default btn-flat btn-block">Minhas Informações</button>
            <button type="button" class="btn btn-default btn-flat btn-block">Meus Serviços</button>
            <button type="button" class="btn btn-default btn-flat btn-block">Lista de favoritos</button>
            <button type="button" class="btn btn-default btn-flat btn-block">Serviços contratos</button>
            <a href="<?= base_url("Usuario/logout/$local") ?>" class="btn btn-default btn-flat btn-block">Sair</a>
          </li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>
</nav>