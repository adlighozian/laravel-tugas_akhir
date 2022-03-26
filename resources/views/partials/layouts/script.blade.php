{{-- CDN START --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
{{-- CDN END --}}
{{-- SIDEBAR_MENU START --}}
<script>
    var menu_btn = document.querySelector("#menu-btn")
    var sidebar = document.querySelector("#sidebar")
    var car_main = document.querySelector("#carMain")
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active")
        car_main.classList.toggle("active")
    })
</script>
{{-- SIDEBAR_MENU END --}}
{{-- SIDEBAR_ICON START --}}
<input id="param" type="hidden" value="<?= $menu ?>">
<script>
    // let param = document.getElementById("param").value;
    let param = "DASHBOARD";
    let menu2 = document.getElementById("menu2");
    let menu3 = document.getElementById("menu3");

    console.log(param);

    if (param == "CARS") {
        menu3.classList.add("active");
        menu2.classList.remove("active");
    } else if (param == "DASHBOARD") {
        menu2.classList.add("active");
        menu3.classList.remove("active");
    }
</script>
{{-- SIDEBAR_ICON END --}}
