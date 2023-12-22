<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success" href="index.php?page=view/main"> <i
                    class="icofont-chart-histogram-alt"></i>
            Productivity </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/habits"><i
                                class="icofont-tasks"></i> Habits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/budget"><i
                                class="icofont-wallet"></i> Budget</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/journal"> <i
                                class="icofont-livejournal"></i>
                        Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/BOOK/books"><i
                                class="icofont-book"></i> Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/timer"><i class="icofont-clock-time"></i> Timer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=view/test"><i class="icofont-paper"></i> ToDo</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item justify-content-end">
                    <a class="nav-link" href="<?php if (empty($_SESSION['userId'])) {
                        echo 'index.php?page=view/USER/login';
                    } else {
                        echo 'index.php?page=view/USER/profile';
                    } ?>">
                        <i class="icofont-id-card"></i> Mon compte</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
