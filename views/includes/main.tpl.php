<div class="row">
<div class="col-12">

    <form action="/link_add" method="POST">
        <div class="input-group input-group-lg mb-4">
            <span class="input-group-text" id="inputGroup-sizing-lg">
                <i class="bi bi-arrow-right-circle-fill"></i>
            </span>
            <input type="text" required name="add_you_url" placeholder="Your url" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            <button type="submit" class="btn btn-secondary input-group-text"><i class="bi bi-arrow-return-left"></i></button>
        </div>
    </form>

    <?php if (count($link) && is_array($link)) : ?>
    <div class="list-group mb-4">
        <?php foreach ($link as $item) : ?>
            <a href="/<?=$item['slug']?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <i class="bi bi-bullseye fs-4 flex-shrink-0"></i>
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0"><?=$item['slug']?></h6>
                        <p class="mb-0 opacity-75"><?=$item['url']?></p>
                    </div>
                    <small class="opacity-50 text-nowrap"><i class="bi bi-calendar-check-fill"></i> <?=date('d.m H:i', strtotime($item['date']))?></small>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (count($news) && is_array($news)) : ?>
    <div class="list-group">
        <?php foreach ($news as $item) : ?>
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
    <?php endif; ?>
</div>
</div>
