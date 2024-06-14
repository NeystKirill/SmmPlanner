<?php 
namespace App\View;

/**
 * Класс представления для страницы управления Instagram аккаунтами.
 */
class Insta extends \App\View\Main
{
    /**
     * Генерирует HTML контент для страницы управления Instagram аккаунтами.
     * 
     * @param array $i_am_batman Ассоциативный массив с данными, которые будут использованы на странице.
     */
    protected function content(array $i_am_batman)
    {
        ?>
        <main id="main-container">
            <div class="content bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-12">
                        <h1 class="page-heading">
                            <?= $i_am_batman['page_name'] ?>
                        </h1>
                    </div>
                </div>
                <div class="content">
                    <a class="btn btn-info push-15-r push-10 push-10-t pull-right" href="insta/add"><i class="fa fa-plus"></i></a>
                    
                    <?= $this->table($this->columns_of_table(), $i_am_batman['users']); ?>
                </div> 
            </div>
        </main>
        <?php
    }

    /**
     * Определяет столбцы таблицы для отображения Instagram аккаунтов.
     * 
     * @return array Массив с конфигурацией столбцов таблицы.
     */
    private function columns_of_table()
    {
        return [
            'id' => [
                'label' => '#', 
                'class' => 'text-align', 
                'style' => 'width: 50px'
            ],
            'creator' => [
                'label' => 'Creator',
                'class' => '', 
                'style' => '' 
            ],
            'username' => [
                'label' => 'Account Name', 
                'class' => '', 
                'style' => ''
            ],
            'action_of_row' => [
                'label' => 'Actions',
                'class' => '', 
                'style' => 'width: 100px',
                'buttons' => [
                    'change' => [
                        'label' => 'Change',   
                        'i_class' => 'fa fa-wrench',
                        'button_class' => 'btn btn-default push-5-r push-10',
                        'href' => '/insta/change'
                    ],
                    'delete' => [
                        'label' => 'Delete',
                        'i_class' => 'fa fa-close',
                        'button_class' => 'btn btn-default push-5-r push-10',
                        'href' => '/insta/delete'
                    ]
                ]
            ]
        ];
    }
}
