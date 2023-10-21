<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-calendar-check-fill me-1"></i> <?=date('d.m.Y H:i', strtotime($detail['date']))?>
            </div>
            <div class="card-body">
                <h1 class="card-title"><?=$detail['title']?></h1>
                <p class="card-text"><?=$detail['description']?></p>
                <a href="/news" class="card-link"><i class="bi bi-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>