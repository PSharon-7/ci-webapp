<header class="main-header">
    <nav class="navbar navbar-static-top sidebar-nav">
        <a href="#" class="sidebar-toggle py-2" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
</header>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php if(!empty($userlist)){

            foreach($userlist as $v): ?>

            <li class="selectUser" id="<?=$v['id'];?>" title="<?=$v['name'];?>" card_info="<?=$v['card_info'];?>">
                <a class="users-list-name" href="#"><?=$v['name'];?></a>
            </li>

            <?php endforeach;} ?>

        </ul>
    </section>
</aside>