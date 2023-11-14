<h4 class="d-flex justify-content-center ">Расписание занятий на сегодня</h4>
<div class="d-flex justify-content-center " style="margin-top: 20px;">
    <table>
        <style>
            th{
                width:200px;
                font-size:20px;

            }
            td{
                font-size:18px;
            }
        </style>

        <tr>
            <th>Название</th>
            <th>Учитель</th>
            <th>День</th>
            <th>Время</th>

        </tr>
        <?php foreach ($schedules as $schedule):?>
            <tr>
                <td><?php echo $schedule->section->name;?></td>
                <td><?php echo $schedule->teacher->surname. ' '. $schedule->teacher->name. ' '. $schedule->teacher->patronymic;?></td>
                <td><?php echo $schedule->date->date;?></td>
                <td><?php echo $schedule->time->time;?></td>

            </tr>

        <?php endforeach;?>
    </table>
</div>

</div>

</div>
<p>Нажмите, чтобы увидеть расписание на все дни</p>
<img src="../img/icon.png" style="width:30px;height:30px;">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Расписание
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Расписание на все дни</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center " style="margin-top: 20px;">
                    <table>
                        <style>
                            th{
                                width:200px;
                                font-size:20px;

                            }
                            td{
                                font-size:18px;
                            }
                        </style>

                        <tr>
                            <th>Название</th>
                            <th>Учитель</th>
                            <th>День</th>
                            <th>Время</th>

                        </tr>
                        <?php foreach ($scheduless as $schedule):?>
                            <tr>
                                <td><?php echo $schedule->section->name;?></td>
                                <td><?php echo $schedule->teacher->surname. ' '. $schedule->teacher->name. ' '. $schedule->teacher->patronymic;?></td>
                                <td><?php echo $schedule->date->date;?></td>
                                <td><?php echo $schedule->time->time;?></td>

                            </tr>

                        <?php endforeach;?>
                    </table>
                </div>
            </div>


        </div>


