<h1>Aulas</h1>
<p><?php echo $this->Html->link("Adicionar um Aula", array('action' => 'add'));?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Turma</th>
        <th>Professor</th>
        <th>Laboratório</th>
        <th>Data</th>
        <th>Ação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->
<?php //var_dump($aulas); echo "<br><br>";?>
<?php foreach ($aulas as $aula): ?>
    <tr>
        <td><?php echo $aula['Aula']['id']; ?></td>
        <td>
            <?php echo $aula['Curso']['sigla'].$aula['Turma']['periodo'].$aula['Turma']['turno'].$aula['Turma']['turma'];?>
        </td>
        <td><?php echo $aula['User']['nome']; ?></td>
        <td><?php echo $aula['Lab']['nome']; ?></td>
        <td><?php
        echo $this->Time->format($aula['Aula']['data'], '%e/%m/%Y'); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $aula['Aula']['id']),array('confirm' => 'Deseja apagar a aula?')
            )?>
            <?php echo $this->Html->link('Edite', array('action' => 'edit', $aula['Aula']['id']));?>
        </td>
    </tr>
<?php endforeach; ?>

</table>