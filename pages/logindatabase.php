<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)){
        $conn = new mysqli("localhost","root","root","krashosting");

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $fail = true; //voor als er fout is ingelogd

        $arr = array(
            'email'=>array('(\<(/?[^\>]+)\>)'),
            'password'=>array('(\<(/?[^\>]+)\>)'),
        );

        $ok = true;
        foreach ($arr as $k=>$v) { //kijkt of wachtwoord geen xss heeft
            if (empty($_POST[$k])) {
                $ok = false;
                break;
            } else if (preg_match($v[0], $_POST[$k])) {
                $ok = false;
                break;
            }
        }
        if ($ok) {//xss ok ja of nee
            //pregmatch voor onze specifieke wachtwoord eisen
            if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%^&*()_\-+=\/*{[\]}\\\|])[0-9A-Za-z!@#$%^&*()_\-+=\/*{[\]}\\\|]{8,32}$/', $password)) {
                $sql = 'SELECT bedrijfs_email AS email, wachtwoord FROM medewerkers;';
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    if ($row['email'] === $email && $row['wachtwoord'] === $password) {
                        session_start();
                        $_SESSION['login'] = $email;
                        $fail = false; //voor als er fout is ingelogd
//                        header("Location:profilepage.php");
                        header("Location:login.php?gelukt=true"); //deze was om te testen mag weg zodra er een profilepage is
                    }
                }
            }
            if ($fail) { //checkt of er goed of fout is ingelogd
                session_start();
                if (isset($_SESSION['err'])){ //kijkt of er al een err session is
                    $_SESSION['err'] = $_SESSION['err'] + 1; //voegt +1 toe aan de error counter
                }else{
                    $_SESSION['err'] = 1; //maakt de error counter aan en stopt er 1 in
                }
                header('Location:login.php?err=true'); //stuurt je terug naar login.php (geeft ook een GET mee maar dat was zodat ik wist dat het werkte, doet niks)
            }
        } else {
            header("Location:login.php");
        }
    } else if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET)){ //checkt of je via logout naar deze pagina gaat
        $logout = $_GET['logout'];
        if(isset($logout) && !empty($logout)){ //logout systeem
            if($logout){
                session_start();
                session_destroy();
                header('Location:login.php');//stuurt je terug naar login zodra de code je heeft uitgelogd
            }
        }
    }