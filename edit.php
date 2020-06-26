<?php

    include "conexao.php";
    $conn = connect();

    try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM players WHERE id=:id");
      $stmt->bindParam(':id', $id);
      $id    = $_GET['id'];

      
      $stmt->execute();

      // set the resulting array to associative
      foreach($stmt->fetchAll() as $k=>$v) {

      $id      = $v['id'];
      $nome    = $v['nome'];
      $jogo    = $v['jogo'];
      $apelido = $v['apelido'];
      $email   = $v['email'];

      }
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>

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
            <h1 class="m-0 text-dark">EDITAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="view_list.php">Lista</a></li>
              <li class="breadcrumb-item active">Editar Player</li>
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
                <h3 class="card-title">Atualizar Dados</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" name="form_player" method="POST" action="update.php?id=<?php echo $id;?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" required disabled value="<?php echo $id;?>">
                  </div>
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome;?>" required>
                  </div>
                  <div class="form-group">
                    <label for="jogo">Jogo</label>
                    <input type="text" class="form-control" id="jogo" name="jogo" value="<?php echo $jogo;?>" required>
                  </div>
                  <div class="form-group">
                    <label for="apelido">NickName</label>
                    <input type="text" class="form-control" id="apelido" name="apelido" value="<?php echo $apelido;?>" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email de Contato</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" required>
                  </div>  
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php

include 'footer.php';

?>