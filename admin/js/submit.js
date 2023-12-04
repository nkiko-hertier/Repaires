function SendMe(dirPath, formId){
    let form = document.querySelector(formId);
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.open("POST", form.action, true);
        xhr.onload = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = xhr.response;
                if (data == 1) {
                    location.href = dirPath;
                } else {
                    alert(data);
                }
            }
            }
        }
        const formData = new FormData(form);
        xhr.send(formData);
    });
}