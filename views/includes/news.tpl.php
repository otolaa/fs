<div class="row">
<?php if (isset($content) && is_array($content)) : ?>
<div class="col-12">
    <div class="list-group">
        <?php foreach ($content as $item) : ?>
        <a href="/news/<?=$item['id']?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <i class="bi bi-chat-right-quote-fill fs-4 flex-shrink-0"></i>
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0"><?=$item['title']?></h6>
                    <p class="mb-0 opacity-75"><?=$item['description']?></p>
                </div>
                <small class="opacity-50 text-nowrap"><i class="bi bi-calendar-check-fill"></i> <?=date('d.m H:i', strtotime($item['date']))?></small>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
</div>
