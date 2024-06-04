
<nav role="navigation" aria-label="<?= lang('Pager.pagination') ?>" class="flex justify-center">
    <ul class="pagination flex items-center list-none">
        <?php if ($berita['pager']->hasPrevious()) : ?>
            <li>
                <a href="<?= $berita['pager']->getFirst() ?>" class="mr-1 px-3 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-200">
                    <?= lang('Pager.first') ?>
                </a>
            </li>
            <li>
                <a href="<?= $berita['pager']->getPrevious() ?>" class="mr-1 px-3 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-200">
                    &lt;
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($berita['pager']->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="mr-1 px-3 py-2 border border-gray-300 rounded-md <?= $link['active'] ? 'bg-blue-500 text-white' : 'text-gray-500 hover:bg-gray-200' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($berita['pager']->hasNext()) : ?>
            <li>
                <a href="<?= $berita['pager']->getNext() ?>" class="ml-1 px-3 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-200">
                    &gt;
                </a>
            </li>
            <li>
                <a href="<?= $berita['pager']->getLast() ?>" class="ml-1 px-3 py-2 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-200">
                    <?= lang('Pager.last') ?>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>
