<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?=$title?></h5>
                    <p class="m-b-0"><?=$subtitle?></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <?php for ($i=0; $i < count($breadcrumb); $i++) { ?>
                        <?php if ($breadcrumb[$i]['href']): ?>
                        <li class="breadcrumb-item">
                            <a href="<?=$breadcrumb[$i]['tujuan']?>"><i class="fa <?=$breadcrumb[$i]['icon']?>"></i> </a>
                        </li>
                        <?php else: ?>
                        <li class="breadcrumb-item"><a href="javasript:void(0)"><?=$breadcrumb[$i]['title']?></a></li>
                        <?php endif ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>