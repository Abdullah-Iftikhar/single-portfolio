@extends('layout.main')
@section('content')
    <section class="hero-wrap" id="home"
             style="background-image:url({{asset('assets/images/xbg_1.jpg.pagespeed.ic.sc5qLQi6UW.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="col-lg-7">
                    <div class="text mt-5" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                        <span class="subheading">Hi There!</span>
                        <h1 class="mb-4">I am Abdullah Iftikhar <br>
                            <span class="typewrite" data-period="2000"
                                  data-type='["Laravel Developer", "Laravel and Vue.js Developer", "TALL Stack Developer", "I Love to Develop."]'>
                                <span class="wrap"></span>
                            </span>
                        </h1>
                        <div class="w-md-75 w-100">
                            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts.</p>
                            <p>
                                <a href="https://www.upwork.com/freelancers/~01ccc827e449d96028" target="_blank" class="btn btn-primary p-4 py-3">Hire Me
                                    <span class="ion-ios-arrow-round-forward"></span></a>
                                <a href="#" class="btn btn-white p-4 py-3 ms-lg-2">View Portfolio
                                    <span class="ion-ios-arrow-round-forward"></span>
                                </a>
                            </p>
                            <p class="social-media mt-5">
                                <a href="https://www.upwork.com/freelancers/~01ccc827e449d96028" target="_blank">
                                    <span class="ion-ios-add"></span> Upwork
                                </a>
                                <a href="https://www.linkedin.com/in/abdullah-iftikhar-kamboh/" target="_blank">
                                    <span class="ion-ios-add"></span> LinkedIn
                                </a>
                                <a href="https://twitter.com/AbdllahIftikhar" target="_blank">
                                    <span class="ion-ios-add"></span> Twitter
                                </a>
                                <a href="https://www.facebook.com/AbdullahIftikharKamboh" target="_blank">
                                    <span class="ion-ios-add"></span> Facebook
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" id="about">
        <div class="container-xl">
            <div class="row g-xl-5">
                <div class="col-md-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100"
                     data-aos-duration="1000">
                    <div class="img img-about"
                         style="background-image:url({{asset('assets/images/xabout.jpg.pagespeed.ic.3XzwTlBUg1.jpg')}})">
                    </div>
                </div>
                <div class="col-md-6 heading-section" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="my-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="aboutme-tab" data-bs-toggle="tab" href="#aboutme"
                                   role="tab"
                                   aria-controls="aboutme" aria-selected="true">About Me</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="skills-tab" data-bs-toggle="tab" href="#skills" role="tab"
                                   aria-controls="skills" aria-selected="false">Skills</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="experience-tab" data-bs-toggle="tab" href="#experience"
                                   role="tab"
                                   aria-controls="experience" aria-selected="false">Experience</a>
                            </li>
                        </ul>
                        <div class="tab-content py-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="aboutme" role="tabpanel"
                                 aria-labelledby="aboutme-tab">
                                <h2 class="mb-4">My Story</h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts. Separated they live in Bookmarksgrove right at the coast
                                    of
                                    the Semantics, a large language ocean.</p>
                                <h3 class="mb-4">I Do Web Design &amp; Developement since I was 18 Years Old</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                            </div>
                            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                <h2 class="mb-4">Skills</h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts. Separated they live in Bookmarksgrove right at the coast
                                    of
                                    the Semantics, a large language ocean.</p>
                                <div class="row mt-5">
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000"
                                         data-aos-delay="100">
                                        <div class="progress-wrap">
                                            <h3>Adobe Photoshop</h3>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                    <span>80%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000"
                                         data-aos-delay="100">
                                        <div class="progress-wrap">
                                            <h3>HTML / CSS</h3>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="95"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:95%">
                                                    <span>95%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000"
                                         data-aos-delay="100">
                                        <div class="progress-wrap">
                                            <h3>Javascript</h3>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="88"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:88%">
                                                    <span>88%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000"
                                         data-aos-delay="100">
                                        <div class="progress-wrap">
                                            <h3>WordPress</h3>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="89"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:89%">
                                                    <span>89%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="resume-wrap d-flex align-item-stretch" data-aos="fade-up"
                                             data-aos-duration="1000" data-aos-delay="400">
                                            <div class="w-100">
                                                <h2>Art &amp; Creative Director</h2>
                                                <span class="date">2014-2015</span> <span class="position"><i
                                                        class="ion-ios-pin me-2"></i>Google Inc.</span>
                                                <p>A small river named Duden flows by their place and supplies it with
                                                    the
                                                    necessary regelialia.</p>
                                            </div>
                                        </div>
                                        <div class="resume-wrap d-flex align-item-stretch" data-aos="fade-up"
                                             data-aos-duration="1000" data-aos-delay="500">
                                            <div class="w-100">
                                                <h2>Wordpress Developer</h2>
                                                <span class="date">2015-2017</span> <span class="position"><i
                                                        class="ion-ios-pin me-2"></i>Google Inc.</span>
                                                <p>A small river named Duden flows by their place and supplies it with
                                                    the
                                                    necessary regelialia.</p>
                                            </div>
                                        </div>
                                        <div class="resume-wrap d-flex align-item-stretch" data-aos="fade-up"
                                             data-aos-duration="1000" data-aos-delay="600">
                                            <div class="w-100">
                                                <h2>UI/UX Designer</h2>
                                                <span class="date">2018-2020</span> <span class="position"><i
                                                        class="ion-ios-pin me-2"></i>Google Inc.</span>
                                                <p>A small river named Duden flows by their place and supplies it with
                                                    the
                                                    necessary regelialia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" id="services">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-7 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                    <span class="subheading">Services</span>
                    <h2 class="mb-4">This is My Expertise, The Services I'll Provide My Clients</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"
                     data-aos-duration="1000">
                    <div class="services-2">
                        <div class="icon"><span class="flaticon-code"></span></div>
                        <div class="text">
                            <h2>UI &amp; UX Design</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <p><a href="#" class="">Read more <span class="fa fa-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"
                     data-aos-duration="1000">
                    <div class="services-2">
                        <div class="icon"><span class="flaticon-web-programming"></span></div>
                        <div class="text">
                            <h2>Web Development</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <p><a href="#" class="">Read more <span class="fa fa-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"
                     data-aos-duration="1000">
                    <div class="services-2">
                        <div class="icon"><span class="flaticon-vector"></span></div>
                        <div class="text">
                            <h2>Graphic Design</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <p><a href="#" class="">Read more <span class="fa fa-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">
                    <p><strong>Have any works you want to done by me? <a href="#">Contact Me</a></strong></p>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live
                        the blind texts.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section-counter img"
             style="background-image:url({{asset('assets/images/xbg_3.jpg.pagespeed.ic.z_ltqRZXRc.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row section-counter">
                <div class="col-sm-6 col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="counter-wrap-2 d-flex" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                        <div class="icon">
                            <span class="flaticon-customer-review"></span>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="countup">3000</span></h2>
                            <span class="caption">Happy Customer</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="counter-wrap-2 d-flex" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        <div class="icon">
                            <span class="flaticon-complete"></span>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="countup">320</span></h2>
                            <span class="caption">Project Completed</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="counter-wrap-2 d-flex" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                        <div class="icon">
                            <span class="flaticon-coffee"></span>
                        </div>
                        <div class="text">
                            <h2 class="number"><span class="countup">1000</span></h2>
                            <span class="caption">Cups of Coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-project" id="portfolio">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center" data-aos="fade-up" data-aos-duration="1000">
                    <span class="subheading">Portfolio</span>
                    <h2>My Latest Work</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-1.jpg.pagespeed.ic.qy3tUEpwWq.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-2.jpg.pagespeed.ic.S7VN-qnm5z.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-3.jpg.pagespeed.ic.F_zwiH0stO.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-4.jpg.pagespeed.ic.GscbfoNHvq.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-5.jpg.pagespeed.ic.WwQEjmOv-r.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                         style="background-image:url({{asset('assets/images/xproject-6.jpg.pagespeed.ic.oJeeO27vYz.jpg')}})">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container-xl">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section" data-aos="fade-up" data-aos-duration="1000">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-5">Successful Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="carousel-testimony">
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="text">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="user-img"
                                             style="background-image:url({{asset('assets/images/nash.jpg')}})">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-quote-left"> </span>
                                            </div>
                                        </div>
                                        <div class="ps-3 tx">
                                            <p class="name">Nash Jovanovic</p>
                                            <span class="position">CEO - solidd.io</span>
                                        </div>
                                    </div>
                                    <p class="mb-4 msg">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="text">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="user-img"
                                             style="background-image:url({{asset('assets/images/piyush.jpg')}})">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-quote-left"> </span>
                                            </div>
                                        </div>
                                        <div class="ps-3 tx">
                                            <p class="name">Piyush Sawant</p>
                                            <span class="position">CEO</span>
                                        </div>
                                    </div>
                                    <p class="mb-4 msg">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" id="pricing">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section" data-aos="fade-up" data-aos-duration="1000">
                    <span class="subheading">My Pricing</span>
                    <h2 class="mb-3">Pricing &amp; <span>Packages</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="block-7">
                        <div class="text-center">
                            <span class="excerpt d-block">Basic Plan</span>
                            <span class="price"><sup>$</sup> <span class="number">300</span></span>
                            <div class="p-4 px-lg-5">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                            </div>
                            <a href="#" class="btn btn-primary btn-outline-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="block-7">
                        <div class="text-center">
                            <span class="excerpt d-block">Beginner Plan</span>
                            <span class="price"><sup>$</sup> <span class="number">79K</span></span>
                            <div class="p-4 px-lg-5">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                            </div>
                            <a href="#" class="btn btn-primary btn-outline-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="block-7">
                        <div class="text-center">
                            <span class="excerpt d-block">Premium Plan</span>
                            <span class="price"><sup>$</sup> <span class="number">109K</span></span>
                            <div class="p-4 px-lg-5">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                            </div>
                            <a href="#" class="btn btn-primary btn-outline-primary d-block px-2 py-3">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb" id="contactme">
        <div class="container-fluid-xl">
            <div class="row no-gutters justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row g-0">
                            <div class="col-lg-6 order-lg-last">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3>Contact us</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>My Address:</span>
                                                        H#820 Block G CPHS, Lahore, Pakistan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>My Email:</span>
                                                        <a href="mailto:abdulah.laraveldev@gmail.com">
                                                            <span class="__cf_email__">[email&#160;protected]</span>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text">
                                                    <p><span>My Phone:</span>
                                                        <a href="tel:+92 301 7160 701">tel:+92 301 7160 701</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                           placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                           placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                          rows="4" placeholder="Create a message here"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="w-100 social-media mt-5">
                                        <h3>Follow me here</h3>
                                        <p>
                                            <a href="https://www.upwork.com/freelancers/~01ccc827e449d96028" target="_blank">Upwork</a>
                                            <a href="https://www.linkedin.com/in/abdullah-iftikhar-kamboh/" target="_blank">LinkedIn</a>
                                            <a href="https://twitter.com/AbdllahIftikhar" target="_blank">Twitter</a>
                                            <a href="https://www.facebook.com/AbdullahIftikharKamboh" target="_blank">Facebook</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div id="map" class="bg-white"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro py-5 bg-primary">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="row g-lg-5">
                        <div class="col-md-8 text-lg-right">
                            <h2 class="mb-0">Have any works you want to done by me?</h2>
                            <p>Far far away, behind the word mountains</p>
                        </div>
                        <div class="col-md-4 border-left d-flex align-items-center">
                            <p class="w-100"><a href="#" class="btn btn-white btn-outline-white d-block py-3">Contact
                                    Me</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
