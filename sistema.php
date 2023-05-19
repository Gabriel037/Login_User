<?php
    session_start();
    include_once('config.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['email'];

	$sql = "SELECT * FROM user ORDER BY id";

    $result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Sistema | C.R.U.D</title>
		<style>
			* {
				padding: 0px;
				margin: 0px;
			}
			body {
				display: grid;
				grid-template-columns: 90% 10%;
				grid-template-rows: 15vh 1fr;
				grid-template-areas: "system-top system-exit"
									 "system-content system-content";
				background-color: #633197;
			}
			h1 {
				display: grid;
				grid-area: system-top;
				display: flex;
				justify-content: center !important;
				flex-direction: column !important;
				align-items: center !important;
				font-family: 'Tilt Warp', cursive;
				font-size: 3em;
				position: relative;
				margin-top: 20px;
				color: #fefefe;

			}
			.tabela-geral {
				display: grid;
				grid-area: system-content;
				padding: 7px ;
				margin: 8px;
				background-color: #fefefe;
			}
			#exit {
				display: grid;
				grid-area: system-exit;
				width: 50px;
				height: 50px;
				align-items: center;
				justify-content: center;
				background-color:  #ff8000;

			}
			.exit {
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			</style>
    </head>
	
	<body>
		<h1>Tabela C.R.U.D</h1>
		<span class="exit">
			<a id='exit' class='btn btn-secondary'  href='sair.php'>
				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-right' viewBox='0 0 16 16'>
				<path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
				<path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
				</svg>
			</a>
		</span>

	<div class="tabela-geral">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">Telefone</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($user_data = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$user_data['id']."</td>"; 
						echo "<td>".$user_data['nome']."</td>"; 
						echo "<td>".$user_data['email']."</td>"; 
						echo "<td>".$user_data['telefone']."</td>";
						echo "<td>
						<a class='btn btn-success' href='cadastro.php?id=$user_data[id]' title='Criar'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
							<path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
							</svg>
						</a>
						<a class='btn btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
								<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
					 		</svg>
						</a>
						<a class='btn btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
							<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
					  		</svg>
						</a>
						</td>";
						echo "</tr>"; 
					}
				?>
				
			</tbody>
		</table>	

	</div>
	
</body>
</html>