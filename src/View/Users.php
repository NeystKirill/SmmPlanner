<?php 
namespace App\View ; 
class Users extends \App\View\Main
{
   
    protected function content(array $i_am_batman) 
    {
        ?>
        <main id="main-container">
            <div class="content bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-12">
                        <h1 class="page-heading">
                            <?= $i_am_batman['page_name'] ?><small></small>
                        </h1>
                    </div>
                </div>
                <div class="content">
                    <a class="btn btn-info push-15-r push-10 push-10-t pull-right" href="users/add"><i class="fa fa-plus"></i></a>
                    
                    <?= $this->table($this->columns_of_table() , $i_am_batman['users']); ?>
                </div> 
        </main>
        <?php

    }
    private function columns_of_table() 
    {
      return [
      'id' => [
        'label' => '#', 
        'class' => 'text-aling' , 
        'style' => ''
         ]  ,
        'email' => [
           'label' => 'users email' , 
           'class' => '' , 
           'style' => ''
           ] , 
        'username' => [
           'label' => 'users name', 
           'class' => '' , 
           'style' => ' ' , 
             ] ,
        'privilege' => [
             'label' => 'users privilege', 
             'class' => '' , 
             'style' => '' ,
            ] ,
        'action_of_row' => [
            'label' =>  'change' ,
            'class' => 'text-aling' , 
            'style' => 'widht: 100px' ,
            'buttons' => [
                'change' =>  [
                    'label' => 'change' ,   
                    'i_class' => 'fa fa-wrench' ,
                    'button_class' => 'btn btn-default push-10-r push-15' ,
                    'href' => '/users/change' 
                ] ,
                'delete' =>  [
                    'label' => 'delete' ,
                    'i_class' => 'fa fa-close' ,
                    'button_class' => 'btn btn-default push-10-r push-15' ,
                    'href' => '/users/delete' 
                ]
            ]
        ]
            
        ] ; 
    }
}   