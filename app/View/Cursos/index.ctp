<h1>Lista de Turmas</h1>
<p><?php echo $this->Html->link("Adicionar um Curso", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Sigla</th>
        <th>Ação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

<?php foreach ($cursos as $curso): ?>
    <tr>
        <td><?php echo $curso['Curso']['id']; ?></td>
        <td><?php echo $curso['Curso']['nome'];?></td>
        <td><?php echo $curso['Curso']['sigla'];?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $curso['Curso']['id']),array('confirm' => 'Deseja apagar a curso?')
            )?>
            <?php echo $this->Html->link('Edite', array('action' => 'edit', $curso['Curso']['id']));?>
        </td>
    </tr>
<?php endforeach; ?>

</table>