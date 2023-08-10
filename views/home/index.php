<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio</title>
  <link rel="shortcut icon" href="assets/img/logo/icon.svg" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
  <header>
    <nav id="mynav" class="nav-fixed">
      <a href="#" class="logo">
        <img src="assets/img/logo.png" alt="logo">
      </a>
      <button class="nav-toggler" id="nav-toggler">
        <i class="ri-apps-2-line"></i>
      </button>
      <div class="navmenu" id="navmenu-top">
        <button class="nav-toggler" id="nav-close">
          <i class="ri-close-line"></i>
        </button>
        <ul>
          <?php 
            if(isset($_COOKIE['login'])){
              echo "<li><a href='/admin/dashboard'>Dashboard</a></li>";
            }else{
              echo "<li><a href='/login'>Login</a></li>";
            }
          ?>
          <li><a href="#home">Home</a></li>
          <li><a href="#skills">Skill</a></li>
          <li><a href="#projects">Projects</a></li>  
        </ul>
        <div class="social-media-wrapper">
          <?php
          foreach($sosial_media as $item){
            echo '
            <div class="social-media">
              <a target="_blank" href="'.$item->link.'"><img src="'.$item->getImage().'"></a>
            </div>
            ';
          }
          ?>
          <!-- <div class="social-media">
            <a target="_blank" href="https://www.linkedin.com/in/randy-abdul-rahman-0a0011161/"><i class="ri-linkedin-fill"></i></a>
          </div>
          <div class="social-media">
            <a target="_blank" href="https://www.instagram.com/rahmanrandyabdul/"><i class="ri-instagram-fill"></i></a>
          </div>
          <div class="social-media">
            <a target="_blank" href="https://wa.me/+6283895172024"><i class="ri-whatsapp-fill"></i></a>
          </div> -->
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div id="content">
      <article class="banner" id="home">
        <div class="banner-container">
          <div class="banner-content">
            <div class="tagline">
              <!-- Selamat Datang -->
              <?php echo $banner->tagline ?>
            </div>
            <h1><span id="banner-h1"></span></h1>
            <p>
            <?php echo $banner->paragraf ?>
              <!-- Web Portofolio ini adalah kumpulan dari skill dan projek yang saya miliki sebagai seorang web developer. -->
            </p>
            <a href="#contact">
              Hubungi Saya <i class="ri-arrow-right-circle-line"></i>
            </a>
          </div>
          <div>
            <img class="img-header" src="assets/img/8.png" alt="image header">
          </div>
        </div>
      </article>
      <article class="relative" id="skills">
        <img src="assets/img/angryimg.png" alt="bg-image-left" class="background-image-left">
        <div class="skill">
          <div class="skill-bx">
            <h2>Skills</h2>
            <p>Bagaikan alat-alat magis yang dapat menciptakan projek yang luar biasa. Berikut ini adalah sejumlah utilitas dan kemampuan yang saya terapkan dalam setiap proyek yang saya buat, untuk memastikan hasil yang optimal.</p>
            <div class="skill-container">
              <?php
              foreach($skills as $skill){
                echo '
                <div class="skill-logo">
                  <img src="'.$skill->getImage().'" alt="'.$skill->name.'">
                </div>
                ';
              }
              ?>
            </div>
          </div>
        </div>
      </article>
      <article class="relative" id="projects">
        <div class="project">
          <h2>Projects</h2>
          <p>Berikut ini adalah berbagai projek yang telah saya buat, dengan kemampuan dan utilitas yang saya terapkan dalam setiap pengembangan.</p>
          <div class="proj-container">
            <?php 
            foreach ($portofolios as $portofolio) {
              echo '
              <div class="proj-imgbx">
                <img src="'.$portofolio->getImage().'" alt="project3">
                <div class="proj-txtx">
                  <a href="'.$portofolio->link.'" target="_blank">
                    <h4>'.$portofolio->judul.'</h4>
                    <span>'.$portofolio->deskripsi.'</span>
                  </a>
                </div>
              </div>
              ';
            }
            ?>
          </div>
        </div>
      </article>
      <article id="contact">
        <div class="contact">
          <div class="card">
            <div class="container">
              <div class="content">
                <h2>Hubungi Saya</h2>
                <br>
                <p>Jika Anda tertarik untuk bekerja sama, jangan ragu untuk menghubungi saya. Saya sangat antusias untuk menjawab pertanyaan dan berdiskusi lebih lanjut!</p>
              </div>
              <div id="message-wrapper" class="relative">
                <textarea name="message" id="message" ></textarea>
                <button id="contact-button">
                  Send <i class="ri-send-plane-fill"></i>
                </button>
                <a style="display: none;" target="_blank" href="https://api.whatsapp.com/send/?phone=<?php echo $app_setting->nomor_whatsapp ?>" id="contact-link"></a>
              </div>
            </div>
          </div>

        </div>
      </article>
    </div>
    <aside></aside>
  </main>
  <footer>
    <nav>
      <a href="/" class="logo">
        <img src="assets/img/logo.png" alt="logo">
      </a>
      <div class="navmenu">
        <ul>
          <li><a href="http://localhost/login">Home</a></li>
          <li><a href="#skills">Skill</a></li>
          <li><a href="#projects">Projects</a></li>
        </ul>
        <div class="social-media-wrapper">
          <div class="social-media">
            <a target="_blank" href="https://www.linkedin.com/in/randy-abdul-rahman-0a0011161/"><i class="ri-linkedin-fill"></i></a>
          </div>
          <div class="social-media">
            <a target="_blank" href="https://www.instagram.com/rahmanrandyabdul/"><i class="ri-instagram-fill"></i></a>
          </div>
          <div class="social-media">
            <a target="_blank" href="https://wa.me/+6283895172024"><i class="ri-whatsapp-fill"></i></a>
          </div>
        </div>
      </div>
    </nav>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="assets/js/app.js"></script>
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
  <script>
    $list_judul_banner = "<?php echo $banner->judul ?>".split("||");
    $list_judul_banner.pop();
    console.log($list_judul_banner);
    var typed = new Typed('#banner-h1', {
      strings: $list_judul_banner,
      typeSpeed: 90,
      loop: true,
      startDelay: 300,
    });
  </script>
</body>
</html>