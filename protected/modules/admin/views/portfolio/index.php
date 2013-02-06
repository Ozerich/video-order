<div class="portfolio_list_page">
    <form action="" method="post" id="sort_form">
	
		<div class="actions">
			<a href="#" onclick="$('form').submit();return false;" class="left">Сохранить позиции</a>
			<a href="/admin/portfolio/view" class="right">Новый проект</a>
			<br clear="all"/>
		</div>
		
		<table>
			<thead>
			<tr>
				<th class="column-id">ID</th>
				<th class="column-pos">Позиция</th>
				<th class="column-name">Название</th>
				<th class="column-category">Категория</th>
				<th class="column-platforms">Платформы</th>
				<th class="column-actions">Действия</th>
			</tr>
			</thead>
			<tbody>
			<? foreach ($items as $item): ?>
			<tr>
				<td class="column-id"><?=$item->id?></td>
				<td class="column-pos"><input type="text" name="pos[<?=$item->id?>]" value="<?=$item->pos?>"/></td>
				<td class="column-name"><?=$item->name?></td>
				<td class="column-category"><?=$item->category->name?></td>
				<td class="column-platforms"><?=$item->getPlatformsText();?></td>
				<td class="column-actions">
					<a href="/admin/portfolio/view/id/<?=$item->id?>" class="action action-edit"></a>
					<a href="/admin/portfolio/platforms/id/<?=$item->id?>" class="action action-platforms"></a>
					<a href="/admin/portfolio/delete/id/<?=$item->id?>" onclick="return confirm('Уверены?');" class="action action-delete"></a>
				</td>
			</tr>
				<? endforeach;?>
			</tbody>
		</table>
		
		<div class="actions">
			<a href="#" onclick="$('form').submit();return false;" class="left">Сохранить позиции</a>
			<a href="/admin/portfolio/view" class="right">Новый проект</a>
			<br clear="all"/>
		</div>
		
	</form>
	
</div>