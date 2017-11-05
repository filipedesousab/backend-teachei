<h1>Lista de Turmas</h1>
<p><?php echo $this->Html->link("Adicionar um Turma", array('action' => 'add'));?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Abreviação</th>
        <th>Curso</th>
        <th>Período</th>
        <th>Turno</th>
        <th>Turma</th>
        <th>Ação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

<?php foreach ($turmas as $turma): ?>
    <tr>
        <td><?php echo $turma['Turma']['id']; ?></td>
        <td><?php echo $turma['Curso']['sigla'].$turma['Turma']['periodo'].$turma['Turma']['turno'].$turma['Turma']['turma'];?></td>
        <td><?php echo $turma['Curso']['nome'];?></td>
        <td><?php echo $turma['Turma']['periodo']; ?></td>
        <td><?php echo $turma['Turma']['turno']; ?></td>
        <td><?php echo $turma['Turma']['turma']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $turma['Turma']['id']),array('confirm' => 'Deseja apagar a turma?')
            )?>
            <?php echo $this->Html->link('Edite', array('action' => 'edit', $turma['Turma']['id']));?>
        </td>
    </tr>
<?php endforeach; ?>

</table>