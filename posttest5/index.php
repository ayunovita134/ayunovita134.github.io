<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"./>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"./>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"./>
        <title>Travel Seluruh Indonesia</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <div class="layar-dalam">
                <div class="logo">
                    <a href=""><img src="asset/logo-white.png" class="putih"./></a>
                    <a href=""><img src="asset/logo-black.png" class="hitam"./></a>
                </div>
                <div class="menu">
                    <a href="#" class="tombol-menu">
                        <span class="garis"></span>
                        <span class="garis"></span>
                        <span class="garis"></span>
                    </a>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#aboutMe">About Me</a></li>
                        <li><a href="#support">Support</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="tambah.php">Tambah</a></li>
                        <li><a href="tampilan.php">Tampilkan</a></li>
                        <li><a href="ubah.php">Ubah</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <button id="darkModeToggle">Dark Mode</button>
            </div>
        </nav>
        <div class="layar-penuh">
            <header id="home">
                <div class="overlay"></div>
                <video autoplay muted loop>
                    <source src="asset/video-indonesia.mp4" type="video/mp4">
                </video>
                <div class="intro">
                    <h3>Visit Indonesia</h3>
                    <p>Jelajahi keindahan alam dan kekayaan budaya Indonesia yang memikat. 
                        Dari pantai-pantai yang menakjubkan di Bali hingga keajaiban alam di 
                        Taman Nasional Komodo, setiap sudut negara ini menawarkan pengalaman 
                        unik yang tak terlupakan. Temukan kehangatan masyarakat lokal, nikmati 
                        kuliner lezat, dan rasakan petualangan seru yang akan memperkaya jiwa Anda.</p>
                    <p>
                        <a href="" class="tombol">MORE INFO</a>
                    </p>
                </div>
            </header>
            <main>
                <section id="aboutme">
                    <div class="layar-dalam">
                        <h3>About Me</h3>
                        <p class="ringkasan">
                            Kami adalah penyedia layanan perjalanan yang berdedikasi untuk menciptakan 
                            pengalaman tak terlupakan bagi setiap pelanggan. Dari penawaran paket wisata 
                            yang menarik hingga pengaturan akomodasi yang nyaman, kami berkomitmen 
                            untuk memberikan solusi perjalanan yang sesuai dengan kebutuhan Anda. Baik 
                            Anda mencari petualangan mendebarkan di alam bebas atau liburan santai di 
                            pantai, tim kami siap membantu Anda merencanakan setiap detail perjalanan 
                            dengan mudah dan efisien.
                        </p>
                    </div>
                </section>
                <section class="abuabu" id="support">
                    <div class="layar-dalam support">
                        <div>
                            <img src="asset/matahari.png">
                            <h6>in every condition</h6>
                            <p>Dukungan sejati berarti berada di samping seseorang dalam setiap kondisi, 
                                baik sukses atau gagal, bahagia atau susah. Ini berarti menawarkan telinga 
                                yang mendengar, kata yang menghibur, dan tangan yang membantu. Dukungan 
                                menyediakan rasa keamanan, stabilitas, dan kekuatan, memberdayakan 
                                individu untuk menavigasi kehidupan dengan kepercayaan dan keberanian.</p>
                        </div>
                        <div>
                            <img src="asset/tas.png">
                            <h6>professional team</h6>
                            <p>Sebuah tim profesional adalah kesatuan yang kuat dalam setiap kondisi, 
                                baik menghadapi tekanan atau merayakan kemenangan. Anggota tim saling 
                                mendukung, berbagi pengetahuan dan sumber daya untuk mencapai tujuan 
                                bersama. Dengan budaya kepercayaan, rasa hormat, dan komunikasi terbuka, 
                                tim profesional dapat mengatasi tantangan dan muncul sebagai pemenang.</p>
                        </div>
                        <div>
                            <img src="asset/kompas.png">
                            <h6>Expert Hikers</h6>
                            <p>Expert Hikers adalah kelompok petualang yang tangguh dan berpengalaman, 
                                siap menghadapi setiap kondisi alam. Dengan pengetahuan dan keterampilan 
                                yang mendalam, mereka dapat menavigasi jalur yang sulit dan mencapai 
                                puncak yang tertinggi. Kami menyediakan dukungan dan layanan yang 
                                profesional untuk membantu Anda merencanakan dan menikmati perjalanan 
                                petualangan yang aman dan menyenangkan.</p>
                        </div>
                    </div>

                    <div class="form-input">
                        <h6>Get in Touch</h6>
                        <form action="index.php" method="POST">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name"><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"><br><br>
                            <label for="phone">Phone:</label>
                            <input type="number" id="phone" name="phone"><br><br>
                            <label for="message">Message:</label>
                            <textarea id="message" name="message"></textarea><br><br>
                            <button type="submit" id="submit">send</button>
                        </form>
                    </div>
                </section>
                <section id="gallery">
                    <div><img src="asset/foto1.jpg"></div>
                    <div><img src="asset/foto2.jpg"></div>
                    <div><img src="asset/foto3.jpg"></div>
                    <div><img src="asset/foto4.jpg"></div>
                    <div><img src="asset/foto5.jpg"></div>
                    <div><img src="asset/foto6.jpg"></div>
                    <div><img src="asset/foto7.jpg"></div>
                    <div><img src="asset/foto8.jpg"></div>
                </section>
                <section class="quote">
                    <div class="layar-dalam">
                      <p>Jogja terbuat dari rindu, pulang dan angkringan.</p>
                    </div>
                </section>
            </main>
        </div>

        <nav>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="tambah.php">Tambah Data</a></li>
                    <li><a href="tampilan.php">Tampilan Data</a></li>
                </ul>
            </div>
        </nav>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="javascript.js"></script>
    </body>
</html>