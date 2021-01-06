document.querySelectorAll('input').forEach(input => {
	if (input.id) {
		document.querySelector(`#${input.id}`).addEventListener('focus', () => {
			if (document.querySelector(`#label-${input.id}`)) {
				document.querySelector(`#label-${input.id}`).className = 'field-label field-label-focus'
			}
		})
		document.querySelector(`#${input.id}`).addEventListener('focusout', () => {
			if (document.querySelector(`#label-${input.id}`)) {
				document.querySelector(`#label-${input.id}`).className = 'field-label'
			}
		})
	}
})
document.querySelectorAll('textarea').forEach(textarea => {
	if (input.id) {
		document.querySelector(`#${textarea.id}`).addEventListener('focus', () => {
			if (document.querySelector(`#label-${textarea.id}`)) {
				document.querySelector(`#label-${textarea.id}`).className = 'field-label field-label-focus'
			}
		})
		document.querySelector(`#${textarea.id}`).addEventListener('focusout', () => {
			if (document.querySelector(`#label-${textarea.id}`)) {
				document.querySelector(`#label-${textarea.id}`).className = 'field-label'
			}
		})
	}
})
if (document.querySelector('#new-request')) {
	document.querySelector('#new-request').addEventListener('submit', e => {
		var data = new FormData(e.target)
		var button = document.querySelector('#loader').innerHTML
		document.querySelector('#loader').innerHTML = 'Cargando...'
		fetch(`${site_url()}?f=new-request`, {
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
		e.preventDefault()
	})
}
if (document.querySelector('#quantity') && document.querySelector('#price')) {
	document.querySelector('#quantity').addEventListener('keyup', e => {
		var quantity = this.value
		var price = document.querySelector('#price').value
		var total = Number(quantity) * Number(price)
		document.querySelector('#import').value = total
	})
	document.querySelector('#price').addEventListener('keyup', e => {
		var quantity = document.querySelector('#quantity').value
		var price = this.value
		var total = Number(quantity) * Number(price)
		document.querySelector('#import').value = total
	})
}
if (document.querySelector('#login')) {
	document.querySelector('#login').addEventListener('submit', e => {
		e.preventDefault()
		const data = new FormData(document.querySelector('#login'))
		const button = document.querySelector('#loader').innerHTML
		document.querySelector('#loader').innerHTML = 'Cargando...'
		fetch(`${site_url()}?f=login`, {
			method: 'POST',
			body: data
		})
		.then(data => data.json())
		.then(data => {
			if (data.status == 200) {
				setTimeout(() => {
					location.href = `${siteurl()}?link=new-request`
				}, 800)
			}
			Alert({
				text: data.message,
				duration: 2500,
				buttonText: 'Borrar'
			})
			document.querySelector('#loader').innerHTML = button
		})
		.catch(error => alert(error))
	})
}
if (document.querySelector('#register')) {
	document.querySelector('#register').addEventListener('submit', e => {
		e.preventDefault()
		const data = new FormData(document.querySelector('#register'))
		const button = document.querySelector('#loader').innerHTML
		document.querySelector('#loader').innerHTML = 'Cargando...'
		fetch(`${site_url()}?f=register`, {
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
	})
}
if (document.querySelector('#navigation')) {
	window.addEventListener('scroll', () => {
		if (window.scrollY >= 200) {
			document.querySelector('#navigation').style.position = "fixed"
			document.querySelector('#navigation').style.animationName = "headerAnimation"
			document.querySelector('#navigation').style.animationDuration = "300ms"
		} else {
			document.querySelector('#navigation').style.position = "absolute"
			document.querySelector('#navigation').style.animationName = ""
			document.querySelector('#navigation').style.animationDuration = ""
		}
	})
}