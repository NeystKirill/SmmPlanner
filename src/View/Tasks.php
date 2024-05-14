<?php 
namespace App\View ; 
class Tasks extends \App\View\Main
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
    </main>
      
        <?php

    }
}