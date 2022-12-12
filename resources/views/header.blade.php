<div class="main">
    <style>
        .navbar-nav {
            margin-left: auto;
        }
    </style>

    <nav class="navbar navbar-expand-sm bg-light">

        <ul class="navbar-nav">

            <li class="nav-item">
                <div class="clock m-1  bg-light text-secondary  rounded p-2">
                    Logged in as: {{$Employee->name}}
                </div>

            </li>
            <li class="nav-item">
                <div id="MyClockDisplay" class="clock m-1  bg-warning text-black  rounded p-2"
                     onload="showTime()"></div>
            </li>
        </ul>
    </nav>


</div>
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>
