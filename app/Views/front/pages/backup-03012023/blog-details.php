<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/blog_banner.jpg" class="img-fluid" alt="image">
                <!--<h1>Blog</h1>-->
            </div>
        </div>
    </div>
</div>
<section class="inner-withleft-content lightgrey_bg globalinner_sec blog-details">
    <div class="home_blog blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-part wow fadeInLeft">
                        <!-- <div class="blog-img">
                                    <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/blog-2.jpg">
                                </div>
                                <h3>Determination of Ozone Generation Efficiency of UV Lamp by Chemical Method</h3>
            
                                <p>Posted on <span> June 14, 2022 </span> By <span class="blue">MSK ADMIN</span></p> -->
                        <div class="listing-total">
                            <div class="left-part">
                                <div class="img-part">
                                    <img src="<?=base_url('uploads/blogs/'.$row->image)?>" class="img-fluid" alt="<?=$row->title?>">
                                </div>
                            </div>
                            <div class="right-part">
                                <div class="listing-inner">
                                    <h3><?=$row->title?></h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href="#" class="get-icon">By: <?=$row->post_by?></a>
                                        </li>
                                        <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <a href="#" class="get-icon"><?=date_format(date_create($row->created_at), "F d Y")?></a>
                                        </li>
                                        <li>
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                            <a href="#" class="get-icon">No Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?=$row->description?>
                        <!-- <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Introduction:</h4>
                                <p class="bold">The Ultraviolet spectrum has four wavelengths, these are:</p>
                                <ul>
                                    <li>UV-A (400 to 315 nm);</li>
                                    <li>UV-B (315 to 280 nm);</li>
                                    <li>UV-C (280 to 200 nm);very high energy and destructive and</li>
                                    <li>Vacuum UV (200 to 100 nm).</li>
                                </ul>
                                <p>Only this last wavelength, Vacuum UV, is capable of producing ozone.</p>
                            </div>

                            <div class="blog-listing-img">
                                <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/blog-2.jpg" alt="logo">
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Principle:</h4>
                                <p>This method can be used to determine the efficiency of the UV lamp for generation of Ozone. Generated ozone in a close system by UV lamp is passed through neutral potassium iodide solution at a fixed flow rate. The reaction between ozone and potassium iodide liberates iodine which again reacts with excess potassium iodide to form potassium tri iodide. The formation of triiodide depends on the concentration of ozone produced by the lamp.The produced potassium triiodide is determined by UV-visible spectrophotometer at 352 nm.</p>
                                <h3>MATERIALS AND METHODS:</h3>
                                <h3 class="red">MATERIALS:</h3>
                                <ul>
                                    <li>Ozone generating UV lamp</li>
                                    <li>PVC pipe</li>
                                    <li>Suction pump</li>
                                    <li>Flow meter</li>
                                    <li>Stop watch</li>
                                    <li>Midget Impinger</li>
                                    <li>Impinger box with cooling arrangement</li>
                                    <li>Silicon tube</li>
                                    <li>UV -VISIBLE spectrophotometer</li>
                                    <li>QUARTZ cuvette (10mm)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Absorbing solution (1% KI in 0.1 M Phosphate buffer) :</h4>
                                <p>13.6 g of potassium dihydrogen phosphate (KH2PO4), 14.2 g of disodium hydrogen phosphate (Na2HPO4) and 10.0 g of potassium iodide are dissolved in sequence to 400 ml distilled water and diluted 1000 ml with distilled water. This solution is to be kept at room temperature for at least 1 day before use. The pH of the solution is adjusted to 6.8 + 0.2 with NaOH or KH2PO4.This solution can be stored for several months in a glass stoppered brown bottle at room temperature without deterioration. It should not be exposed to direct sunlight.</p>

                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Potassium dichromate (0.05 N):</h4>
                                <p>0.6129 g of Potassium dichromate is dissolved in 100 ml of distilled water and volume made upto 250 ml.</p>

                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Sodium Thiosulphate (0.05 N) :</h4>
                                <p>3.1025 g of Sodium Thiosulphate is dissolved in 250 ml distilled water.</p>

                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Starch:</h4>
                                <p>0.2 g Starch and pinch of Mercuric iodide are dissolved in 100 ml boiling distilled water.</p>

                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Iodine stock solution I2 (0.05 N) :</h4>
                                <p>16 g of potassium iodide and 3.173 g of resublimed iodine are dissolved in 200 ml of distilled water and diluted 500 ml with distilled water. This solution is to be kept at room temperature for at least 1 day before use.</p>

                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Standardization of I2 stock Solution:</h4>
                                <p>Sodium thiosulphate (0.05N) is standardised by using standard Potassium dichromate (0.05N). This solution is used for standardisation of iodine solution. Briefly, 10ml of the 0.05 (N) Iodine solution is taken into a 250 ml Iodine flask and titrated against 0.05 (N) Sodium thiosulphate solution using starch indicator.</p>
                                <p>Normality of Iodine Y(N) = (T.V of Na2S2O3 x strength of Na2S2O3)/ Vm</p>
                                <p>Vm= Volume of Iodine solution taken in flask (10 ml)</p>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Working standard solution of iodine (0.0025N):</h4>
                                <p>UV LAMP was inserted into the PVC pipe. One side must be kept open to get entry of air (ozone free).On the other end a nozzle fitted with silicon tube was fitted which is connected with impinger (Glass) containing absorbing solution. The outlet part of the impinger was connected to the inlet part of the second impinger. The outlet part of the second impinger was connected to the suction pump having arrangement to control flow rate.</p>
                                <p class="text-style">For low concentration (expected)</p>
                                <p>10 ml of absorbing solution was placed in a standard impinger and sample for 60 min at the flow rate of 2 L/min.</p>
                                <p class="text-style">For high concentration (expected)</p>
                                <p>30 ml of absorbing solution was placed in a standard impinger and sample for one hour at the flow rate of 0.5 to 1 L/min.</p>
                                <p>Exposure of the absorbing reagent to direct sunlight should be strictly restricted.</p>
                                <p>After sampling, the volume of sample was measured and transferred to a sample storage amber bottle</p>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>A) Analysis</h4>
                                <p>If, appreciable evaporation of the absorbing solution occurs during sampling, distilled water was added to bring the liquid volume to 10 ml. The solution was transferred in to the 10mm cuvette &amp; the absorbance was recorded at 352 nm against a reference cuvette containing distilled water.</p>
                                <p>The absorbance of the unexposed reagent was also recorded and subtracted from the absorbance of the sample.</p>
                                <p></p>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>B) PREPARATION OF STANDARD CURVE</h4>
                                <p>From the working Iodine solution (0.0025N), preparation of a standard solutions were done as per below table and the absorbance were recorded at 352 nm:</p>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Content O3 (µl/10 ml)</th>
                                            <th scope="col">absorbance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.2</td>
                                            <td>0.111</td>
                                        </tr>
                                        <tr>
                                            <td>2.4</td>
                                            <td>0.233</td>
                                        </tr>
                                        <tr>
                                            <td>4.8</td>
                                            <td>0.395</td>
                                        </tr>
                                        <tr>
                                            <td>7.3</td>
                                            <td>0.649</td>
                                        </tr>
                                        <tr>
                                            <td>9.8</td>
                                            <td>0.869</td>
                                        </tr>
                                        <tr>
                                            <td>12.2</td>
                                            <td>1.138</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>1.224 *100000 = conversion factor for Normality(N) to µl for 10 ml sample</p>
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>CALCULATION:</h4>
                                <p>Effective Volume (V2) of pipe(cc) = ᴨ(d/2)2l Where d= diameter of the tube in cm(3.81cm), l = effective length of the pipe in cm (77cm)= 877cc</p>
                                <p>Volume(V1) of UV lamp in the pipe(cc) = ᴨ(d1/2)2l1 Where d1= diameter of the UV lamp in cm(1.5cm), l1 = length of the UV lamp in cm (77cm)=136 cc</p>
                                <p>Air Space between the tubes:(V) = V2-V1 = (877 – 136)=741 cc</p>
                                <p>Volume of Air collected(Va) = flow rate(LPM) * time(min)*1000 = 0.5LPM *1*1000= 500cc</p>
                                <p>Content of Ozone (C ) in μl= (As – Ab)/ Slope =( 0.903- 0.388)/0.09185= 280 µl(50 times dilution)</p>
                                <p>Rate of generation of Ozone(µg/h) = C*1.962*V* 60/Va*t=280 *1.962*741*60/500*1 =47803µg/hr</p>
                                <p>Rate of generation of Ozone (mg/h) = Rate of generation of Ozone (µg/h) /1000 = 47803 µg/1000 = 47.8 mg/h</p>
                                <p>Where,</p>
                                <p>As = Absorbance of sample</p>
                                <p>Ab = Absorbance of reagent blank</p>
                                <p>Slope =absorbance/μl unit from standard curve=0.0</p>
                                <p>1.962 = Conversion factor, μl to μg</p>
                            </div>
                            <div class="blog-listing-img">
                                <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/blog-7.png" alt="logo">
                            </div>
                            <div class="blog-listing-img-part">
                                <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/blog-8.png" alt="logo">
                                <img class="img-fluid" src="<?=base_url('material/front/assets/img/')?>/blog-9.png" alt="logo">
                            </div>
                        </div>
                        <div class="blog-listing">
                            <div class="blog-listing-left">
                                <h4>Conclusion:</h4>
                                <p>By using this experiment, we can estimate the efficiency for the generation of ozone by UV LAMP.</p>
                                <p><i>Contributed by: <span> Bodhisatta Maity</span></i></p>
                            </div>
                        </div> -->
                        <!-- <a href="#" class="brand_btn d-inline-block mt-4">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>