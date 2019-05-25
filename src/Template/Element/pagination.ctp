<nav aria-label="Page navigation">
    <ul class="pagination pagination-sm">
        <?php

        $this->Paginator->templates([
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'ellipsis' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">...</a></li>'
        ]);

        $this->Paginator->templates([
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        $this->Paginator->templates([
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
        ]);

        ?>

        <?php echo $this->Paginator->first('<< Prima pagina'); ?>
        <?php echo $this->Paginator->prev('< Pagina anterioara'); ?>
        <?php echo $this->Paginator->numbers(['last' => 1]); ?>
        <?php echo $this->Paginator->next('Pagina urmatoare >'); ?>
        <?php echo $this->Paginator->last('Ultima pagina >>'); ?>

    </ul>
</nav>

<p><?= $this->Paginator->counter('Pagina {{page}} din {{pages}}, cu {{current}} rezultat(e) dintr-un total de {{count}}, de la {{start}} pana la {{end}}'); ?></p>
