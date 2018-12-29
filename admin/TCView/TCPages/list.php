<?php $this->tcTheme->header(); ?>
    <main>
        <div class="container">
            <h3>Pages <a href="/admin/pages/create/">create</a></h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pages as $page) : ?>
                    <tr>
                        <th scope="row"><?=$page['id'];?></th>
                        <td><?=$page['title'];?></td>
                        <td><?=$page['date'];?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </main>
<?php $this->tcTheme->footer(); ?>