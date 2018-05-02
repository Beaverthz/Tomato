<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tomato | Cuz We're foodies!</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/agency.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<script>

function validate(){

var name=document.getElementById("name").value;

var hotel=document.getElementById("hotel_name").value;
var name=document.getElementById("name").value;
var dist=document.getElementById("district").value;
var phone=document.getElementById("phone").value;
var email=document.getElementById("email").value;
var pass=document.getElementById("pass").value;
var cpass=document.getElementById("cpass").value;
//var name=document.getElementById("name").value
var p=/[a-zA-Z]{3,}/;
var p1=/[0-9]{10}/;
if(!p.exec(name))
{
   alert("Name should contains alphabets only ");
   return false;
}
//if(!/[a-zA-Z]{3,}/.exec(name)){
//   alert("Name length alteast 3 character ");
//   return false;
//}
else if(!p.exec(hotel)){
    alert("Hotel should contains alphabets only   ");
    return false;
}
else if(!p.exec(dist)){
    alert("District should contains alphabets only  ");
    return false;
}else if(!p1.test(phone)){
    alert("Phone Number Length within 10 digits ");
    return false;
}
else if(!/[a-zA-Z0-9]{5,10}/.exec(pass)){
    alert("Password length 5 and 10 ");
    return false;
}
else if(pass!=cpass){
    alert("Passwrod Doesnt match");
    return false;
}else if(!/[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})/.exec(email)){
    alert("Email incorrect ");
    return false;
}
else{
    return true;
}
}
</script>

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#login">Signup/Login</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Services</a>
                        </li>

                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Me</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container" style=" background-size: cover;">
                <div class="intro-text">
                    <div class="intro-lead-in"></div>
                    <div class="intro-heading"><img src="img/tomato.jpg"></div>
                    <a href="user.html" class="page-scroll btn btn-xl">Log In (User)</a>
                </div>
            </div>
        </header>


        <section id="login" style="background-color: #f7f7f7" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 style="text-align: center">REGISTER</h2>
                        <form action="register.php" method="POST" onsubmit="return validate()" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"   id="name" required="" />
                            </div>
                            <div class="form-group">
                                <label>Hotel Name/Restaurant Name</label>
                                <input type="text" class="form-control" name="hotel_name"  id="hotel_name"/>
                            </div>
                            <div class="form-group">
                                <label>Hotel Address/Restaurant Address</label>
                                <textarea class="form-control" required="" name="desc" required/></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tell us, which district you are from</label>
                                <input type = "text" class = "form-control" required="" name="district"  id="district"  />
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control"  name="phone" id="phone"/>
                            </div>
                            <div class="form-group">
                                <label>Username (Email Address)</label>
                                <input type="text" class="form-control" placeholder="Email" name="uname"  id="email"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="pass"   id="password"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="cpass" id="cpass"/>
                            </div>
                            <div class='form-group'>
                                <label>Upload Hotel/Restaurant Image URL</label>
                                <input type='text' class='form-control' name='hotel_img'>
                            </div>
                            <div class='form-group'>
                                <label>Latitude</label>
                                <input type='text' class='form-control' name='lat'>
                            </div>
                            <div class='form-group'>
                                <label>Longitude</label>
                                <input type='text' class='form-control' name='longi'>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="REGISTER"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h2 style="text-align: center">LOGIN</h2>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="email" class="form-control" name="email" required=""/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning pull-right" value="LOGIN"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>        <!-- Services Section -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Services</h2>
                        <h3 class="section-subheading text-muted">We Provide Verity of Services</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Home Delivery</h4>
                        <p class="text-muted">You can call them for home delivery</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-location-arrow fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Location Details</h4>
                        <p class="text-muted">The booking details of both single and combo items are available</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-area-chart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Food Stats</h4>
                        <p class="text-muted">You can view the rating of your dishes</p>
                    </div>
                </div>
            </div>
        </section>



        <!-- About Section -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">About</h2>
                        <h3 class="section-subheading text-muted">The dream of the foodies</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>August 2017</h4>
                                        <h4 class="subheading">Our Humble Beginnings</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">We were thinking about a simple way for getting details about good food and thus it all began</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>September 2017</h4>
                                        <h4 class="subheading">Tomato is Born</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">We collected details about the hotels and the way of foodies.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>January 2018</h4>
                                        <h4 class="subheading">Transition to Full Service</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">And here it is..Our dream came true..a website for hotels to add dishes,view order and rating details and an app for the foodies around.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/aaa.jpg" alt="">
                               </div>
                            <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>FUTURE</h4>
                                        <h4 class="subheading">We move to portable devices!</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Thanking everyone who helped us and hoping to get more innovations in the future</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- About Me -->
        <section id="contact">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <h2 class="section-heading">About Me</h2>
                      <br>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-4">
                  </div>
              <div class="col-sm-4">
                      <div class="team-member">
                          <img   src="img/team/nat_watch.png" class="img-responsive img-circle" alt="" width='500' height='100'>
                         <h4 style="color : yellow">Natdanai Kaewsuk</h4>
                         <h3 class="section-subheading text-muted">They laugh at me because I'm different, I laugh at them because they're all the same.<br><br>Chiang Mai, Thailand</h3>
                          <ul class="list-inline social-buttons">
                              <li><a href="https://twitter.com/Earthzaha"><i class="fa fa-twitter"></i></a>
                              </li>
                              <li><a href="https://www.facebook.com/natdanai.kaewsuk"><i class="fa fa-facebook"></i></a>
                              </li>
                              <li><a href="https://th.linkedin.com/in/natdanai-kaewsuk-a8844959"><i class="fa fa-linkedin"></i></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>

          </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Beaverthz 2017-18</span>
                    </div>
                </div>
            </div>
        </footer>



        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <!--<script src="js/contact_me.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="js/agency.js"></script>

    </body>

</html>
