<?php

include 'header.php';

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adicionar Player</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="view_list.php">Lista</a></li>
              <li class="breadcrumb-item active">ADD Player</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cadastrar Player</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" name="form_player" method="POST" action="cad_play.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome real do jogador" required>
                  </div>
                  <div class="form-group">
                    <label for="jogo">Jogo</label>
                    <input type="text" class="form-control" id="jogo" name="jogo" placeholder="Dígite o nome do seu jogo" required>
                  </div>
                  <div class="form-group">
                    <label for="apelido">NickName</label>
                    <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Dígite seu NickName" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email de Contato</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>  
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php

include 'footer.php';

?>