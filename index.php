<?php
include("db.php");

if(isset($_POST['drive_load'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    
    $sql = "INSERT INTO lids (fullname, phone, location, model) VALUES ('".$fullname."', '".$phone."', '".$location."', '".$model."')";
    
    if ($conn->query($sql) === TRUE) {
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
    <title>Dong Feng</title>
    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/mainss.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
    .maxline {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* number of lines to show */
        line-clamp: 3; 
        -webkit-box-orient: vertical;
        }

        .map iframe {
            width: 100% !important;
        }
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
</head>
<script>
    window.onload = function () {
        let loader = document.querySelector('.loader');
        loader.style.display = 'none';
        document.body.classList.remove("active"); 
    }
</script>
<body class="active">
    <div class="loader">
        <img src="./assets/images/logo-whitee.png" alt="" loading="lazy">
    </div> 
    <div class="drive-modal">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 d-none d-lg-block" style="padding: 0px;">
                    <img src="./assets/images/Rectangle 16.png" class="w-100" alt="" loading="lazy">
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
                    <a href="#"><img src="./assets/images/logo-black.png" alt="" loading="lazy"></a>
                </div>
                <div class="navigation" data-aos="flip-left"> 
                    <a href="#">Главная</a>
                    <a href="#aboutus">О нас</a>
                    <a href="#models">Модели</a>
                    <a href="#news">Новости</a>
                    <a href="#branch">Филиалы</a>
                    <a href="#contact">Конткаты</a>
                    <button class="testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i></button>
                </div>
                <div class="nav-bars">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>
        <div class="swiper mySwiper vd-wrapper" style="top:65px;">
            <div class="swiper-wrapper ">
                <?php
                $sql = "SELECT * FROM banners";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                ?>
                <div class="swiper-slide vd-carusel" data-aos="zoom-in">
                <video src="./assets/videos/<?php echo $row['url'] ?>" autoplay muted loop=""></video>
                </div>
                <?php
                }
                } else {
                echo "<p>Нет доступного видео</p>";
                }
                ?>
            </div>
            <div class="vd-pg-wrapper">
                <div class="swiper-pagination vd-carusel-pg"></div>
                <button class="pauseBtn"><i class="fa-solid fa-pause"></i></button>
                <button class="playBtn"><i class="fa-solid fa-play"></i></button>
            </div>
          </div>
          <div class="after-vd-carusel-section text-center mt-5" data-aos="zoom-in" id="aboutus">
            <h1 data-aos="zoom-in">Мы ждем вас!</h1>
            <p data-aos="zoom-in">УЗНАТЬ БОЛЬШЕ</p>
            <img data-aos="zoom-in" src="./assets/images/icon.png" loading="lazy" alt="">
        </div>

    </section>
    <!-- finish home -->

    <!-- start video -->
    <section id="video-p" data-aos="zoom-in">
        <?php
        $sql = "SELECT * FROM about_us";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        ?>
        <video src="./assets/videos/<?php echo $row['url'] ?>" poster="./assets/photos/<?php echo $row['poster'] ?>"></video>
        <?php
        }
        } else {
        echo "<p>Пока ничего</p>";
        }
        ?>

        <div class="video-btn" data-aos="zoom-in">
            <button class="videoPauseBtn"><i class="fa-solid fa-pause"></i></button>
            <button class="videoPlayBtn"><i class="fa-solid fa-play"></i></button>
        </div>
    </section>
    <!-- finish video -->
  
    <!-- start logo -->
    <section id="logo-p">
        <div class="container">
            <div class="logo-img">
                <img data-aos="zoom-in" src="./assets/images/logo-whitee.png" loading="lazy" alt="">
            </div>
            <?php
            $sql = "SELECT * FROM about_us";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            ?>
            <p data-aos="zoom-in"><?php echo $row['text'] ?></p>
            <?php
            }
            } else {
            echo "<p>Пока ничего...</p>";
            }
            ?>
        </div>
    </section>
    <!-- finish logo -->

    <!-- start models -->
    <section id="models">
        <h1 class="section-title" data-aos="zoom-in">Лучшие модели</h1>
        <div class="container">
            <div class="swiper mySwiperModels mt-5">
                <div class="swiper-wrapper">

                    <?php
                    $sql = "SELECT * FROM model";
                    $result = $conn->query($sql); 

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide" data-aos="zoom-in">
                        <img class="w-100" src="./assets/photos/<?php echo $row['model_picture']?>" alt="" loading="lazy">
                        <div class="card-descr p-3" >
                            <a href="./models/?car=<?php echo $row['name'] ?>" class="text-decoration-none"><p><?php echo $row['name']?></p></a>
                            <div class="card-btns">
                                <div class="white imgBtn1"></div>
                                <div class="red imgBtn1 red1"></div>
                                <div class="orange imgBtn1"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    } else {
                    echo "<p>Пока ничего...</p>";
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div> 
    </section>
    <!-- finish models -->

    <!-- start news -->
    <section id="news">
        <h1 class="section-title" data-aos="zoom-in">Последние новости</h1>
        <div class="container">
            <div class="swiper mySwiper newsSwiper">
                <div class="swiper-wrapper">

                    <?php
                    $sql = "SELECT * FROM news";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide">
                        <div class="row mt-5">
                            <div class="col-12 col-lg-6 ml-5 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-in">
                                <h1 class="text-white mt-4"><?php echo $row['title'] ?></h1>
                                <p class="mt-4 maxline"><?php echo $row['text'] ?></p>
                                <a href="./news/?title=<?php echo $row['title'] ?>" class="mt-4 text-decoration-none">Читать далее <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="col-12 col-lg-6 order-1 order-lg-2 newsImg" data-aos="zoom-in">
                                <img src="./assets/photos/<?php echo $row['url'] ?>" class="w-100" alt="" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    } else {
                    echo "<p>Пока ничего...</p>";
                    }
                    ?>
                </div>
                <div class="swiper-button-next news-next"></div>
                <div class="swiper-button-prev news-prev"></div>
                <!-- <div class="swiper-pagination news-pagination"></div> -->
            </div>
        </div>
    </section>
    <!-- finish news -->

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
                <div class="col-12 col-lg-7 map" data-aos="zoom-in">
                    <iframe loading="lazy" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000.531729217137!2d69.20464567658313!3d41.23197407132003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae61e088bf1a7f%3A0xf03fd6c883154f46!2sDongfeng%20uzbekistan!5e0!3m2!1sen!2s!4v1699388576171!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- <section id="branch">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-lg-8">
                    <iframe class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563.9722692253597!2d69.20591796864444!3d41.23211889930348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae61e855615995%3A0x37df4b261b2605f3!2sHongqi%20Uzbekistan!5e0!3m2!1sen!2s!4v1698286246063!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-lg-4">
                    <img src="./assets/images/branch.png" class="w-100" alt="">
                    <h3 class="mt-3 text-white">Toshkent shahri, Yunusobod, Amir Temur ko’chasi 129-B</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna.</p>
                    <div class="w-100 d-flex justify-content-between mt-3">
                        <span><i class="fa-solid fa-clock"></i> 09:00-21:00</span>
                        <button class="btn1"><i class="fa-solid fa-location-arrow" onclick="getLocation('12')"></i> Get location</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- finish filial --> 

    <!-- start contact -->
    <section id="contact" class="py-5">
        <h1 class="section-title" data-aos="zoom-in">Тест драйв</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-lg-6" data-aos="zoom-in">
                    <img src="./assets/images/contact.png" class="w-100 mb-4" alt="" loading="lazy">
                </div>
                <div class="col-12 col-lg-6" data-aos="zoom-in">
                <form action="" id="drive_load_2" method="post">
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
                        <div class="contact-btn d-flex justify-content-end" data-aos="zoom-in">
                            <button class="btn1 ms-2" type="submit" form="drive_load_2" name="drive_load">Тест драйв</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- finish contact -->

    <footer class="bg-white" data-aos="zoom-in">
        <div class="container mt-5">
            <div class="footer-img d-flex justify-content-center">
                <a href="./"><img src="./assets/images/logo-black.png" class="mt-5" width="250" alt="" loading="lazy" data-aos="zoom-in"></a>
            </div>
            <div class="footer-navigation d-block d-lg-flex justify-content-center text-center">
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
                    <a data-aos="zoom-in" href="#" class="text-black"><?php echo $row['phone'] ?></a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <a data-aos="zoom-in" href="#" class="text-black"><?php echo $row['email'] ?></a>
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

    <!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        var swiper = new Swiper(".vd-wrapper", {
            spaceBetween: 30,
            pagination: {
            el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiperModels = new Swiper(".mySwiperModels", {
            slidesPerView: 4,
            spaceBetween: 30,
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            mousewheel: true,
            keyboard: true,
            breakpoints: {
                // when window width is >= 320px

                152: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                570: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        });
        
        var swiperNews = new Swiper(".newsSwiper", {
            cssMode: true,
            spaceBetween: 50,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
             },
            navigation: {
                nextEl: ".news-next",
                prevEl: ".news-prev",
            },
            pagination: {
                el: ".news-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
</body>
</html>