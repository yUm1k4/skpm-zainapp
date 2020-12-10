<footer>
    <!-- Footer Start-->
    <div class="footer-main" data-background="<?= base_url() ?>/home/img/shape/footer_bg.png">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-4 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="<?= base_url() ?>" class="text-primary">
                                        <h5>SKPM - Zain App</h5>
                                    </a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Jl. Lap. Bola Rawa Butun <br> Bekasi, 17153 - Indonesia</p>
                                        <p class="info2">yumikasoftware@gmail.com</p>
                                    </div>
                                </div>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="https://instagram.com/zaiabdullah_91/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <li><a href="">Lapor!</a></li>
                                    <li><a href="">Tentang Kami</a></li>
                                    <li><a href="single-blog.html">Hubungi Kami</a></li>
                                    <li><a href="blog.html">Cari Laporan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-6">
                        <!-- <div class="single-footer-caption mb-50"> -->
                        <!-- <div id="show_maps" style="width:100%; height:100%;">
                        </div> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2958866074787!2d106.98985671434191!3d-6.3557315639462155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMK%20Negeri%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1607004479421!5m2!1sid!2sid" style="width:100%; height:100%;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | Build with CodeIgniter 4 by <a href="https://instagram.com/zaiabdullah_91/" target="_blank">Zainudin Abdullah</a> | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJyT6SB2j3VixbrUnecSZvEcpeTkZPsBs&callback=initMap&libraries=&v=weekly" defer></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJyT6SB2j3VixbrUnecSZvEcpeTkZPsBs&callback=initMap" async defer></script>

    <script type="text/javascript">
        var marker;
        var lat = -6.3348111;
        var lng = 106.9798864;

        function taruMarker(location, map) {
            if (marker) {
                // pindahkan marker
                marker.setPosition(location);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        }

        function initMap() {
            var bangalore = {
                lat: lat,
                lng: lng
            };
            var map = new google.maps.Map(document.getElementById('show_maps'), {
                center: bangalore,
                zoom: 15
            });

            taruMarker(bangalore, map);
        }
    </script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

    <script>
        // position we will use later
        var lat = -6.3348111;
        var lon = 106.9798864;
        // initialize map
        map = L.map('show_maps').setView([lat, lon], 15);
        // set map tiles source
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 20,
        }).addTo(map);
        // add marker to the map
        marker = L.marker([lat, lon]).addTo(map);
        // add popup to the marker
        marker.bindPopup("<b>Zain App.</b><br />This st. 48<br />New York").openPopup();
    </script> -->

</footer>