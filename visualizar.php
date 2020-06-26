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
            <h1 class="m-0 text-dark">Visualizar Player</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="view_list.php">Lista</a></li>
              <li class="breadcrumb-item active">Visualizar</li>
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
            
                <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> StrongKIll E-Sports.
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  DADOS
                  <address>
                    <strong><?php echo $nome;?></strong><br>
                    <?php echo $apelido;?><br>
                    <?php echo $jogo;?><br>
                    Email: <?php echo $email;?><br>
                  </address>
                </div>
                <!-- /.col -->
              </div>
            </div>

            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php

include 'footer.php';

?>