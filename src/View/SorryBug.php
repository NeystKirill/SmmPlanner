<?php 
namespace App\View ; 
class SorryBug extends \App\View\Main 
{
    protected function content(array $i_am_batman) 
    {
        ?>
      <main id="main-container" >
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-12">
                <h1 class="page-heading">
                    <i class="si si-close danger" aria-hidden="true">  <?= $i_am_batman["problem"] ?></i>
                    <button onclick="window.location.href='/'" style="background-color: red; color: white; padding: 10px 20px; margin-left: 40px ; border: none; cursor: pointer;text-align: center;">
                    <i class = "si si-logout" style = "margin-right: 10px;"></i>Turn Back
                </button>
                </h1>
                
            </div>
        </div>
    </div>
</main>

    <?php
    }
}