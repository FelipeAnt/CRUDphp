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
            <h1 class="m-0 text-dark">Lista de Players</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Players</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">




      	    <div class="card">
                 <div class="card-header">
                 <small class="float-right"><a href="add_player.php"> <button type="button" class="btn btn-block btn-primary">ADD Player</button></a> </small>
                 </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nº Código</th>
                    <th>Nome</th>
                    <th>Jogo</th>
                    <th>NickName</th>
                    <th>E-Mail</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php

						include "conexao.php";
						$conn = connect();

						try {
						  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						  $stmt = $conn->prepare("SELECT * FROM players");
						  $stmt->execute();

						  // set the resulting array to associative
						  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
						  foreach($stmt->fetchAll() as $k=>$v) {
							//echo $v;
							//var_dump($v);
							echo '<tr>';
							echo '<td>'.$v['id'].'</td>';
							echo '<td>'.$v['nome']. '</td>';
							echo '<td>'.$v['jogo'].'</td>';
							echo '<td>'.$v['apelido'].'</td>';
							echo '<td>'.$v['email'].'</td>';
							echo '<td style="text-align:center"> 
                    <a class="btn btn-primary btn-sm" href="visualizar.php?id='.$v['id'].'"><i class="fas fa-folder"></i></a>
                    <a class="btn btn-info btn-sm" href="edit.php?id='.$v['id'].'"><i class="fas fa-pencil-alt"></i></a>
							      <a class="btn btn-danger btn-sm" href="delete.php?id='.$v['id'].'" data-href="delete.php?id='.$v['id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i></a>		
							      </td>';
							echo '</tr>';
						  }
						} catch(PDOException $e) {
						  echo "Error: " . $e->getMessage();
						}
						$conn = null;
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php

include 'footer.php';

?>

<div class="modal fade" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Confirmar Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que quer excluir este player?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-outline-light btn-ok">Sim! excluir.</a>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->