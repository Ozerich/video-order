<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-calendar"></i></span>
        <h5>Музыка</h5>
        <div class="buttons">
            <a id="add-event" href="/reelconfig/music/add" class="btn btn-success btn-mini"><i class="icon-plus icon-white"></i> Добавить музыку</a>
        </div>
    </div>
    <div class="widget-content">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="id-column">Номер</th>
                <th class="pos-column">Позиция</th>
                <th>Имя</th>
                <th>Превью</th>
                <th class="actions-column">Действия</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($items as $item): ?>
            <tr>
                <td class="id-column"><?=$item->id?></td>
                <td class="pos-column"><input type="text" name="pos[<?=$item->id?>" value="<?=$item->pos?>"/></td>
                <td><?=$item->name?></td>
                <td><img src="<?=$item->getImageUrl()?>"/></td>
                <td class="actions-column">
                    <a href="/reelconfig/design/<?=$item->id?>" class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</a>
                    <a href="/reelconfig/design/delete/<?=$item->id?>" onclick="return confirm('Вы уверены что хотите удалить дизайн?');" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</a>
                </td>
            </tr>
                <? endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5"><a class="btn btn-mini" href="#"><i class="icon-tasks"></i> Сохранить порядок</a></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>