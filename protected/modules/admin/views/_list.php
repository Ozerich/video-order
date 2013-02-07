<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-calendar"></i></span>
        <h5><?=$header?></h5>

        <div class="buttons">
            <a id="add-event" href="/admin/<?=$alias?>/add" class="btn btn-success btn-mini"><i
                    class="icon-plus icon-white"></i> <?=$new_label?></a>
        </div>
    </div>
    <div class="widget-content">
        <form action="/admin/<?=$alias?>/save_order" method="post">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="id-column">Номер</th>
                    <th class="visible-column">Видимый</th>
                    <th class="pos-column">Позиция</th>
                    <th>Имя</th>
                    <? if ($alias == "designs"): ?>
                    <th class="preview-column">Превью</th>
                    <? elseif ($alias == "music"): ?>
                    <th class="music-column">Файл</th>
                    <? elseif ($alias == "voices"): ?>
                    <th class="sex-column">Тия голоса</th>
                    <th class="music-column">Файл</th>
                    <? endif; ?>
                    <th class="actions-column">Действия</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($items as $item): ?>
                <tr>
                    <td class="id-column"><?=$item->id?></td>
                    <td class="visible-column"><input type="checkbox" name="visible[<?=$item->id?>]" <?=$item->visible ? 'checked="checked"' : ''?>/></td>
                    <td class="pos-column"><input type="text" name="pos[<?=$item->id?>]" value="<?=$item->pos?>"/></td>
                    <td><?=$item->name?></td>
                    <? if ($alias == "designs"): ?>
                    <td class="preview-column"><img src="<?=$item->getImageUrl()?>"/></td>
                    <? elseif ($alias == "music"): ?>
                    <td class="link-column"><a href="<?=$item->getFileUrl()?>" class="sm2_button"></a></td>
                    <? elseif ($alias == "voices"): ?>
                    <td class="sex-column"><?=$item->sex == 0 ? 'Женский' : 'Мужской'?></td>
                    <td class="music-column"><a href="<?=$item->getFileUrl()?>" class="sm2_button"></a></td>
                    <? endif; ?>
                    <td class="actions-column">
                        <a href="/admin/<?=$alias?>/<?=$item->id?>" class="btn btn-primary"><i
                                class="icon-pencil icon-white"></i> Edit</a>
                        <a href="/admin/<?=$alias?>/delete/<?=$item->id?>"
                           onclick="return confirm('Вы уверены что хотите удалить дизайн?');" class="btn btn-danger"><i
                                class="icon-remove icon-white"></i> Delete</a>
                    </td>
                </tr>
                    <? endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
                        <button class="btn btn-mini" href="#"><i class="icon-tasks"></i> Сохранить</button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>