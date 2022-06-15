<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="">
    <title>Word Counter Tool - Free</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a free online word counter tool." />
    <meta name="keywords" content="word counter, online, online free word counter, worder counter genarate, 
    supun nanayakkara, ebats technologies, sri lanka, programming, software development, software, web app, website, online tool" />
    <meta name="author" content="Supun Nanayakkara" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Html-Docx-->
    <script src="js/html-docx.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/jspdf.debug.js"></script>
    <!-- FOR IE9 below -->
</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <h2 class="title-new">Online Word Counter Tool</h3>
            </div>
        </nav>
        <div>
            <h4><b> <span id="nb_characters"></span></b></h4>
        </div>

        <div class="paper">
            <div class="paper-content">
                <textarea id="characters" name="characters" autofocus placeholder="Hello there !&#10;Here's a paper text area, feel free to type something ..."></textarea>
            </div>
        </div>
        <br />
        <div class="btn-dev">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn  btn-color" value="save" id="save"><i class="far fa-file-word"></i> Save as Doc</button>
                <button class="btn  btn-color" onclick="myFunction()"><i class="far fa-file-pdf"></i> Save as PDF</button>
            </div>
        </div>

        <script>
            function saveTextAsFile() {
                var textToWrite = document.getElementById("characters").value;
                var textToWrite1 = document.getElementById('nb_characters').innerText;
                var textFileAsBlob = new Blob([textToWrite + textToWrite1], {
                    type: 'font/Arial'
                });
                var fileNameToSaveAs = "Download.doc";


                var downloadLink = document.createElement("a");
                downloadLink.download = fileNameToSaveAs;
                downloadLink.innerHTML = "Download File";
                if (window.webkitURL != null) {
                    // Chrome allows the link to be clicked
                    // without actually adding it to the DOM.
                    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
                } else {
                    // Firefox requires the link to be added to the DOM
                    // before it can be clicked.
                    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
                    downloadLink.onclick = destroyClickedElement;
                    downloadLink.style.display = "none";
                    document.body.appendChild(downloadLink);
                }

                downloadLink.click();
            }

            var button = document.getElementById('save');
            button.addEventListener('click', saveTextAsFile);
        </script>

        <script>
            function myFunction() {
                var textToWrite1 = document.getElementById('characters').value;
                var textToWrite2 = document.getElementById('nb_characters').innerText;
                console.log(textToWrite2);
                var doc = new jsPDF('p', 'in', 'a4'),
                    sizes = [12],
                    fonts = [
                        ['Times', 'Roman']
                    ],
                    fonts, sizes, lines,
                    margin = 1, // inches on a 8.5 x 11 inch sheet.
                    verticalOffset = margin,
                    loremipsum = textToWrite1 +
                    textToWrite2;

                for (var i in fonts) {
                    if (fonts.hasOwnProperty(i)) {
                        font = fonts[i]
                        size = sizes[i]

                        lines = doc.setFont(font[0], font[1])
                            .setFontSize(size)
                            .splitTextToSize(loremipsum, 7.5)
                        doc.text(0.5, verticalOffset + size / 72, lines)
                        //	doc.addPage()
                        verticalOffset += (lines.length + 0.5) * size / 72
                    }
                }

                doc.save('a4.pdf')

            }
        </script>


        <footer id="colorlib-footer" role="contentinfo">

            <div class="row">

                <div class="col-md-6 col-md-offset-3 footer-css">
                    <p>
                        <small class="block">
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Made by <a href="javascript:void(0)">Supun Nanayakkara</a>
                        </small>

                    </p>
                </div>
            </div>
    </div>
    </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    <script src="ajax.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
    <!-- Disabled lines -->
    <script type="text/javascript">
        window.oncontextmenu = function() {
            return false;
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 123) {
                return false;
            } else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
                return false;
            }
        });
    </script>

</body>

</html>