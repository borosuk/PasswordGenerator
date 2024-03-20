async function updateLengthValue(value) {
    document.getElementById('lengthValue').innerHTML = value;
}

async function copyToClipboard() {
    var pwd = document.getElementById('newPassword').innerHTML;
   	try {
		await navigator.clipboard.writeText(pwd);
	} catch (e) {
		alert(e);
	}
}