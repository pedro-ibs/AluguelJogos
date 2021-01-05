<nav class="main-header navbar navbar-expand navbar-red navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("") ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          Categoria
        </a>
        <ul class="dropdown-menu">
          <?php foreach($categorias as $item): ?>
            <li><a class="dropdown-item" href="<?= base_url("Home/lista/").$item->nome."/".$item->id ?>"><?= $item->nome ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
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
          <span class="d-none d-md-inline"><?= $dados->nome ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <li class="bg-danger">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 p-4">
                <p class="text-center">
                  <?= $dados->nome ?>
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