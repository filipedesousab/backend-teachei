<h1>Laratórios</h1>
<p><?php echo $this->Html->link("Adicionar um Laboratório", array('action' => 'add'));?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Bloco</th>
        <th>Andar</th>
        <th>Ação</th>
    </tr>

<?php 
//Aqui é onde nós percorremos nossa matriz $posts, imprimindo as informações dos posts 
foreach ($labs as $lab): ?>
    <tr>
        <td><?php echo $lab['Lab']['id']; ?></td>
        <td>
            <?php echo $lab['Lab']['nome'];?>
        </td>
        <td><?php echo $lab['Lab']['bloco']; ?></td>
        <td><?php echo $lab['Lab']['andar']; ?></td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $lab['Lab']['id']),array('confirm' => 'Deseja apagar o laboratório?')
            )?>
            <?php echo $this->Html->link('Edite', array('action' => 'edit', $lab['Lab']['id']));?>
        </td>
    </tr>
<?php endforeach; ?>

</table>