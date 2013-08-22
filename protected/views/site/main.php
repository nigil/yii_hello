<?

$this -> pageTitle = Yii::app() -> name;

$_info = $model -> getUsers();

if ($_info)
{
	?><table class='user_table'><?
	foreach ($_info as $user)
	{
		?><tr>
			<td><?= $user -> email ?></td>
			<td><?= $user -> company ?></td>
		</tr><?
	}
	?></table><?
}
else
{
	echo 'Список пользователей пуст';
}

?>


