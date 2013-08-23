<?

$this -> pageTitle = Yii::app() -> name.' - Main';

?><h1>Main</h1><?

$_info = $model -> getUsers();

if ($_info)
{
	?><table class='user_table'>
		<thead>
			<tr>
				<th>Login</th>
				<th>Company</th>
			</tr>
		</thaed>
		<tbody>
	<?
	foreach ($_info as $user)
	{
		?><tr>
			<td><?= $user -> email ?></td>
			<td><?= $user -> company ?></td>
		</tr><?
	}
	?>
		</tbody>
	</table><?
}
else
{
	echo 'Список пользователей пуст';
}

?>


