<h1>Pagina Users</h1>

<p><?php echo $this->Html->link("Adicionar um Usuario", array('action' => 'add'));?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Ação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->
<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $user['User']['nome'];?>
        </td>
        <td><?php echo $user['User']['email']; ?></td>
        <td>
            <?php echo $user['User']['professor'] == true?'Professor':''; ?>
            <?php echo $user['User']['professor'] == true && $user['User']['administrador'] == true ?'/':''; ?>
            <?php echo $user['User']['administrador'] == 1?'Administrador':''; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $user['User']['id']),array('confirm' => 'Deseja apagar o usuário?')
            )?>
            <?php echo $this->Html->link('Edite', array('action' => 'edit', $user['User']['id']));?>
        </td>
    </tr>
<?php endforeach; ?>

</table>