function openMenu(id) {
	let classList = document.querySelector(`#menu-${id}`).classList
	if (classList[1] === 'd-none' || classList[1] === 'close-menu-anim') {
		document.querySelector(`#menu-${id}`).classList.remove('d-none')
		document.querySelector(`#menu-${id}`).classList.add('open-menu-anim')
		document.querySelector(`#icon-open-menu-${id}`).className = "fas fa-times"
	} else {
		document.querySelector(`#menu-${id}`).classList.remove('open-menu-anim')
		document.querySelector(`#menu-${id}`).classList.add('d-none')
		document.querySelector(`#icon-open-menu-${id}`).className = "fas fa-chevron-down"
	}
}
function ajax(n) {
	var xhr = new XMLHttpRequest()
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (n.dataType == 'json') {
				var res = JSON.parse(xhr.responseText)
			} else {
				var res = xhr.responseText
			}
			n.success && n.success(res)
		}
	}
	xhr.open(n.type, n.url, true)
	xhr.send(n.data)
}
function new_product(pr_id) {
	var data = new FormData(document.querySelector('#new-product'))
	var button = document.querySelector('#icon_btn').className
	document.querySelector('#icon_btn').className = 'spinner fas fa-spinner-third'
	ajax({
		type: 'POST',
		url: site_url() + '?f=new-product&pr_id=' + pr_id,
		data: data,
		success: function (res) {
			document.querySelector('#products').innerHTML += res
			document.querySelector('#icon_btn').className = button
			document.querySelector('#new-product').reset()
		}
	})
	return false
}
function delete_product(product_id) {
	ajax({
		dataType: 'json',
		type: 'POST',
		url: site_url() + '?f=delete_product&product_id=' + product_id,
		success: function (n) {
			if (n.status == 200) {
				document.querySelector('#product_' + product_id).remove()
			}
		}
	})
}
async function deletePr(prId) {
	await fetch(`${site_url()}?f=delete-purchase-request&pr_id=${prId}`, {
		method: 'DELETE'
	})
	.then(data => data.json())
	.then(data => {
		if (data.status === 200) document.querySelector(`#pr-${prId}`).remove()
		return Alert({
			text: data.message,
			duration: 2500,
			buttonText: 'Eliminar'
		})
	})
}
async function editPr(prId) {
	var data = new FormData(document.querySelector('#edit-purchase-req'))
	data.append('pr_id', prId)
	var button = document.querySelector('#loader').innerHTML
	document.querySelector('#loader').innerHTML = 'Cargando...'
	await fetch(`${site_url()}?f=edit-request`, {
		method: 'POST',
		body: data
	})
	.then(data => data.json())
	.then(data => {
		Alert({
			text: data.message,
			duration: 2500,
			buttonText: 'Borrar'
		})
		document.querySelector('#loader').innerHTML = button
	})
	.catch(error => alert(error))
}