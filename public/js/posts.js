$(document).ready(function(){

		var container 		= $('.container');
		var btn_form_editar = container.find("#btn-form-editar");
		var form_posts 		= container.find("#form-posts");
		var tbody 			= $("tbody");
		var posts 			= container.find('#posts');
		var table_posts		= posts.find('#table-posts');
		var atualizar_posts	= posts.find('#atualizar-post');


		container.on('click', ".btn-deletar", function(){
			var id = $(this).attr('data-id');
			$.ajax({
				url: '/home/deletar/'+id,
				type: 'DELETE',
				success: function(data){
					if (data === 'Deletou') {
						location.reload();
					}else{
						alert('Ocorreu um erro ao deletar o post!');
					}
				}
			})
		})

	btn_form_editar.on('click', function(event){
		event.preventDefault();
		$.ajax({
			url: '/post/atualizar/'+form_posts.serialize(),
			type: 'PUT',
			success: function(data){
				if(data === 'atualizou'){
					alert('Post Atualizado com Sucesso');
					location.reload();
				}else{
					alert('Não atualizou');
				}
			}
		})
	});

	$.ajax({
		url : '/admin/painel/listar',
		datatype : 'json',
		success : function(data){
			var html = '';
			$.each(data, function(key, value){

				html+='<tr>';
				html+='<td>'+data[key].post_titulo+'</td>';
				html+='<td><a href="#" id="btn-editar" data-id="'+data[key].id+'">Editar</a></td>';
				html+='<td><a href="#" id="btn-deletar" data-id="'+data[key].id+'">Deletar</a></td>';
				html+='</tr>';
				
			});
			tbody.append(html);
		}
	})

	table_posts.on('click', '#btn-deletar', function(event){
		event.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			url : '/admin/post/deletar/'+id,
			type : 'DELETE',
			success: function(data){
				if(data === 'deletou'){
					alert('Post Deletado com Sucesso!');
					location.reload();
				}else{
					alert('Algum erro aconteceu. O post não foi Deletado :/')
				}
			}
		})
	});

});