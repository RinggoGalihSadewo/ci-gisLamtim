<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
<nav id="navbar" class="navbar">
    <ul>
        <?php foreach ($menu as $key) : ?>
            <li><a href="<?= $key['url'] ?>" target="<?= $key['target'] ?>"><?= $key['title'] ?></a></li>
        <?php endforeach; ?>
        <li><a class="get-a-quote" href="<?= base_url('/peta') ?>">Mulai</a></li>
    </ul>
</nav><!-- .navbar -->