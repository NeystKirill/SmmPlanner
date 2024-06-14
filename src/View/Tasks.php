<?php 
namespace App\View ; 
class Tasks extends \App\View\Main
{
   
    protected function content(array $i_am_batman) 
        {
            ?>
            <style>
                .fixed-size {
                    width: 350px;
                    height: 350px;
                    object-fit: cover; 
                }
            </style>
            <main id="main-container">
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-12">
                            <h1 class="page-heading">
                                <?= $i_am_batman['page_name'] ?><small></small>
                                <a class="btn btn-info push-15-r push-10 push-10-t pull-right" href="tasks/add"><i class="fa fa-plus"></i></a>
                            </h1>
                        </div>
                    </div>
                    <div class="block">
                    <?php
                        $columns = $this->columns_of_photo_table();
                        $this->table($columns, $i_am_batman['data']);
                    ?>
            </main>
    <?php

    }
    /**
    * Собственный метод table сделаный специально для отображения Tasks
    * @param array $columns Описание столбцов таблицы.
    * @param array $i_am_batman Данные для отображения в таблице.
    */
    protected function table(array $columns, array $data) 
    {
        ?>
        <div class="block">
                <div class="row">
                    <?php foreach ($data as $item): ?>
                        <div class="col-lg-4 col-md-9 col-sm-12 animated fadeIn">
                            <div class="img-container bg-gray-lightest p-30 fixed-block">
                                <?php foreach ($columns as $column => $options): ?>
                                    <?php if ($options['type'] == 'image' && isset($item[$column])): ?>
                                        <img class="<?= $options['class'] ?>" src="data:image/jpeg;base64,<?= base64_encode($item[$column]) ?>" alt="Image">
                                    <?php elseif ($options['type'] == 'text' && isset($item[$column])): ?>
                                        <p style="<?= $options['style'] ?>" class="<?=  $options['class'] ?>"><?= $options['label'] ,htmlspecialchars($item[$column]) ?></p>
                                    <?php elseif ($options['type'] == 'actions'): ?>
                                        <div class="<?= $options['class'] ?>">
                                            <?php foreach ($options['buttons'] as $button): ?>
                                                <a href="<?= $button['href']?>?id=<?= $item['id']?>&creator=<?= $item['creator']?>" class="<?= $button['button_class'] ?>"><i class="<?= $button['i_class'] ?>"></i> <?= $button['label'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
    }
    protected function columns_of_photo_table() 
    {
        return [
            'photo' => [
                'class' => 'img-responsive fixed-size',
                'type' => 'image'
            ],
            'task_name' => [
                'label' => '' ,
                'class' => 'h4 font-w700',
                'type' => 'text' ,
                'style' => ''
            ],
            'description' => [
                'label'=>'Description:<br>' ,
                'class' => 'h5',
                'type' => 'text' , 
                'style' => 'width: 350px; height: 50px'
            ],
            'post_date' => [
                'label'=> 'post date:' ,
                'class' => 'h5',
                'type' => 'text' ,
                'style' => ''
            ],
            'action_of_row' => [
                'class' => 'text-aling',
                'type' => 'actions',
                'buttons' => [
                    'change' => [
                        'label' => 'Change',
                        'i_class' => 'fa fa-wrench',
                        'button_class' => 'btn btn-default push-10-r push-15',
                        'href' => '/tasks/change'
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'i_class' => 'fa fa-close',
                        'button_class' => 'btn btn-default push-10-r push-15',
                        'href' => '/tasks/delete'
                    ]
                ]
            ]
        ];

    }
}