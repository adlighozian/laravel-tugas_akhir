// VALIDATION START
function validation() {
    let alert = document.getElementById("alert");
    let email = document.getElementById("email").value;
    let emails = document.getElementById("email");
    let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.match(mailformat)) {
        alert.classList.add("d-none");
        emails.classList.remove("is-invalid");
    } else {
        alert.classList.remove("d-none");
        emails.classList.add("is-invalid");
    }
};
// VALIDATION END