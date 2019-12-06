<?php

// settings
$external = false;

//$baseUrl = $_SERVER['SERVER_NAME'];
$baseUrl = $_SERVER['HTTP_HOST'];
//echo $baseUrl;
if ($baseUrl == "localhost") $baseUrl = "http://localhost/fap-dpf-filtry/new/";
if ($baseUrl == "dpf") $baseUrl = "";
if ($baseUrl == "www.fap-dpf-filtry.cz") $baseUrl = "https://".$baseUrl.'/new';

include('inc/functions.php');

setGet();
//setLanguague();
setGetAsConst();



include('inc/header.php');
?>
<div id="page" class="page">
<!--/* WORK VIDEO STOPED IN VIDEO IFRAME ////  VIDEO STOPED VIDEO STOPED*/-->
<!--/* WORK VIDEO STOPED IN VIDEO IFRAME ////  VIDEO STOPED VIDEO STOPED*/-->
<!--/* WORK VIDEO STOPED IN VIDEO IFRAME ////  VIDEO STOPED VIDEO STOPED*/-->
<!--/* WORK VIDEO STOPED IN VIDEO IFRAME ////  VIDEO STOPED VIDEO STOPED*/-->
    <div id="videobackground" class="videobackground" data-src="video.mp4" data-placeholder="video.jpg" style="display: none; position: absolute; width: 100vw; height: 100vh; background: url('img/videobackground.jpg') center center no-repeat; background-size: cover;">
    </div> <!-- /.videobackground-->
    <header id="header">
        <div class="header-in">
            <a href='' class="fl hide-under-lg"><?php svg('fap-dpf-logo-one-cut-white.svg'); ?></a>
            <a href='' class="fl hide-under-lg"><?php svg('fap-dpf-logo-dark-clean-left.svg'); ?></a>
        <h1 id="logo" class="logo"><a href=''>Čištění filtrů DPF</a></h1>
        <a href='' class="fl hide-under-lg"><?php svg('fap-dpf-logo-dark-clean-right.svg'); ?></a>
        </div>
        <?php include('inc/menu-layered.php'); ?>
    </header>
    <div id="contentandfooter" class="contentandfooter">
        <div id="content" class="content">

          

            <!-- SECTION FIRST ==================================================== -->
            <section id="section-first" class="section section-first">
                <!-- selector-and-sale -->
                <div id="left_side" class="left_side">

                <!-- SELECTOR HOLDER ============================================= -->
                <div id="selector_holder" class="selector_holder"><!-- TODO closed parallax-->
                    <div id="selector_minimizer" class="selector_minimizer">

<!--                    <video id="titlevideo" width="100%" autoplay="" muted="" poster=""  src="video/test-video-3.mp4">
                <source src="video/test-video-1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
            </video>-->

<!--   <div id="selector-inside-cover" class="selector-inside-cover">
<?php svg('drivewheel-inside-cover'); ?>
                    </div>-->
<!-- /selector-inside cover -->
                    <div id="under-selector" class="under-selector parallax-layer">
                        <div id="heading-1" class="heading">
                            <span class="hea fs-25 orange">potřebuji</span>
                            <h2><span class="hea fs-40 white bold">čištění</span>
                                <span class="hea fs-40 orange">filtru</span>
                                <span class="hea hea-4 white"> DPF</span></h2>
                            <span class="hea hea-50 orange">se</span>
                            <span class="hea bold fs-30 orange">ZÁRUKOU</span>
                            <div class="hea hea-70 img">
                            <?php svg('dpf-lamp-smooth.svg'); ?></div>
                        </div>
                            <div id="heading-2" class="heading">
                            <h2>
                                <span class="hea  fs-25 white">svítí</span>
                                <span class="hea fs-30 orange">kontrolka</span>
                                <span class="hea fs-30 orange">filtru</span>
                                <span class="hea fs-50 white"> FAP</span>
                                                                <span class="hea fs-30 orange"> /</span>
                                                                                                <span class="hea fs-50 white"> DPF</span>
                            </h2>
                          <div class="hea  img">
                            <?php svg('dpf-lamp-smooth.svg'); ?></div>
                        </div>
                    </div>

                    <!-- SELECTOR DRIVE WHEEL =========================================== -->
<!--                                 <div id="selector-cover" class="selector-cover">
<?php svg('drivewheel-cover'); ?>
                    </div>-->
                    <!-- /selector-cover -->
<!--                    <div id="selector-arrow" class="selector-arrow">
<?php svg('drivewheel-arrow'); ?>
                    </div>-->
                    <!-- /selector-arrow -->
