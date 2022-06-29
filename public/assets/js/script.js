// HIDE_SHOW_PASSWORD START

function hide() {
    var x = document.getElementById("password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if (x.type === "password") {
        x.type = "text";
        y.classList.add("hidden");
        z.classList.remove("hidden");
    } else {
        x.type = "password";
        y.classList.remove("hidden");
        z.classList.add("hidden");
    }
}

// HIDE_SHOW_PASSWORD END

// SIDEBAR START

function sidebar() {
    var x = document.getElementById("sidebar");
    var y = document.getElementById("sidebar_bg");

    x.classList.toggle("left-0");
    y.classList.toggle("hidden");
}

function sidebar2() {
    var x = document.getElementById("sidebar");
    var elems = document.querySelectorAll("#sidebar_list");
    var y = document.querySelectorAll("#sidebar_list2");

    x.classList.toggle("sm:w-[350px]");

    for (let i = 0; i < y.length; i++) {
        y[i].classList.toggle("sm:justify-center");
        y[i].classList.toggle("sm:pl-0");
    }

    for (let i = 0; i < elems.length; i++) {
        elems[i].classList.toggle("sm:hidden");
    }
}

// SIDEBAR END
