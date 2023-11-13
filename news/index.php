<?php

include("../db.php");

if(isset($_GET['title'])){
    $sql = 'SELECT * FROM news WHERE `title`="'.$_GET['title'].'"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        if(isset($_POST['drive_load'])){
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $location = mysqli_real_escape_string($conn, $_POST['location']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            
            $sql1 = "INSERT INTO lids (fullname, phone, location, model) VALUES ('".$fullname."', '".$phone."', '".$location."', '".$model."')";
            
            if ($conn->query($sql1) === TRUE) {
            //   $_SESSION['success'] = "Вы успешно зарегистрировались на тест-драйв!";
            // echo "success";
            } else {
            //   $_SESSION['message'] = "Ошибка!";
            // echo "error";
            }
            
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$row['title']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/mainss.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="drive-modal">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <img src="../assets/images/Rectangle 16.png" loading="lazy" class="w-100" alt="">
                </div>
                <div class="col-12 col-lg-8">
                <form action="" id="drive_load" method="post">
                        <input type="text" class="form-control inp" placeholder="Имя" name="fullname" required>
                        <select class="form-select selct" name="location" required>
                            <option selected>Выберите</option>
                            <option value="Andijon">Andijon</option>
                            <option value="Buxoro">Buxoro</option>
                            <option value="Farg`ona">Farg`ona</option>
                            <option value="Jizzax">Jizzax</option>
                            <option value="Xorazm">Xorazm</option>
                            <option value="Namangan">Namangan</option>
                            <option value="Navoiy">Navoiy</option>
                            <option value="Qashqadaryo">Qashqadaryo</option>
                            <option value="Qoraqalpog`iston">Qoraqalpog`iston</option>
                            <option value="Samarqand">Samarqand</option>
                            <option value="Sirdaryo">Sirdaryo</option>
                            <option value="Surxandaryo">Surxandaryo</option>
                            <option value="Toshkent">Toshkent</option>
                        </select>
                        <input type="text" class="form-control inp" placeholder="Номер телефона" name="phone" required>
                        <select class="form-select selct" name="model" required>
                            <option selected>Модель</option>
                        <?php

                            $sql2 = "SELECT * FROM model";
                            $result2 = $conn->query($sql2);
                            
                            if ($result2->num_rows > 0) {
                              // output data of each row
                              while($row2 = $result2->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row2['name'] ?>"><?php echo $row2['name'] ?></option>
                            <?php
                              }
                            } else {
                            }
                        ?>
                        </select>
                        <div class="contact-btn d-flex justify-content-end">
                            <button class="btn1 modalClose"><i class="fa-solid fa-xmark"></i></button>
                            <button class="btn1 ms-2" type="submit" form="drive_load" name="drive_load">Тест драйв</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section id="home">
    <header>
            <div class="container">
                <div class="nav-logo" data-aos="fade-right">
                    <a href="../"><img src="../assets/images/logo-black.png" alt="" loading="lazy"></a>
                </div>
                <div class="navigation" data-aos="fade-left">
                    <a href="../">Главная</a>
                    <a href="../#aboutus">О нас</a>
                    <a href="../#models">Модели</a>
                    <a href="../#news">Новости</a>
                    <a href="../#branch">Филиалы</a>
                    <a href="../#contact">Конткаты</a>
                    <button class="testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i></button>
                </div>
                <div class="nav-bars">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>
    </section>

    <div class="wrapper">
        <img class="w-100" loading="lazy" style="width: 100%; height: 100vh; object-fit: cover;" src="../assets/photos/<?php echo $row['url'] ?>" alt="">
   </div>
     <div class="container-fluid aboutC" style="background: black;">
        <div class="container">
            <div class="mage">
                <h1 data-aos="fade-up"><?php echo $row['title'] ?></h1>
                <br>
                <p data-aos="fade-up"><?php echo $row['text'] ?></p>
                <p class="icen"><span><i class="fa-solid fa-calendar-days"></i></span>  <?php echo $row['date'] ?></p>
            </div>
        </div>
        <!-- <div class="container text-end" >
            <a href="#home"><button class="btn_up"><i class="fa-solid fa-chevron-up"></i></button></a>
        </div> -->
     </div>
        <br><br>

        <footer class="bg-white">
        <div class="container">
            <div class="footer-img d-flex justify-content-center">
                <a data-aos="fade-up" href="./"><img src="../assets/images/logo-black.png" loading="lazy" class="mt-5" width="250" alt=""></a>
            </div>
            <div class="footer-navigation d-block d-lg-flex justify-content-center text-center" data-aos="fade-up">
                <a href="./" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">ГЛАВНАЯ</a>
                <a href="#aboutus" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">О НАС</a>
                <a href="#models" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">МОДЕЛИ</a>
                <a href="#news" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">НОВОСТИ</a>
                <a href="#branch" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">ФИЛИАЛЫ</a>
                <a href="#contact" class="text-decoration-none text-dark mt-4 ms-lg-4 text-uppercase d-block">КОНТКАТЫ</a>
            </div>
            <?php
            
            $sql = "SELECT * FROM info WHERE id=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <div class="d-flex justify-content-between align-items-center">
            <div class="footer-nav2 mt-4">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <a href="#" class="text-black"><?php echo $row['phone'] ?></a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <a href="#" class="text-black"><?php echo $row['email'] ?></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 social">
            <a href="<?php echo $row['youtube'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-youtube"></i></button></a>
            <a href="<?php echo $row['telegram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-telegram"></i></button></a>
            <a href="<?php echo $row['instagram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-instagram"></i></button></a>
            <a href="<?php echo $row['facebook'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-facebook"></i></button></a>
            <a href="<?php echo $row['whatsapp'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-whatsapp"></i></button></a>
        </div>
            </div>
            <?php
              }
            } else {
              echo "<p>новости еще не доступна!</p>"; 
            }
            ?>
            <p class="text-secondary text-center mt-5">Dong Feng - 2023</p>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>

<?php

    }
    } else {
     header("Location: ../");
     exit();
    }
}else{
    header("Location: ../");
    exit();
}
?>