<?$advantages = SiteHelper::showOption('ADVANTAGES')?>

<section class="section-numbers">
    <div class="wrapper">
        <div class="numbers">
            <div class="y-row">
                <?foreach ($advantages as $advantage):?>
                <div class="y-col y-col-3">
                    <div class="numbers-item">
                       <?=$advantage?>
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>