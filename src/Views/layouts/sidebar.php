<div class="sidebar">
    <div class="app-logo"><img src="/images/thumb.jpg"/ class="img-fluid"></div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == "/calendar" ? "active" : "");?>" href="/calendar">Calender</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == "/" ? "active" : "");?>" href="/">Todo</a>
        </li>
    </ul>
</div>
