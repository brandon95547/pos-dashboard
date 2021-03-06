<footer class="footer">
        <div class="container">
            <!-- <span class="text-muted">Place sticky footer content here.</span> -->
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./assets/compressed/picker.js"></script>
    <script src="./assets/compressed/picker.date.js"></script>
    <script src="./assets/main.js?v=<?php echo time(); ?>"></script>

    <?php
        switch($_SERVER['REQUEST_URI']) {
            case '/' :
            case '/page-settings.php' :
            case '/orders.php' :
            case '/login.php' :
            case '/food.php' :
                echo '<script src="./assets/index.js?v=' . time() . '"></script>';
            break;
            case '/condiments.php' :
                echo '<script src="./assets/condiments.js?v=' . time() . '"></script>';
            break;
            case '/report.php' :
                echo '<script src="./assets/reports.js?v=' . time() . '"></script>';
            break;

        }
    ?>

    <script>

    </script>
</body>

</html>