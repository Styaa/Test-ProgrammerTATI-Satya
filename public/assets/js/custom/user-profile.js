document.getElementById('atasan_id').addEventListener('change', function () {
    const atasanId = this.value;

    fetch(updateAtasan, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                atasan_id: atasanId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Atasan berhasil diperbarui!');
            } else {
                alert('Gagal memperbarui atasan.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memperbarui atasan.');
        });
});
