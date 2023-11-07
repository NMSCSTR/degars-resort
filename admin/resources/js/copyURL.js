function confirmCopy(text) {
    const confirmed = window.confirm('Are you sure you want to copy this checkouturl to the clipboard?');
    if (confirmed) {
    copyRefNoToClipboard(text);
    }
}

function copyUrlToClipboard(text) {
    const tempTextArea = document.createElement('textarea');
    tempTextArea.value = text;
    document.body.appendChild(tempTextArea);
    tempTextArea.select();
    document.execCommand('copy');
    document.body.removeChild(tempTextArea);
    alert('Checkout URL copied to clipboard');
}

function copyRefNoToClipboard(text) {
    const tempTextArea = document.createElement('textarea');
    tempTextArea.value = text;
    document.body.appendChild(tempTextArea);
    tempTextArea.select();
    document.execCommand('copy');
    document.body.removeChild(tempTextArea);
    alert('Transaction Reference copied to clipboard');
}