<!--                    <div id="selector" class="selector">
<?php svg('drivewheel-opti'); ?>
                    </div>-->
                    <!-- /selector -->



                    <!-- SELECTOR  CONTROLS  =========================================== -->
                      <div id="selector-controls" class="selector-controls">
                          <div id="selector-controls__left" class="selector-control">
                              </div><!-- /selector_control__left -->
                              <div id="selector-controls__middle" class="selector-control">
                                  <div id="selector-controls__top" class="selector-control">
                              </div><!-- /selector_control__top -->
                              <div id="selector-controls__center" class="selector-control">
                              </div><!-- /selector_control__center -->
                              <div id="selector-controls__bottom" class="selector-control">
                              </div><!-- /selector_control__bottom -->
                              </div><!-- /selector_control__middle -->
                              <div id="selector-controls__right" class="selector-control">
                              </div><!-- /selector_control__right -->

                          </div><!-- /selector_controls -->

  </div><!-- /selector_minimizer -->
                </div><!-- /selector_holder -->

                 

                <!--                SALE TEXT-->
                <div id="sale" class="sale">
                    <a href="#" >
                        <span  class="sale__text">
                            <span class="sale__text--big">387 900 Kč</span>
                            <span class="sale__text--small">Osobní automobily</span>
                            <span class="sale__text--dph">včetně DPH</span>
                        </span>
                        <span class="sale_img">
                            <?php svg('middle-arrow-right.svg'); ?>
                        </span>
                        <span class="clear"></span>
                    </a>
                </div>

                <!--    HOME ICON -->
                 <div id="home-icon" class="home-icon"><a href="#"><?php svg('home-icon.svg'); ?></a></div>
                  <div id="back-icon" class="back-icon"><a href="#"><?php svg('back-arrow-white.svg'); ?></a></div>

                  </div><!-- end selector and sale -->
                
                <!--ICONS ICON BAR ICONS ICON BAR ICONS ICON BAR ICONS ICON BAR ICONS ICON BAR -->
                <div id="icons" class="icons">
                    <div id="icons__centercircle"></div>
                    <div id="icon_holder" class="icon_holder">
                        <div id="icon_holder__bar" class="icon_holder_bar">
                            <a href="#" id="ico-contact" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('map-mark.svg'); ?></span><span class="ico-content">Kde nás najdete.</span></span></a>
                            <a href="#" id="ico-car-rent" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('car-rent.svg'); ?></span><span class="ico-content">Zapůjčení vozu po dobu servisu</span></span></a>
                            <a href="#" id="ico-diag"  class="bar_icon active"><span class='bar_icon_in'><span class="ico-ico"><?php svg('diag.svg'); ?></span><span class="ico-content">Diagnostika před a po čistění filtru FAP/DPF</span></span></a>
                            <a href="#"  id="ico-eco" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('eco-white.svg'); ?></span><span class="ico-content">Čištění filtru FAP/DPF probíhá ekologickou cestou s certifikátem ISO</span></span></a>

                            <a href="#"  id="ico-in-time" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('clock-24.svg'); ?></span><span class="ico-content">Expresní čištění do 24 hodin</span></span></a>
                            <a href="#"  id="ico-certificate" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('certificate.svg'); ?></span><span class="ico-content">Na čištění filtru FAP/DPF poskytujeme záruku 1 rok nebo 100 000 ujetých kilometrů</span></span></a>
                            <a href="#"  id="ico-cars-pickup" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('cars-pickup-car.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-star" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('star.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-granted" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('granted-white.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-deal" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('deal.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-thumb" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('thumb-up.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-snail" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('snail.svg'); ?></span><span class="ico-content"></span></span></a>

                            <a href="#"  id="ico-refuel" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('refuel.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-truck" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('truck.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-tractor" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('tractor.svg'); ?></span><span class="ico-content"></span></span></a>
                            <a href="#"  id="ico-car" class="bar_icon"><span class='bar_icon_in'><span class="ico-ico"><?php svg('car-ico.svg'); ?></span><span class="ico-content"></span></span></a>
                        </div>
                    </div>
                </div>
            </section>


                <section id="section-" class="section section-first">
                <div id="left_side" class="left_side"><!-- selector-and-sale -->


                    </div>
                    </section>

            Co je filtr FAP/DPF

            Jak funguje filtr FAP/DPF

            Nouzový režim

            Svítí kontrolka FAP/DPF

            Regenerace filtru FAP/DPF

            Ceník

            Certifikáty

            Kalkulátor

            O nás

            Kontakty

            Náhradní automobil

            Služby

            Facebook

            Instagram

            STK a Měření emisí

            Záruky

            Slovníček

            Svoz z celé ČR



            PRAHA/BRNO/OSTRAVA - Celá ČR



            Ucpaný či poškozený filtr se projevuje:

rozsvícením kontrolky DPF nebo kontrolky motoru
přechodem motoru do tzv. nouzového režimu
navýšením spotřeby paliva
po sešlápnutí plynového pedálu neni akcelerace
vůz je v režimu regenerace, proto roste spotřeba
vůz se opětovně přepíná do režimu regenerace, může dojít k poškození motoru a nebo jeho součástí (při neúspěšných regeneracích dochází k ředění motorového oleje a tím ztrátě jeho mazacích schopností)


DPF - Diesel Particle Filter




Příčiny zanesení DPF

PROČ SE DPF UCPE?
Důvodů, proč se DPF filtr ucpe, může být několik. Nejčastější příčinou je vysoký nájezd vozu. Během provozu se ve voštinové struktuře filtru (kanálky uvnitř vložky DPF) postupně zanášejí sazemi z výfukových plynů. Aby se DPF filtr opět uvolnil, spouští řídící jednotka tzv. aktivní regenerace; jde o proces, při němž se uměle navyšuje teplota výfukových spalin, které následně usazené částice v DPF filtru vypálí. Tato regenerace není nikdy dokonalá. V DPF filtru zůstávají nespálené saze a jiné nečistoty, jež se v DPF filtru hromadí, a časem jej zcela ucpou. DPF filtr ztratí svoji funkčnost. Filtr DPF se může však ucpat i z jiných příčin, kupříkladu proto, že správně nefunguje řídící jednotka či jsou poškozené senzory, které sledují tlak výfukových plynů...


Odstraníme vlastní příčinu zanášení DPF filtru


Že má vozidlo problém s DPF filtrem, signalizuje několik faktorů:


Svítí oranžová kontrolka DPF nebo kontrolka motoru
Sníží se výkon motoru
Vůz má zvýšenou spotřebu
Ztráta akcelerace
Časté regenerace DPF
Naskočení "nouzového režimu"


Zničení DPF filtru

můžete DPF vložku zničit. Keramické jádro vlivem zvýšené teploty, která není dostatečně odváděna spolu s výfukovými plyny, se roztaví a dojde k jejímu nenávratnému zničení. Potom již nezbývá nic jiného, než zakoupit nový filtr pevných částic.


Svítí Vám kontrolka filtru pevných částic na palubní desce?


Máte zanesený filtr, zdá se vám, že jde o problém s filtrem pevných částic?

Od 1. 10. 2018 vozidla s nefunkčním DPF nesmí na vozovku!


Jak u nás probíhá čištění?

Celý proces čištění probíhá v nejmodernějším zařízení Flesh Cleaner Machine v naprosto ekologickém režimu. Do filtru mechanicky nijak nezasahujeme.


Filtry pevných částic zkráceně nazývané podle anglického nebo francouzského názvu DPF (Diesel Particle Filter) či FAP (Filtre Anti Particules) mají za úkol zachytit pevné částice spalin a snížit emise dieselových motorů, aby vyhověly stále přísnějším normám EU.



Tato nejnovější zahraniční technologie slučuje několik dříve používaných přístrojů do jediného multifunkčního boxu a umožňuje tak zefektivnění a zkrácení čistícího procesu DPF. Čištění filtrů DPF probíhá v uzavřeném cirkulačním okruhu s vlastním filtračním systémem, který neuvolňuje zápach, prachové emise ani ropné nečistoty do životního prostředí.



Demontáž, montáž filtru a diagnostika vozu
Vyčištění bez mechanického narušení obalu DPF (řezání, sváření)
Čistíme všechny druhy DPF filtrů (automobily, kamióny, autobusy)
Protokol o propustnosti DPF před i po čištění
Záruka 2 roky nebo 100.000 km
Specializované servisní centrum v Praze na Michelské ul. 3/9
Možnost být přítomen u čištění vašeho DPF
Diagnostika vozu před i po čištění
Záruka ekologického zpracování odpadu
Technologie je certifikována TUV Nord


Cena za vyčištění DPF filtru u většiny osobních vozů je 5.500 Kč + práce 1.800 Kč (demontáž, montáž, diagnostika vozu), což je celkem 7.300 Kč bez DPH 21%.





https://www.dpf-cat.cz/zdravotni-rizika-rakovina







            <!--<img src="img/nahled-home.png">-->




        </div>  <!-- /.content-->


        <?php
        include('inc/footer.php');
        ?>