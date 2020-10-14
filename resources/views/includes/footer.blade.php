
<footer class="card-footer d-flex justify-content-center">
    <h4 class="h4">Desarrollado por Manuel Jesus Hierro Pinto &copy; 
        <?php 
        $now =  date('Y-m-d H:i:s');
        $time   = strtotime($now);
        $time   = $time + (60*60); //Una hora mas
        $UnaHoraMas = date("Y-m-d H:i:s", $time);
        echo $UnaHoraMas 
        ?>
    </h4>
</footer>

</body>

</html>