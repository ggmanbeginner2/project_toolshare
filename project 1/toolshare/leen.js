document.querySelectorAll('.leen-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const toolId = btn.dataset.toolId;
        document.getElementById('popupToolId').value = toolId;
        document.getElementById('leenPopup').style.display = 'flex';
    });
});

document.getElementById('closeLeenPopup').addEventListener('click', () => {
    document.getElementById('leenPopup').style.display = 'none';
});