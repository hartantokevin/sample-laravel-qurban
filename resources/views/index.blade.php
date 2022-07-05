<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Al-Adha Mubarak Is a feast of in the islam religion, for commemorate events sacrifice , when Ibrahim was willing to risk his son ismail as a form of adherence to ALLAH.">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Icon Title -->
    <link rel="icon" src="{{ asset('img/sheep.png') }}">
    <title>Al-Adha Mubarak</title>
</head>

<body onload="myFunction()">
    <div id="mengloding">
        <img src="{{ asset('img/loading.gif') }}" alt="al-Adha Mubarak">
    </div>

    <section id="homepage">
        <div class="container h-100 pt-2 mt-2" id="Kontener">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-md navbar-light">
                <a href="#" class="navbar-brand"><i class="fas fa-mosque logoh mr-1"></i> Al-Adha.</a>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav ml-auto">
                        <a href="{{ route('login') }}" class="nav-item nav-link active">Login</a>
                    </div>
                </div>
            </nav>
            <!-- END -->

            <div class="row align-items-center h-100 mt-0 mt-md-3 mb-3 mb-md-0 kotak">
                <!--  TREE IMAGE    -->
                <img src="{{ asset('img/tree.png') }}" class="iemgeh">
                <!-- END TREE IMAGE -->

                <!--  COW IMAGE   -->
                <div class="col-12 col-md-6 kiri text-left p-0">
                    <img src="{{ asset('img/cow.webp') }}" alt="al-Adha Mubarak">
                </div>
                <!-- END COW IMAGE -->

                <div class="col-12 col-md-6 kanan pl-3 pl-md-3 mt-3 mt-md-0 mb-3 mb-mt-0">
                    <h2>عيد الأضحى‎</h2>
                    <h1><span class="span1">Eid</span> <span class="span2">Al-Adha </span><br class="d-sm-none"><span
                            class="span3">Mubarak</span></h1>
                    <div class="container pl-0 pl-md-5">
                        <p>Is a feast of in the islam religion. Today commemorate events sacrifice, when Ibrahim was
                            willing to risk his son ismail as a form of adherence to ALLAH. Before Ibrahim sacrifice his
                            son, lord substitute ismail with lamb</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutpage">
        <div class="container my-5">
            <div class="row">
                <div class="col-10 aboutcls">
                    <p>
                        Hello Everyone ✋<br>
                        I'm back with exploration about web header to celebrating Eid Al-Adha 1441 H<br>
                        Eid Al-Adha is an Islamic holiday. On this day commemorating the event of sacrifice, namely the
                        compilation of the Prophet Ibrahim, prepared to free his son Ismail to Allah, then the slaughter
                        was replaced by Him with a sheep. It honors the willingness of Prophet Ibrahim to sacrifice his
                        son as an act of obedience to God's command.<br>
                        Stay safe and Keep well, Everyone. ❤️🙏<br>
                        I hope you like it, and feel free to leave comments and feedback. Thanks! 😁🙏<br>
                        ==========================<br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="contactpage">
        <p class="text-footer m-0">
            Copyright &copy; 2022 - All right reserved
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>