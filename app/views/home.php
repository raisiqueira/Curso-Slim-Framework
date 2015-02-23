<div class="container">
<div class="row">

<h3><?php echo $titulo; ?></h3>

<?php foreach ($posts as $post): ?>

<div id="posts">
<h2><?php echo $post->post_titulo; ?></h2>
<p><?php echo $post->post_texto; ?></p>
<div class="funcoes">
<a href="/post/editar/<?php echo $post->id ?>" data-id="<?php echo $post->id; ?>">Editar</a> | 
<a href="#" class="btn-deletar" data-id="<?php echo $post->id; ?>">Deletar</a>
</div>

</div><!-- fim div posts -->
<?php endforeach; ?>

</div><!-- fim div row#1 -->

<div class="row">
<div class="col-md-6">

<form action="post/cadastrar" method="post" id="form-posts">

<div class="form-group">
<label>Titulo</label>
<input type="text" name="titulo" value="<?php echo isset($editar->post_titulo) ? $editar->post_titulo : ''; ?>" placeholder="titulo" class="form-control input-large">
</div>

<div class="form-group">
<label>texto</label>
<input type="text" name="texto" value="<?php echo isset($editar->post_texto) ? $editar->post_texto : ''; ?>" placeholder="texto" class="form-control input-large">
</div>

<div class="form-group">
<input type="hidden" name="postId" value="<?php echo isset($editar) ? $editar->id : ''; ?>">
<input type="submit" <?php echo isset($editar) ? 'id="btn-form-editar"' : ''; ?> name="cadastrar" value="<?php echo isset($editar) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-primary">
</div>
</form>
<?php echo isset($flash['erros']) ? $flash['erros'] : ''; ?>
</div><!-- fim div col 6 -->
</div><!-- fim div row#2 -->
</div><!-- fim div container -->