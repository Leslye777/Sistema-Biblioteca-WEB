<?php  
	include '../controller/Usuario.php';
	$usuarios = new Usuario();
	$usuarios = $usuarios->consultarTodosUsuarios();
?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="js/jquery.tablesorter.min.js"></script>
    <script src="js/jquery.tablesorter.pager.js"></script>
	<form method="post" action="exemplo.html" id="frm-filtro" class="consultas">
      <p>
        <label for="pesquisar">Pesquisar</label>
        <input type="text" id="pesquisar" name="pesquisar" size="30" />
      </p>
    </form>
 	<table cellspacing="0" summary="Tabela de dados fictícios">
 		<thead>
 			<tr>
 				<th>ID</th>
 				<th>Nome</th>
 				<th>CPF</th>
 				<th>Telefone</th>
 				<th>Endereço</th>
 				<th>Sexo</th>
 				<th>Ações</th>
 			</tr>
 		</thead>
 		<tbody>

 			<?php foreach ($usuarios as $user) {?>
 			<tr>
 				<td><?php echo $user['usuario_id'] ?></td>
 				<td><?php echo $user['usuario_nome'] ?></td>
 				<td><?php echo $user['usuario_cpf'] ?></td>
 				<td><?php echo $user['usuario_telefone'] ?></td>
 				<td><?php echo $user['usuario_endereco'] ?></td>
 				<td><?php echo $user['usuario_sexo'] ?></td>
 				<td>
            		<a href="?pg=alterar_usuarios&id=<?php echo $user['usuario_id'] ?>"><img src="image/edit.png" width="16" height="16" /></a>
            		<a href="..\controller\ConExcluiUsuario.php?id=<?php echo $user['usuario_id'] ?>" class="excluir"><img src="image/delete.png" width="16" height="16" /></a>
          		</td>
 			</tr>
 			<?php } ?>
 		</tbody>
 	</table>
    <div id="pager" class="pager">
    	<form class="consultas">
				<span>
					Exibir <select class="pagesize">
							<option selected="selected"  value="15">15</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option  value="40">40</option>
					</select> registros
				</span>

			<img src="image/first.png" class="first"/>
    		<img src="image/prev.png" class="prev"/>
    		<input type="text" class="pagedisplay" readonly/>
    		<img src="image/next.png" class="next"/>
    		<img src="image/last.png" class="last"/>
    	</form>
    </div>

 	<script>
	    $(function(){
	      
	      $('#marcar-todos').click(function(){
	        $('table > tbody > tr > td > :checkbox')
	          .attr('checked', $(this).is(':checked'))
	          .trigger('change');
	      });
	      
	      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
	        var tr = $(this).parent().parent();
	        if($(this).is(':checked')) $(tr).addClass('selected');
	        else $(tr).removeClass('selected');
	      });
	      
	      $('form').submit(function(e){ e.preventDefault(); });
	      
	      $('#pesquisar').keydown(function(){
	        var encontrou = false;
	        var termo = $(this).val().toLowerCase();
	        $('table > tbody > tr').each(function(){
	          $(this).find('td').each(function(){
	            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
	          });
	          if(!encontrou) $(this).hide();
	          else $(this).show();
	          encontrou = false;
	        });
	      });
	      
	      $("table") 
	        .tablesorter({
	          dateFormat: 'uk',
	          // headers: { colunas que nao poderão ser ordenadas
	          //   0: {
	          //     sorter: false
	          //   },
	          //   5: {
	          //     sorter: false
	          //   }
	          // }
	        }) 
	        .tablesorterPager({container: $("#pager")})
	      
	      $('.conteudoSistema').removeClass('conteudoSistema');
	    });

	 	$(document).ready(function(){
	   		$(".excluir").click( function(event) {
	      		var apagar = confirm('Deseja realmente excluir este registro?');
	      		if (apagar){
					// aqui vai a instrução para apagar registro			
	      		}else{
	         	event.preventDefault();
	      	}	
	   		});
		});
    </script>