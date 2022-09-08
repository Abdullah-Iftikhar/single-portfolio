@extends('layout.main')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center" data-aos="fade-up" data-aos-duration="1000">
                    <span class="subheading">Our Blog</span>
                    <h2>Recent From Blog</h2>
                </div>
            </div>

            <div class="row g-lg-5">
                <div class="col-lg-12 blog-single">
                    <h2 class="mb-3">#1. Creative WordPress Themes</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit,
                        quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro
                        adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore
                        perferendis,
                        enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta
                        architecto tempora.</p>
                    <p>
                        <img src="{{asset('assets/images/ximage_1.jpg.pagespeed.ic.sYEsLcUyj_.jpg')}}" alt="" class="img-fluid">
                    </p>
                    <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat
                        sunt
                        doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta
                        illo
                        eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit
                        perspiciatis
                        ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in.
                        Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque.
                        Error
                        dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit
                        quasi
                        repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
                    <p>
                        <img src="{{asset('assets/images/ximage_3.jpg.pagespeed.ic.5zztMSovUH.jpg')}}" alt="" class="img-fluid">
                    </p>
                    <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo
                        quod,
                        est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab
                        consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error,
                        velit,
                        porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">coding</a>
                            <a href="#" class="tag-cloud-link">education</a>
                            <a href="#" class="tag-cloud-link">courses</a>
                            <a href="#" class="tag-cloud-link">online</a>
                        </div>
                    </div>
                    <div class="about-author d-flex p-4 bg-light rounded">
                        <div class="bio me-md-4 img" style="background-image:url('{{asset('assets/images/author.jpg')}}')"></div>
                        <div class="desc">
                            <h3>Abdullah Iftikhar</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa
                                sapiente
                                consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>
                    <div class="pt-5 mt-5">
                        <h3 class="mb-5" style="font-size: 34px;">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{asset('assets/images/avatar.png')}}" alt="Image">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">January 18, 2021 at 10:20am</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                        sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{asset('assets/images/avatar.png')}}" alt="Image">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">January 18, 2021 at 10:20am</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                        sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{asset('assets/images/avatar.png')}}" alt="Image">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">January 18, 2021 at 10:20am</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat
                                                saepe
                                                enim sapiente iste iure! Quam voluptas earum impedit necessitatibus,
                                                nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{asset('assets/images/avatar.png')}}" alt="Image">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">January 18, 2021 at 10:20am</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Pariatur
                                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas
                                                        earum
                                                        impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{asset('assets/images/avatar.png')}}" alt="Image">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">January 18, 2021 at 10:20am</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                        sapiente
                                        iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        </ul>

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5" style="font-size: 34px;">Leave a comment</h3>
                            <form action="#" class="p-4 p-lg-5 comment-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>

{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="website">Website</label>--}}
{{--                                            <input type="url" class="form-control" id="website">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message *</label>
                                            <textarea name="" id="message" cols="30" rows="10"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
