document.querySelectorAll('.leen-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const toolId = btn.getAttribute('data-tool-id');
        document.getElementById('popupToolId').value = toolId;

        document.getElementById('leenPopup').style.display = 'flex';
    });
});

document.getElementById('closeLeenPopup').addEventListener('click', () => {
    document.getElementById('leenPopup').style.display = 'none';
});