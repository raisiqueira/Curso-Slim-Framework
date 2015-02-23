Bem vindo <?php echo $nome; ?>

<div id="posts">
	
	<table class="table table-striped table-hover" id="table-posts">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
		</thead>

		<tbody>
		</tbody>
	</table>

	<div id"atualizar-post">
	<div class="col-md-8">
		<form method="" action="">
		<div class="form-group">
			<input type="text" name="post-titulo" id="post-titulo" value="" class="form-control input-large">
		</div>

		<div class="form-group">
			<input type="text" name="post-texto" id="post-texto" value="" class="form-control input-large">
		</div>

		<div class="form-group">
			<input type="submit" name="post-enviar" class="btn btn-primary" value="Atualizar">
		</div>

		</form>
	</div><!-- fim div col -->
	</div><!-- fim #atualizar-posts -->
</div><!-- fim #posts -->