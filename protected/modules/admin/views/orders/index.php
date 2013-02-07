<div class="widget-box">
    <div class="widget-title">
        <span class="icon"><i class="icon-calendar"></i></span>
        <h5>Заказы</h5>
    </div>
    <div class="widget-content">
        <form action="/admin/<?=$alias?>/save_order" method="post">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="id-column">Номер</th>
                    <th class="time-column">Время заказа</th>
                    <th>Имя заказчика</th>
                    <th>E-mail заказчика</th>
                    <th class="num-column">Кадров</th>
                    <th class="actions-column">Действия</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($items as $item): ?>
                <tr>
                    <td class="id-column"><?=$item->id?></td>
                    <td class="time-column"><?=$item->created?></td>
                    <td><?=$item->name?></td>
                    <td><a href="mailto:<?=$item->email;?>"><?=$item->email?></a></td>
                    <td class="num-column"><?=count($item->frames);?></td>
                    <td class="actions-column">
                        <a href="/admin/orders/<?=$item->id?>" class="btn"><i class="icon-eye-open"></i> View</a>
                        <a href="/admin/orders/delete/<?=$item->id?>"
                           onclick="return confirm('Вы уверены что хотите удалить дизайн?');" class="btn btn-danger"><i
                                class="icon-remove icon-white"></i> Delete</a>
                    </td>
                </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>