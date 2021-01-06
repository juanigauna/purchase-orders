function Alert(data) {
	let buttonText = "Delete"
	if (data.buttonText) buttonText = data.buttonText
	
	const id = Math.floor(Math.random() * (100000 - 1) + 1)

	const alert = document.createElement('div')
    alert.id = id
    alert.className = 'alert'
	alert.style.animationDuration = `${data.duration}ms`
	
	if (data.onclick) alert.onclick = data.onclick

    alert.innerHTML = `
        <p>${data.text}</p>
        <button onclick="document.getElementById(${id}).remove(); return false">${buttonText}</button>
    `
    document.body.appendChild(alert)
    setTimeout(() => alert.remove(), data.duration)
}