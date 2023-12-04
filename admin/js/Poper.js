function PopUpMe(PopupSource) {
    const popSource = document.getElementById(PopupSource);
    const popcontent = document.getElementById('popup-content');
    const popup = document.getElementById("popup");
    const closeButton = document.getElementById("closePopup");
        popup.classList.add('show');
        setTimeout(() => {
            popcontent.innerHTML = popSource.innerHTML;
            popup.querySelector('.popup-content').classList.add('show');

if (PopupSource == "content") {
SubmitForms('.popup-content #adddoc', '.popup-content #error')
}
        }, 50); // Delay for the content to appear after the background
    closeButton.addEventListener("click", function() {
        popup.classList.remove('show');
        popup.querySelector('.popup-content').classList.remove('show');
    });
    window.addEventListener("click", function(event) {
        if (event.target === popup) {
            popup.classList.remove('show');
            popup.querySelector('.popup-content').classList.remove('show');
        }
    });
}