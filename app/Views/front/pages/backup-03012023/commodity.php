<!-- ********|| BANNER STARTS ||******** -->
<div class="innerpage_banner lightgrey_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="inner_bannerimg">
                <img src="<?=base_url('material/front/assets/img/')?>/commodities-banner.jpg" class="img-fluid" alt="image">
                <!--<h1>Commodities</h1>-->
            </div>
        </div>
    </div>
</div>
<section class="therapy-sec inner-withleft-content lightgrey_bg globalinner_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="left_nav-section">
                    <div class="leftnav_inner commodities_leftnav_tab">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php if($commodities){ $i=1; foreach($commodities as $row){?>
                                <a class="nav-link <?=(($i==1)?'active':'')?>" id="v-pills-<?=$row->slug?>-tab" data-toggle="pill" href="#v-pills-<?=$row->slug?>" role="tab" aria-controls="v-pills-<?=$row->slug?>" aria-selected="true"><img src="<?=base_url('uploads/commodity/'.$row->commodity_icon)?>" alt="<?=$row->name?>" class="img-fluid" /> <span><?=$row->name?></span></a>
                            <?php $i++; } }?>

                            <!-- <a class="nav-link" id="v-pills-coalcoke-tab" data-toggle="pill" href="#v-pills-coalcoke" role="tab" aria-controls="v-pills-coalcoke" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-03.svg" alt="icon" class="img-fluid" /> <span>Coal & Coke</span></a>

                            <a class="nav-link" id="v-pills-nonferrous-tab" data-toggle="pill" href="#v-pills-nonferrous" role="tab" aria-controls="v-pills-nonferrous" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-04.svg" alt="icon" class="img-fluid" /> <span>Non Ferrous</span></a>

                            <a class="nav-link" id="v-pills-fluxcommodities-tab" data-toggle="pill" href="#v-pills-fluxcommodities" role="tab" aria-controls="v-pills-fluxcommodities" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-05.svg" alt="icon" class="img-fluid" /> <span>Flux & Cementatious </span></a>

                            <a class="nav-link" id="v-pills-environment-tab" data-toggle="pill" href="#v-pills-environment" role="tab" aria-controls="v-pills-environment" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-06.svg" alt="icon" class="img-fluid" /> <span>Environment</span></a>

                            <a class="nav-link" id="v-pills-food-tab" data-toggle="pill" href="#v-pills-food" role="tab" aria-controls="v-pills-food" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-07.svg" alt="icon" class="img-fluid" /> <span>Food</span></a>

                            <a class="nav-link" id="v-pills-agriculture-tab" data-toggle="pill" href="#v-pills-agriculture" role="tab" aria-controls="v-pills-agriculture" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-08.svg" alt="icon" class="img-fluid" /> <span>Agriculture</span></a>

                            <a class="nav-link" id="v-pills-fertilizer-tab" data-toggle="pill" href="#v-pills-fertilizer" role="tab" aria-controls="v-pills-fertilizer" aria-selected="false"><img src="<?=base_url('material/front/assets/img/')?>/commodites-icon/new-icon-09.svg" alt="icon" class="img-fluid" /> <span>Fertilizer</span></a> -->
                            
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-9 col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-ores-alloys" role="tabpanel" aria-labelledby="v-pills-ores-alloys-tab">

                        <div class="inner-title">
                            <h2>Ores & Alloys</h2>
                            <!--<h5>– A World of Responsibility</h5>-->
                        </div>
                        <div class="commodita_content">
                            <p class="pb-3"><strong><a href="#"> MSK offices</a></strong> is geared up to serve even in remote locations through a network of well-equipped laboratories and sampling teams across the globe. The Central Testing Laboratory in Kolkata undertakes advanced chemical, radiological and photometric studies, while local country laboratories provide all standard tests as well as meet specific regional requirements. <strong><a href="#">Mitra SK's Services</a></strong> renders flexibility at mining heads, warehouses and ports, that are accurate and on time.</p>
                            <div class="labtor_inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="innner-content">
                                        
                                            <div id="labotary">          
                                                <ul class="resp-tabs-list hor_1">
                                                    <li>Iron Ore</li>
                                                    <li>Ferro Alloys</li>
                                                </ul> 
                                        
                                                <div class="resp-tabs-container hor_1">                                                        
                                                    <div>
                                                        <div class="labotary_infoinner">
                                                            <p class="pb-3">Iron ores are rocks and minerals from which metallic iron can be economically extracted. The Iron ores are usually rich in iron oxides and vary in color from dark grey, bright yellow, deep purple, to rusty red. The iron itself is usually found in the form of magnetite (Fe3O4), hematite (Fe2O3), goethite [FeO (OH)], limonite [FeO (OH).n (H2O)] or siderite (FeCO3). Iron Ores carrying very high quantities of hematite or magnetite (greater than ~60% iron) are known as "natural ore" or "direct shipping ore", meaning that those can be fed directly into iron-making blast furnaces. Iron ore is the raw material used to make pig iron, which is one of the main raw materials to make steel. 98% of the mined iron ore is used to make steel. Iron Ore is the fourth most abundant element in the Earth's crust.</p>
                                                            <div class="accordion commodita_accordion" id="accordionExample">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                MILL SCALE <i class="fa fa-angle-down rotate-icon"></i>
                                                                            </button>
                                                                        </h2>
                                                                    </div>
                                
                                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <p>Mill scale, often shortened to just scale, is the flaky surface of hot rolled steel, iron oxides consisting of Iron(+II,III) oxide, hematite, and magnetite. Mill scale is formed on the outer surfaces of plates, sheets or profiles when they are being produced by rolling red hot iron or steel billets in rolling mills. Mill scale is composed of iron oxides mostly ferric and is bluish black in color. It is usually less than 1 mm (0.039 in) thick and initially adheres to the steel surface and protects it from atmospheric corrosion provided no break occurs in this coating. Because it is electro-chemically cathodic to steel, any break in the mill scale coating will cause accelerated corrosion of steel exposed at the break. Mill scale is thus a boon for a while until its coating breaks due to handling of the steel product or due to any other mechanical cause. Mill scale is a nuisance when the steel is to be processed. Any paint applied over it is wasted since it will come off with the scale as moisture laden air get under it. Thus mill scale can be removed from steel surfaces by flame cleaning, pickling, or abrasive blasting, which are all tedious operations that waste energy. This is why shipbuilders used to leave steel delivered freshly rolled from mills out in the open to allow it to 'weather' till most of the scale fell off due to atmospheric action. Nowadays most steels mills can supply their produce with mill scale removed and steel coated with shop primers over which welding can be done safely.</p>
                                                                            <p class="fontred">PELLETS</p>
                                                                            <p>Iron ore pellets are spheres of typically 8–18 mm (0.31–0.71 in) to be used as raw material for blast furnaces. They typically contain 67%-72% Fe and various additional material adjusting the chemical composition and the metallurgic properties of the pellets. Typically limestone, dolostone and olivine is added and Bentonite is used as binder.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                        <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                Effects of Iron Ore Elements on Steel Making <i class="fa fa-angle-down rotate-icon"></i>
                                                                            </button>
                                                                        </h2>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <p>Some placeholder content for the second accordion panel. This panel is hidden by default.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                        <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                BASICS OF SOME IMPORTANT ELEMENT ANALYSIS OF IRON ORE <i class="fa fa-angle-down rotate-icon"></i>
                                                                            </button>
                                                                        </h2>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <p>And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                        <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                                TML & FMP <i class="fa fa-angle-down rotate-icon"></i>
                                                                            </button>
                                                                        </h2>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            <p>And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="labotary_infoinner">
                                                            <div class="commoditea_metalall_content pt-4">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <h3 class="con-ttile">Chromite Ore</h3>
                                                                        <p class="mb-2">Chromite is the only commercially viable ore of chromium (Cr) which is a member of the spinel group of minerals. It is chemically known as iron chromium oxide (FeCr2O4). Chromium is versatile & essential due to its resistance to corrosion, oxidation, wear & galling and enhancement of hardenability. Chromium is an important alloying metal in Metallurgical Industry for manufacture of ferro-alloys, e.g., ferrochrome, charge chrome. Ferro-alloys are the essential ingredients for the production of high-quality special alloy steel , stainless steel as well as mild steel. The chromium (Cr) to iron (Fe) ratio is one of the important factors to be considered before deciding the end-use of the mineral</p>
                                                                        <h3 class="con-ttile">Chromium Alloy:</h3>
                                                                        <p>Ferrochromium is a master alloy of iron & chromium. It is used primarily in the production of stainless steel of various grades. Chromium in stainless steel hardens and toughens steel as well as increases its resistance to corrosion. The quality of the Ferrochromium needs to be ensured before use in steelmaking, all along the supply chain i.e. from mines to steel plants.</p>
                                                                        <p class="italic mb-2">Mitra S K is a leading TIC agency can help the industries to ensure both quantity & quality of ferrochrome throughout the supply chain (Mine to steel industry). We perform inspection & testing according to various national & international standards.</p>
                                                                    </div>
                                                                    <div class="col-md-4 comm-metal-grey">
                                                                        <div class="commoditea_metalall_panel">
                                                                            <h3>Commodity Basket</h3>
                                                                            <div class="title_panel">Commodity Basket</div>
                                                                            <div class="bottom-arrow"></div>
                                                                            <ul>
                                                                                <li>Chromium Ore</li>
                                                                                <li>Manganese Ore</li>
                                                                                <li>Nickel Ore</li>
                                                                            </ul>
                                                                            <div class="title_panel">Major Ferro Alloys</div>
                                                                            <div class="bottom-arrow"></div>
                                                                            <ul>
                                                                                <li>Ferro Chrome</li>
                                                                                <li>Ferro Manganese</li>
                                                                                <li>Silico Manganese</li>
                                                                                <li>Ferro Silicon</li>
                                                                                <li>Ferro Nickel</li>
                                                                                <li>Noble Ferro Alloys</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="commoditea_metalall_content pt-5">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-8 order-md-2">
                                                                        <h3 class="con-ttile">Manganese Ore & Manganese Alloy:</h3>
                                                                        <p class="mb-2">MANGANESE An Alloying Element in Steel Making. To add manganese as an alloying element in steelmaking as ferroalloys, mainly silicomanganese, ferromanganese etc. are used and this is made from manganese ore (Pyrolusite MnO2, Manganite Mn2O3.H2O, Braunite 3Mn2O3. MnSiO3, Hausmannite Mn3O4, rhodochrosite MnCO3). Therefore, before adding these manganese-based ferroalloys in steelmaking, it is essential to evaluate the quality of both the raw materials & Ferro Alloys.</p>
                                                                        <p class="italic mb-2">Internationally accepted and standardized methods for estimation of manganese in manganese alloys as well as manganese ores are feasible in Mitra SK- laboratories, which specifies a Potentiometric method for final determination of manganese content in manganese ores & manganese-based ferroalloys.</p>
                                                                        <h3 class="con-ttile">Nickel Ore & Nickel Alloy</h3>
                                                                        <p class="mb-2">Nickel is primarily found in the ores pentlandite, pyrrhotite, garnierite, millerite and niccolite. Nickel is predominantly an alloy metal & its chief use is in the nickel steel, stainless steel & nickel cast iron of which there are many varieties. Ferronickel is a member of the group of ferrous alloys in which iron is combined with nickel to form a new alloy. Ferronickel is a member of the group of ferrous alloys in which iron is combined with nickel to form a new alloy. Like other ferrous alloys, ferronickel is also widely used in the Iron and Steel industry. The quality of the Ferronickel needs to be ensured before use in the Iron and Steel Industry, all along the supply chain.</p>
                                                                        <p class="italic mb-2">Mitra SK as an independent inspection agency is competent test the chemical composition of Nickel Ore & Ferronickel using wet chemical as well as instrumental techniques. MSK is one of the trusted Partners for Testing and Inspection of Nickel ore and alloys using international standard methods.</p>
                                                                    </div>
                                                                    <div class="col-md-4 comm-metal-grey order-md-1">
                                                                        <div class="commoditea_metalall_panel">
                                                                            <h3>Services</h3>
                                                                            <ul>
                                                                                <li>Sampling And Inspection</li>
                                                                                <li>Exploration Sample Analysis</li>
                                                                                <li>Stack Assesment</li>
                                                                                <li>Quantity Survey</li>
                                                                                <li>Supervison of Loading & Unloading</li>
                                                                                <li>Physical and chemical analysis</li>
                                                                                <li>Indipendent Inspection & Inspection Supervison</li>
                                                                            </ul>
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
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                            
                        </div>
                    </div>                    
                    <div class="tab-pane fade" id="v-pills-coal-coke" role="tabpanel" aria-labelledby="v-pills-coal-coke-tab">
                        <div class="inner-title">
                          <h2>Coal & Coke</h2>
                        </div>
                        <div class="commodita_content">
                            <p class="mb-2">Coke is a solid carbonaceous residue derived from low-ash, low-sulfur bituminous coal from which the volatile constituents are driven off by baking in an oven without oxygen at temperatures as high as 1,000 °C (1,832 °F) so that the fixed carbon and residual ash are fused together. Metallurgical coke is used as a fuel and as a reducing agent in smelting iron ore in a blast furnace. The coking coal should be low in sulphur and phosphorus so that they do not migrate to the metal. The product is cast iron and is too rich in dissolved carbon, and so must be treated further to make steel.</p>
                            <p class="mb-2">Coke must be strong enough to resist the weight of overburden in the blast furnace, which is why coking coal is so important in making steel using the conventional route. However, the alternative route is to directly reduced iron, where any carbonaceous fuel can be used to make sponge or pelletized iron. Coke from coal is grey, hard, and porous and has a heating value of approx 7050kcal/kg and above. Some coke making processes produce valuable by-products that include coal tar, ammonia, light oils, and "coal gas".</p>
                            <p class="mb-2">Petroleum coke is the solid residue obtained in oil refining, which resembles coke but contains too many impurities to be useful in metallurgical applications.</p>
                            <p class="mb-2">For Coke we analyze Coke Strength After Reaction (CSR) and Coke Reactivity Index (CRI).</p>
                            
                            <h4 class="fontred bold600">Coke Strength After Reaction:</h4>
                            <p class="mb-2">A laboratory test designed to give an indication of the strength of coke after being exposed to the reducing atmosphere of the blast furnace. Coke, after exposure to the high temperature and carbon dioxide atmosphere of the coke reactivity test, is tested in a tumbler device to determine its strength.</p>
                            <h4 class="fontred bold600">Coke Reactivity Index:</h4>
                            <p class="mb-4">A laboratory test designed to simulate the loss of coke through reaction in the reducing atmosphere, as the coke makes its way down the blast furnace. Coke is heated up to 950C in an inert atmosphere and held at that temperature in an atmosphere of carbon dioxide. The coke is cooled down under the inert atmosphere and the loss in weight expressed as a percent is the reactivity.</p>
                             
                            <h4 class="fontred bold600">M10-M40:</h4>
                                <ul>
                                    <li>M40 – the percentage material remaining +40mm round hole after 100 revolutions in a drum</li>
                                    <li>M10 – the percentage material –10mm round hole after 100 revolutions in a drum</li>
                                </ul>
                                
                        </div>
                    </div>                
                    <div class="tab-pane fade" id="v-pills-non-ferrous" role="tabpanel" aria-labelledby="v-pills-non-ferrous-tab">
                        <div class="inner-title">
                          <h2>Non Ferrous</h2>
                            <div class="commodita_content">
                                <p class="mb-4">Non-ferrous metals include aluminum, copper, lead, zinc and tin, as well as precious metals like gold and silver. Their main advantage over ferrous materials is their malleability. They also have no iron content, giving them a higher resistance to rust and corrosion, and making them ideal for gutters, liquid pipes, roofing and outdoor signs. Lastly they are non-magnetic, which is important for many electronic and wiring applications.</p>
                                <h6 class="fontred bold600">SCOPE OF MSK IN NON-FERROUS:</h6>
                                <div class="table-responsive">
                                  <table class="table table-bordered table-white">
                                    <tbody>
                                      <tr>
                                        <td><strong>Item</strong></td>
                                        <td><strong>Scope</strong></td>
                                      </tr>
                                      <tr>
                                        <td>Ores</td>
                                        <td><ol>
                                            <li>Zinc Ores/Concentrates/Sulphides</li>
                                            <li>Lead Ores/Concentrates/Sulphides</li>
                                            <li>Copper Ores/Concentrates/Sulphides</li>
                                            <li>Nickel Ores/Concentrates/Sulphides</li>
                                            <li>Tin Ores (Casseterites)/Concentrates/Sulphides</li>
                                            <li>Cobalt Ores/Concentrates</li>
                                          </ol></td>
                                      </tr>
                                      <tr>
                                        <td>Alloys</td>
                                        <td><ol>
                                            <li>Brass (Copper + Zinc)</li>
                                            <li>Bronze (Copper + Tin)</li>
                                            <li>Lead Base White Metals</li>
                                            <li>Tin Base White Metals</li>
                                          </ol></td>
                                      </tr>
                                      <tr>
                                        <td>Pure Metals</td>
                                        <td><ol>
                                            <li>High Grade Primary Aluminium</li>
                                            <li>High Purity Tin</li>
                                            <li>Special High Grade Zinc</li>
                                            <li>Standard Lead</li>
                                            <li>Primary Nickel</li>
                                            <li>High Purity Copper</li>
                                            <li>High Purity Cobalt</li>
                                          </ol></td>
                                      </tr>
                                      <tr>
                                        <td>Precious Metals</td>
                                        <td ><ol>
                                            <li>Platinum</li>
                                            <li>Palladium</li>
                                            <li>Gold</li>
                                            <li>Silver</li>
                                            <li>Ruthenium</li>
                                            <li>Rhodium</li>
                                            <li>Iridium</li>
                                          </ol></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                
                                
                                
                                <div class="multicolor_box">
                                    <div class="col-md-12  pb-4 pt-3">
                                        <h6 class="fontred bold600">PRINCIPLES BEHIND WET ANALYSIS OF MAJOR NONFERROUS ELEMENTS:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color1">A</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Zinc</h4>
                                            <p>Dissolution of the samples in acid medium followed by complexometric analysis using EDTA (As per ISO 13658)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color2">B</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Lead</h4>
                                            <p>Dissolution of the samples in acid medium followed by complexometric analysis using EDTA (As per ISO 13545)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color3">C</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Copper</h4>
                                            <p>Dissolution of the samples in acid medium followed by iodometric esimation of copper using sodium thiosulphate (As per ISO 10258)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color4">D</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Nickel</h4>
                                            <p>Decomposition of the sample in presence of hydrogen fluoride and acids followed by gravimetric estimation using Di-methyl Glyoxime as a nickel complex (As per JIS M8126)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color5">E</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Cobalt</h4>
                                            <p>Dissolution of the sample in acid medium followed by complexometric analysis using EDTA after seperation of other interfering elements (Lab Developed Method)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ferrous_box">
                                            <div class="serve_nub">
                                                <h2 class="color6">F</h2>
                                            </div>
                                            <div class="ferrous_info">
                                            <h4>Tin:</h4>
                                            <p>Dissolution of the sample in acid medium followed by complexometric analysis using EDTA after seperation of other interfering elements (Lab Developed Method)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <p class="mb-2 pt-3">Trace Elements & Impurities determined in ICP-OES from the acidified solution after digestion of sample in Sealed Digestion Bomb</p>
                                    <p class="mb-2">FIRE ASSAY TECHNIQUE FOR EXTRACTION OF GOLD, SILVER & PLATINUM GROUP OF METALS (PGM):</p>
                                    <p class="mb-2">Fire assaying is the industry standard process for obtaining pure gold and platinum group elements (PGE) from high grade ores.</p>
                                    </div>
                                </div>
                                
                                
                                <div class="py-4 px-4 lightgrey1_bg">
                                    <h6 class="fontred bold600">THE PROCESS</h6>
                                    <p class="mb-2">a) Fusion: The pulverized sample is weighed and mixed with a fluxing agent. The flux assists in melting, helps to fuse the sample at a reasonable temperature and promotes separation of the gangue material from the precious metals. In addition to the flux, lead or nickel is added as a collector. The sample is then heated in a furnace where it fuses and separates from the collector material ‘button’, which contains the precious minerals.</p>
                                    <p class="mb-2">b) Precious Metal Extraction: Once the button is separated from the gangue, the precious metals are extracted from the collector through a process called cupellation. Once the button has cooled, it is separated from the slag and cupelled.</p>
                                    <ul>
                                        <li>When lead is used as a collector, the lead oxidizes and is absorbed into the cupel leaving a precious metal bead. The bead is then dissolved in aqua regia for analysis.</li>
                                        <li>When nickel is used as a collector, the button is crushed and dissolved in hydrochloric acid and the residue is filtered to remove extraneous material, leaving the precious metal residue on the filter.</li>
                                    </ul>
                                    <p class="mb-2">Analysis & Detection: Gold and PGMs can be analysed by Flame atomic Abosorption (AAS) or by Inductively Coupled Plasma Atomic Absorption Spectrometry (ICP-OES). Detection level is in ppb and ppm level depending on the performance of the equipment.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="tab-pane fade" id="v-pills-flux-cementitious" role="tabpanel" aria-labelledby="v-pills-flux-cementitious-tab">
                        <div class="inner-title">
                          <h2>Flux & Cementatious Commodities</h2>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-environment" role="tabpanel" aria-labelledby="v-pills-environment-tab">
                        <div class="inner-title">
                          <h2>Environment</h2>
                        </div>
                        <div class="commodita_content">
                            <p class="mb-2"><strong>Environmental</strong> pollution is a matter of global concern today. Industrialisation and development have largely contributed to the growing risk to public health, making it imperative for governments and industry to monitor and measure the level of water and air pollution, and noise pollution.</p>
                            
                            <div class="envirment_boxitem">
                                <div class="envir_left">
                                    <h6>Water Pollution</h6>
                                    <ul>
                                        <li>MitraSK has the expertise to test the quality of water both before and after treatment for Physical and chemical analysis of waste water as per IS 2490 (I) - 1981</li>
                                        <li>Physical, chemical, bacteriological, and microbiological analysis of drinking water as per IS 10500 - 1991.</li>
                                        <li>Sampling and analysis of swimming pool water as per IS 3328</li>
                                    </ul>
                                    <p class="mb-3">Tests, on a regular basis, are being done for government agencies, manufacturing companies, academic bodies and NGO's.</p>
                                </div>
                                <div class="envir_mid">
                                    <h6>Air Pollution</h6>
                                    <p class="mb-2">MitraSK is actively involved in the monitoring, measurement and analysis of air pollutants both in ambient air and stack emissions on the following parameters</p>
                                    <ul>
                                        <li>Respirable Suspended Particulate Matter (RSPM), Sulphur Dioxide (SO2), Nitrogen Dioxide (NO2) and Carbon Monoxide (CO).</li>
                                        <li>Stack emissions for Suspended Particulate Matter (SPM), Sulphur Dioxide (SO2), Nitrogen Dioxide (NO2), Carbon Dioxide (CO2), Carbon Monoxide (CO) and Oxygen.</li>
                                        <li>Recording and collection of Micro Meteorological data such as Temperature, Wind direction, Wind speed, Humidity and Rainfall.</li>
                                    </ul>
                                </div>
                                <div class="envir_right">
                                    <h6>Noise Pollution</h6>
                                    <p class="mb-3">Noise level studies at and near areas such as Hospitals, Schools, Traffic intersections, Airports and factories are also undertaken by MitraSK</p>
                                </div>
                            </div>
                            
                            <h6 class="fontred bold600">Our services at a Glace:</h6>
                            <div class="table-responsive">
                              <table class="table table-bordered table-white">
                                <thead>
                                  <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Protocol</th>
                                    <th scope="col">Facility</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td> Ambient Air Quality</td>
                                    <td>As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Stack Flue Gas Monitoring</td>
                                    <td>As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Surface Water Analysis</td>
                                    <td>As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">4</th>
                                    <td> Ground Water Analysis</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>5</strong></td>
                                    <td> Noise Level Monitoring</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>6</strong></td>
                                    <td> Waste Water Analysis</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>7</strong></td>
                                    <td> Soil Analysis</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>8</strong></td>
                                    <td> PG Test for Pollution Control Device</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>9</strong></td>
                                    <td> Indoor Air Quality Monitoring</td>
                                    <td ><strong>-</strong></td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>10</strong></td>
                                    <td> Fugitive Air/Work Zone Monitoring</td>
                                    <td ><strong>-</strong></td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>11</strong></td>
                                    <td> Drinking Water Analysis</td>
                                    <td >IS:10500:1991</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>12</strong></td>
                                    <td> Marine Impact Assessment</td>
                                    <td ><strong>-</strong></td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>13</strong></td>
                                    <td> Initial Environmental Examination</td>
                                    <td ><strong>-</strong></td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>14</strong></td>
                                    <td> Meteorological Data Generation</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>15</strong></td>
                                    <td> Hazardous Waste Audit</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>16</strong></td>
                                    <td> Environmental Audit</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>17</strong></td>
                                    <td> Ecological &amp; Biodiversity Study</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>18</strong></td>
                                    <td> Baseline Monitoring for EIA/EMP</td>
                                    <td >As per CPCB declared method</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>19</strong></td>
                                    <td > Environmental Impact Assessment</td>
                                    <td ><strong>-</strong></td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>20</strong></td>
                                    <td> Food Testing</td>
                                    <td >As per FSSAI</td>
                                    <td><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td ><strong>21</strong></td>
                                    <td > Packaged Drinking Water Analysis</td>
                                    <td >IS:14543/IS:13428</td>
                                    <td valign="top" width="85"><p align="center">Y</p></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" valign="bottom"><p align="center"><strong>&nbsp;</strong></p></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-food" role="tabpanel" aria-labelledby="v-pills-food-tab">
                        <div class="inner-title">
                          <h2>Food</h2>
                        </div>
                        <div class="commodita_content">
                            <p class="mb-2">In today’s world consumers pay careful attention to the quality of the food they eat and buy. Ingredients have become key factor than anything. Government of India has framed several norms, which are covered under Food Safety & Standard Acts in India (FSSAI). The policies for food safety and hygiene control are becoming more important for food industries to meet this challenging environment.MSK is committed to meet the customer and the applicable regulatory requirements in testing and certification services of food. At MSK, we provide solutions at every stage within food industry. Our expertise and experience delivers services to control quality and safety throughout the food industry from semi manufactured to final products. MSK’s Food Testing is an integrated food testing facility in India with modern technology and highly sophisticated testing equipment’s.</p>
                            <p class="mb-2">MSK Laboratories are compliant to ISO 9001:2015 and accredited by NABL (ISO/IEC 17025:2017), EIC/ISO 17020 and recognised by FSSAI.</p>
                            
                            <h6 class="fontred bold600 pt-4">Tests that we undertake:</h6>
                            <div class="food_boxitem">
                                <div class="food_left">
                                    <h6>Food</h6>
                                    <ul>
                                        <li>Physical parameters</li>
                                        <li>Microbiological Evaluation of different pathogens</li>
                                        <li>Pesticide residues</li>
                                        <li>Minerals, Trace Elements</li>
                                        <li>Vitamins</li>
                                        <li>Chemical Composition</li>
                                        <li>Food nutritional labelling</li>
                                        <li>Heavy metals</li>
                                        <li>Mycotoxins</li>
                                        <li>Cholesterol, Fatty acid profile</li>
                                        <li>Additives, Adulterants</li>
                                        
                                    </ul>
                                </div>
                                <div class="food_mid">
                                    <h6>Water</h6>
                                    
                                    <ul>
                                        <li>Drinking water as per IS:10500 standard</li>
                                        <li>Packaged drinking water as per IS:14543 standard</li>
                                        <li>Natural Mineral water as per IS:13428 standard</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="whitebg py-4 px-4">
                                <h6 class="fontred bold600">Following products can be tested in our labs:</h6>
                                <ul class="food_otherlab">
                                    <li>Drinking Water</li>
                                    <li>Packaged Drinking Water</li>
                                    <li>Natural Mineral Water</li>
                                    <li>Milk and Dairy Products</li>
                                    <li>Bakery and Confectionary Products</li>
                                    <li>Fruits and Vegetables</li>
                                    <li>Beverages (Alcoholic, Non-alcoholic)</li>
                                    <li>Oil and Fats</li>
                                    <li>Spices, Dry Fruits, and Condiments</li>
                                    <li>Food Grains – Pulses, Cereals</li>
                                    <li>Tea and Coffee Products</li>
                                    <li>Fruit Juices, Jam, Jelly, Sauces</li>
                                    <li>Starch and Starch based Products</li>
                                    <li>Honey and Honey based Products</li>
                                    <li>Egg and Poultry Products</li>
                                    <li>Edible Oil</li>
                                    <li>Canned Foods.</li>
                                    <li>Cooked food</li>
                                    <li>Packaged food</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-agriculture" role="tabpanel" aria-labelledby="v-pills-agriculture-tab">
                        <div class="inner-title">
                          <h2>Agriculture</h2>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-fertilizer" role="tabpanel" aria-labelledby="v-pills-fertilizer-tab">
                        <div class="inner-title">
                          <h2>Fertilizer</h2>
                        </div>
                        <div class="commodita_content">
                            <p class="mb-3"><i>Mitra S K is a leading TIC agency can help the industries to ensure both quantity & quality of fertilizers throughout load port to discharge port. We perform inspection & testing according to various national & international standards applicable accordingly.</i></p>
                        </div>
                            <div class="commoditea_metalall_content pt-4">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="con-ttile">Ores</h3>
                                        <p class="mb-2">MSK is capable of doing different parameters in Rock phosphate and KCL with AOAC method which is followed by FCO in their various ISO 17025 accredited lab in India and Overseas. P2O5 and SiO2, R2O3 (Fe2O3 and Al2O3) are main parameters and Mn plays an important role in Rock phosphate which effect the Single Super phosphate process. In Muriate of Potash, water soluble Potassium and Mg as MgO and Sodium as NaCl is important parameters </p>
                                        <h3 class="con-ttile">Straight Fertilizers :</h3>
                                        <p>MSK can perform testing and inspection for all Straight fertilizers like Straight Nitrogenous Fertilizer , Straight Phosphorus Fertilizers , Straight Potassium fertilizers and Straight sulphur fertilizers . MSK </p>
                                        <h3 class="con-ttile">Complex Fertilizers:</h3>
                                        <p class="mb-2">Complex fertilizers manufactured with various composition of Nitrogen, Phosphorus, Potassium, Sulphur. Highly skilled and precise lab equipment are required to analyse these fertilizers as these parameters analysed in Total and water-soluble percentage. These complex fertilizers are combination of different elements and plays vital role during selection of fertilizer as per soil test and soil deficiency. </p>
                                        <p class="italic mb-2">Internationally accepted and standardized methods for estimation of N, P K S  in different complex fertilizers as well as Straight Fertilizers are feasible in Mitra SK- laboratories, which specifies AOAC(Association of Official analytical chemistry) method for final determination of Total and water soluble content .</p>
                                    </div>
                                    <div class="col-md-4 comm-metal-grey">
                                        <div class="commoditea_metalall_panel whitebg">
                                            <h3>COMMODITY BASKET</h3>
                                            <div class="title_panel">ORE</div>
                                            <div class="bottom-arrow"></div>
                                            <ul>
                                                <li>Rock Phosphate</li>
                                                <li>Muriate of Potash</li>
                                            </ul>
                                            <div class="title_panel">Straight Fertilizer</div>
                                            <div class="bottom-arrow"></div>
                                            <ul>
                                                <li>Urea</li>
                                                <li>Single Super Phosphate </li>
                                                <li>Complex Fertilizers (NPK, NPS, DAP, <u>Micronutrients Fortified Fertilizers 100% water soluble Complex fertilizers</u> Beneficial Element Fertilizers </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="commoditea_metalall_content pt-4">
                                <div class="row">
                                    <div class="col-md-4 comm-metal-grey">
                                        <div class="commoditea_metalall_panel whitebg">
                                            <h3>SERVICES</h3>
                                            <div class="title_panel">Commodity Basket</div>
                                            <div class="bottom-arrow"></div>
                                            <ul>
                                                <li>SAMPLING AND INSPECTION</li>
                                                <li>PRESHIPMENT </li>
                                                <li>EXPLORATION SAMPLE ANALYSIS</li>
                                                <li>STACK ASSESMENT</li>
                                                <li>QUANTITY SURVEY</li>
                                                <li>SUPERVISON OF LOADING & UNLOADING</li>
                                                <li>PHYSICAL AND CHEMICAL ANALYSIS</li>
                                                <li>INDIPENDENT INSPECTION & INSPECTION </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="con-ttile">Micronutrients </h3>
                                        <p class="mb-2">Zn , Mn, Boron, Copper, Fe, Molybdenum, can be tested in various form of micronutrients fertilizers . MSK use ICP MS & OES,  WD XRF and other high end equipment to analyse these test up to PPB level. This help in determination of harmful elements like Arsenic , lead , cadmium which carry in fruits and harmful to human and animal consumption. </p>
                                        <h3 class="con-ttile">Fortified Fertilizers and 100 % water soluble complex fertilizers </h3>
                                        <p class="mb-2">Fortified fertilizers are straight and Complex fertilizers which fortified with various micronutrients like Zn, B. Water soluble fertilizers are soluble in water and their application is different on plants, and yield better results. MSK with their highly qualified and experience team help in ascertaining all parameters which are important and controlled by legislation. </p>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>