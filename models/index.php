<?php

include("../db.php");

if(isset($_GET['car'])){
    $sql = "SELECT * FROM model WHERE `name`='".$_GET['car']."'";
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
    <title>Модел - <?php echo $row['name'] ?></title>
    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/model.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <!-- Owl Carousel CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    .loader {
      width: 100%;
      height: 100vh;
      background: #111;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 999;
    }
    .loader img {
      width: 260px;
    }
    body.active {
        overflow-y: hidden;
    }
</style>
<script>
    window.onload = function () {
        let loader = document.querySelector('.loader');
        loader.style.display = 'none';
        document.body.classList.remove("active"); 
    }
</script>
<body>
    <div class="loader">
        <img src="../assets/images/logo-whitee.png" alt="" loading="lazy">
    </div>
    <div class="drive-modal">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <img src="../assets/images/Rectangle 16.png" class="w-100" loading="lazy" alt="">
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
    <!-- start home -->
    <section id="home">
        <header>
            <div class="container">
                <div class="nav-logo" data-aos="flip-right">
                    <a href="../"><img src="../assets/images/logo-black.png" loading="lazy" alt=""></a>
                </div>
                <div class="navigation" data-aos="flip-left">
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
        <div class="home-content">
            <div class="img-gradient">
                <img src="../assets/photos/<?php echo $row['banner'] ?>" loading="lazy" style="width: 100%; height: 100vh; object-fit: cover;" class="w-100" alt=""> 
            </div>
            <div class="d-flex flex-column align-items-center">
                <h1 data-aos="zoom-in"><?php echo $row['description'] ?></h1>
                <p data-aos="zoom-in">УЗНАТЬ БОЛЬШЕ</p>
                <img data-aos="zoom-in" src="../assets/images/icon.png" class="home-icon" alt="" loading="lazy">
            </div>
        </div>
    </section> 
    <!-- finish home -->

    <!-- start models -->
    <section id="models-p">
        <div class="models-navigation d-block d-lg-flex justify-content-center" data-aos="zoom-in">
            <a href="#exterior" class="text-decoration-none"><p class="m-5 text-center text-uppercase text-white fw-bold exterior">Галерея</p></a>
            <a href="#settings" class="text-decoration-none"><p class="m-5 text-center text-uppercase text-white fw-bold parameters">параметры модели</p></a>
            <a href="#highlights" class="text-decoration-none"><p class="m-5 text-center text-uppercase text-white fw-bold highlightsB">основные моменты модели</p></a>
            <a href="#testdrive" class="text-decoration-none"><p class="m-5 text-center text-uppercase text-white fw-bold consult">проконсультироваться</p></a>
            <!-- <a href="#" class="text-decoration-none"><p class="m-5 text-center text-uppercase text-white fw-bold download">скачать</p></a> -->
        </div>
        <div class="container" id="exterior">
            <style>
                .owl-carousel .owl-next, .owl-prev {
                    width: 40px;
                    height: 48px;
                    background: #F5F5F5 !important;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .owl-carousel .owl-next:hover, .owl-prev:hover {
                    color: #000 !important;
                }
                .owl-carousel .owl-next span, .owl-prev span {
                    font-size: 28px;
                }
                .owl-carousel .owl-dots {
                    display: none !important;
                }
            </style>
            <div class="owl-carousel owl-theme mt-5">
                <?php

                    $sql3 = "SELECT * FROM gallery WHERE model=".$row['id'];
                    $result3 = $conn->query($sql3);

                    if ($result3->num_rows > 0) {
                    // output data of each row
                        while($row3 = $result3->fetch_assoc()) {
                        ?>
                            <div class="item" data-aos="zoom-in">
                                <img src="../assets/photos/<?php echo $row3['url'] ?>" class="w-100 mt-5 mb-5 w-100 object-fit-" style="height: 600px;object-fit:cover;" alt="" loading="lazy">
                            </div>
                        <?php
                        }
                    } else {
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- finish models -->

    <!-- start model parametres -->
    <section id="settings">
        <h1 class="section-title" style="position: relative; top: 35px;z-index: 1;" data-aos="zoom-in">ПАРАМЕТРЫ МОДЕЛИ</h1>
        <div class="setting_linear">
            <img src="../assets/photos/<?php echo $row['character_image'] ?>" data-aos="zoom-in" class="w-100" alt="" loading="lazy">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4 cvb" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_wheel'] ?></h2>
                    <p>Wheel base [mm]</p> 
                </div>
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_range'] ?></h2>
                    <p>10 minutes super charge driving range</p>
                </div>
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_front'] ?></h2>
                    <p>Front overhang (mm)</p>
                </div>
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_tire'] ?></h2>
                    <p>Tire size</p>
                </div>
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_lwh'] ?></h2>
                    <p>L×W×H [mm]</p>
                </div>
                <div class="col-11 col-md-5 col-lg-3 p-2 px-4" data-aos="zoom-in">
                    <h2 style="word-break: break-all;"><?php echo $row['character_rear'] ?></h2>
                    <p>Rear overhang (mm)</p>
                </div>
            </div>
        </div>
    </section>
    <!-- finish model parametres -->

    <!-- start model highlights -->
    <section id="highlights">
        <h1 class="section-title mb-5" data-aos="zoom-in">model highlights</h1>
        <img  src="../assets/photos/<?php echo $row['model_info_1'] ?>" class="w-100 full-img   " alt="" loading="lazy" data-aos="zoom-in">

        <div class="highlights-content">
            <div class="h-left" data-aos="zoom-in">
                <img src="../assets/photos/<?php echo $row['model_info_2'] ?>" class="w-100" alt="" loading="lazy">
            </div>
            <div class="h-right" data-aos="zoom-in">
                <img src="../assets/photos/<?php echo $row['model_info_3'] ?>" class="w-100" alt="" loading="lazy">
            </div>
        </div>

        <div class="container text-white mt-4" data-aos="zoom-in">
            <p><?php echo $row['model_info_text'] ?></p>
        </div>


        <!-- <img src="../assets/images/image 11.png" class="w-100" alt="">
        <div class="container">
            <h3>STRONG POWER</h3>
            <p>Aerodynamic streamline shape Racing class chassis</p>
        </div>
        <div class="highlights-content">
            <div class="h-left">
                <img src="../assets/images/image 12.png" class="w-100" alt="">
                <h3>DAZZLING GAME-STYLE COCKPIT</h3>
            </div>
            <div class="h-right">
                <img src="../assets/images/image 13.png" class="w-100" alt="">
                <h3>MACH 1.5T ENGINE + GETRAG DCT <br> MACH 1.5T ENGINE + 6DCT</h3>
            </div>
        </div> -->
    </section>

    <!-- finish model highlights -->

    <!-- start filial -->
    <section id="branch">
        <h1 class="section-title" data-aos="zoom-in">Филиалы</h1>
        <div class="container mt-5">
        <div class="row">
                <div class="col-12 col-lg-5 filial">
                <?php
            
            $sql = "SELECT * FROM branches";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <h4 data-aos="zoom-in" class="mt-2" onclick='changeMap(`<?php echo $row["url"] ?>`)'><?php echo $row['location'] ?></h4>
            <?php
              }
            } else {
              echo "<p>филиалы еще не доступна!</p>";
            }
            ?>
                </div>
                <div class="col-12 col-lg-7 map">
                    <iframe loading="lazy" data-aos="zoom-in" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000.531729217137!2d69.20464567658313!3d41.23197407132003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae61e088bf1a7f%3A0xf03fd6c883154f46!2sDongfeng%20uzbekistan!5e0!3m2!1sen!2s!4v1699388576171!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- finish filial -->

    <!-- start contact -->
    <section id="testdrive" class="py-5">
    <h1 class="section-title" data-aos="zoom-in">Тест драйв</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-lg-6">
                    <img data-aos="zoom-in" src="../assets/images/contact.png" class="w-100 mb-4" alt="" loading="lazy">
                </div>
                <div class="col-12 col-lg-6">
                <form action="" id="drive_load_2" method="post" data-aos="zoom-in">
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

                            $sql = "SELECT * FROM model";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                              }
                            } else {
                            }
                        ?>
                        </select>
                        <div class="contact-btn d-flex justify-content-end">
                            <button class="btn1 ms-2" type="submit" form="drive_load_2" name="drive_load">Тест драйв</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- finish contact -->

    <footer class="bg-white">
        <div class="container">
            <div class="footer-img d-flex justify-content-center">
                <a href="./"><img src="../assets/images/logo-black.png" class="mt-5" width="250" alt="" loading="lazy" data-aos="zoom-in"></a>
            </div>
            <div class="footer-navigation d-block d-lg-flex justify-content-center text-center" data-aos="zoom-in">
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
            <div class="row text-center" data-aos="zoom-in">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <a href="#" class="text-black"><?php echo $row['phone'] ?></a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <a href="#" class="text-black"><?php echo $row['email'] ?></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 social" data-aos="zoom-in">
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



    <!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/models.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            stagePadding: 50,
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

        
    </script>
    <script>
        var swiperNews = new Swiper(".modelSwiper", {
            cssMode: true,
            spaceBetween: 50,
            navigation: {
                nextEl: ".news-next",
                prevEl: ".news-prev",
            },
            mousewheel: true,
            keyboard: true,
        });
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