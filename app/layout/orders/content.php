<div id="pr-<?php echo $n['order']['id'] ?>" class="order-item m-b-16">
    <div class="campaign">
        <?php echo $n['order']['campaign'] ?>
    </div>
    <div class="w-full pd-15 d-flex flex-direction-column p-relative bg-gray-light justify-content-center">
        <a style="color: #6d6d6d; font-size: 18px;" href="<?php echo $n['site_url'] ?>?link=purchase-request&pr_id=<?php echo $n['order']['id'] ?>">
            <i class="far fa-calendar"></i> <?php echo $n['order']['date'] ?>
        </a>
        <p style="color: #6d6d6d; font-size: 16px;"><?php echo $n['order']['distributor'] ?> - <?php echo $n['order']['entrepreneur'] ?></p>
        <div class="p-absolute open-menu">
            <a onclick="openMenu(<?php echo $n['order']['id'] ?>)"><i id="icon-open-menu-<?php echo $n['order']['id'] ?>" class="fas fa-chevron-down"></i></a>
            <div id="menu-<?php echo $n['order']['id'] ?>" class="menu d-none">
                <a href="<?php echo $n['site_url'] ?>?link=purchase-request&pr_id=<?php echo $n['order']['id'] ?>">Abrir</a>
                <a href="<?php echo $n['site_url'] ?>?link=edit-purchase-req&pr_id=<?php echo $n['order']['id'] ?>">Editar</a>
                <a onclick="deletePr(<?php echo $n['order']['id'] ?>)">Borrar</a>
            </div>
        </div>
    </div>
</div>