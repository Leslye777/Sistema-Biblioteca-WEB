<?php  
	include '../controller/Emprestimo.php';
	$emprestimos = new Emprestimo();
	$emprestimos = $emprestimos->consultarTodosEmprestimos();
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
 	<table cellspacing="0">
 		<thead>
 			<tr>
 				<th>ID</th>
 				<th>ID Locatario</th>
 				<th>ID Livro</th>
 				<th>Data do Empréstimo</th>
 				<th>Data para Devolver</th>
 				<th>Data de Devolção</th>
 				<th>Status</th>
 				<th>Ações</th>
 			</tr>
 		</thead>
 		<tbody>

 			<?php foreach ($emprestimos as $emprestimo) {?>
 			<tr>
 				<td><?php echo $emprestimo['emp_id'] ?></td>
 				<td><?php echo $emprestimo['emp_locatario_id'] ?></td>
 				<td><?php echo $emprestimo['emp_livro_id'] ?></td>
 				<td><?php echo $emprestimo['emp_dt_locacao'] ?></td>
 				<td><?php echo $emprestimo['emp_dt_entrega'] ?></td>
 				<td><?php echo $emprestimo['emp_dt_devolucao'] ?></td>
 				<td><?php echo $emprestimo['emp_status'] ?></td>
 				<td>
            		<a href="?pg=alterar_emprestimos&id=<?php echo $emprestimo['emp_id'] ?>""><img src="image/edit.png" width="16" height="16" /></a>
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
	      
	      
	      $('table > tbody > tr').hover(function(){
	        $(this).toggleClass('hover');
	      });
	      
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
    </script>