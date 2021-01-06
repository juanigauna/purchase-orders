<tr id="product_<?php echo $n['product']['id'] ?>">
	<td class="pt-14"><?php echo $n['product']['page'] ?></td>
	<td class="pt-14"><?php echo $n['product']['description'] ?></td>
	<td class="pt-14"><?php echo $n['product']['code'] ?></td>
	<td class="pt-14" style="padding: 7px 7px;"><?php echo $n['product']['quantity'] ?></td>
	<td class="pt-14" style="padding: 7px 7px;">$<?php echo $n['product']['price'] ?></td>
	<td class="pt-14 p-relative">
		$<?php echo dep_price($n['product']['import'], 3) ?>
		<?php if (!isset($ready)) { ?>
			<span class="p-absolute" style="top: 2px;right: -45px; background: red; color: #fff; padding: 7px 10px; border-radius: 50px; font-size: 12px;" onclick="delete_product(<?php echo $n['product']['id'] ?>);"><i class="fas fa-trash"></i></span>
		<?php } ?>
	</td>
</tr>