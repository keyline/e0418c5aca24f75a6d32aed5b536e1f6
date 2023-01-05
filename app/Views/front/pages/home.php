<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
?>
<section class="body-area">
    <div class="container-fluid">
        <div class="row body-row">
            <div class="col-lg-8">
                <div class="splide splide1" aria-label="Splide Basic HTML Example">
                    <div class="week splide__track">
                        <ul class="splide__list day-list">
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">MONDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">TUESDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">WEDNESDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">THURSDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">FRIDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">SATURDAY</div>
                                    </a>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <a href="">
                                        <div class="day">SUNDAY</div>
                                    </a>
                                </div>
                            </li>
                        </ul>                                
                    </div>
                </div>
                <div class="row card-row">
                    <div class="col-md-6">
						<div class="card-con">
							<div class="owl-carousel owl-homeliveleft">
								<div class="owl-card">
									<div class="card-img">
										<img src="<?=$ASSETS_URL?>images/card-img.png" alt="">
									</div>
									<div class="card-content">
										<div class="now-box">
											<h5>NOW LIVE</h5> <i class="fas fa-circle"></i>
										</div>
										<h3>Ep 6 <span>|</span> Park Street Cementery</h3>
										<p>With <b>Aritra</b></p>
										<div class="button-sec">
											<div class="join-button">

												<p>Join Live <b>Now</b></p>
												<i class="fas fa-arrow-right"></i>
												<div class="color"></div>
											</div>
											<div class="share-btn">
												<i class="fas fa-share"></i>
												<span>Share</span>
											</div>
										</div>
									</div>
								</div>
								<div class="owl-card">
									<div class="card-img">
										<img src="<?=$ASSETS_URL?>images/card-img.png" alt="">
									</div>
									<div class="card-content">
										<div class="now-box">
											<h5>NOW LIVE</h5> <i class="fas fa-circle"></i>
										</div>
										<h3>Ep 6 <span>|</span> Park Street Cementery</h3>
										<p>With <b>Aritra</b></p>
										<div class="button-sec">
											<div class="join-button">

												<p>Join Live <b>Now</b></p>
												<i class="fas fa-arrow-right"></i>
												<div class="color"></div>
											</div>
											<div class="share-btn">
												<i class="fas fa-share"></i>
												<span>Share</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        
                        <div class="dash hd-dash"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-con card-con-red">
							<div class="owl-carousel owl-homeupcoming">
								<div class="owl-card">
									<div class="card-img">
										<img src="<?=$ASSETS_URL?>images/card-img.png" alt="">
									</div>
									<div class="card-content">
										<div class="now-box upcoming-box">
											<h5>UPCOMING</h5>
										</div>
										<h3>Ep 6 <span>|</span> Chuchu The Shoe Boy</h3>
										<p>With <b>Priyanka</b></p>
										<div class="button-sec">
											<div class="join-button count-button">
												<i class="fas fa-stopwatch"></i>
												<p>Starts in <span> 4 Hrs : 08 Min : 08 Sec</span></p>
												<div class="color"></div>
											</div>
											<div class="share-btn">
												<i class="fas fa-share"></i>
												<span>Share</span>
											</div>
										</div>
									</div>
								</div>
								<div class="owl-card">
									<div class="card-img">
										<img src="<?=$ASSETS_URL?>images/card-img.png" alt="">
									</div>
									<div class="card-content">
										<div class="now-box upcoming-box">
											<h5>UPCOMING</h5>
										</div>
										<h3>Ep 6 <span>|</span> Chuchu The Shoe Boy</h3>
										<p>With <b>Priyanka</b></p>
										<div class="button-sec">
											<div class="join-button count-button">
												<i class="fas fa-stopwatch"></i>
												<p>Starts in <span> 4 Hrs : 08 Min : 08 Sec</span></p>
												<div class="color"></div>
											</div>
											<div class="share-btn">
												<i class="fas fa-share"></i>
												<span>Share</span>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="dash"></div>
                <div class="row bottom-row">
                    <div class="col-md-6 vote-col" align="center">
                        <h3>Did You Enjoy Our Previous <br> Content?</h3>
                        <div class="vote-div">
                            <div class="yes-div">
                                <div class="percentage" style="--percent: 70%">
                                </div>
                                Yes
                            </div>
                            <div class="no-div">
                                <div class="percentage" style="--percent: 30%">
                                </div>
                                No
                            </div>
                            <div class="result-div">
                                Results
                            </div>
                        </div>
                        <div class="right-dash"></div>
                        <div class="dash hd-dash"></div>
                    </div>
                    
                    <div class="col-md-6" align="center">
                        <div class="bottom-img">
                            <img src="<?=$ASSETS_URL?>images/BOTTOM-IMG.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-col" align="center">
                <div class="right-img">
                    <img src="<?=$ASSETS_URL?>images/RIGHT-IMG.png" alt="">
                </div>
                <h3>Latest Podcasts</h3>
                <ul>
                    <li>
                        <div class="list-box">
                            <div class="list-content">
                                <h3>Ep 6 <span>|</span> Park Street Cementery</h3>
                                <p>15 Dec'22</p>
                                <button>PLAY NOW <i class="fas fa-play-circle"></i></button>
                            </div>
                            <div class="list-img">
                                <img src="<?=$ASSETS_URL?>images/list-img/Rectangle 16.png" alt="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="list-box">
                            <div class="list-content">
                                <h3>Ep 6 <span>|</span> Park Street Cementery</h3>
                                <p>15 Dec'22</p>
                                <button>PLAY NOW <i class="fas fa-play-circle"></i></button>
                            </div>
                            <div class="list-img">
                                <img src="<?=$ASSETS_URL?>images/list-img/Rectangle 16.png" alt="">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="list-box">
                            <div class="list-content">
                                <h3>Ep 6 <span>|</span> Park Street Cementery</h3>
                                <p>15 Dec'22</p>
                                <button>PLAY NOW <i class="fas fa-play-circle"></i></button>
                            </div>
                            <div class="list-img">
                                <img src="<?=$ASSETS_URL?>images/list-img/Rectangle 16.png" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
                <button>LOAD MORE <i class="fas fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
</section>