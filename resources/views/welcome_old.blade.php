@extends('layouts.app_web')
@section('content')
         <!-- Start Banner -->
         <div class="ulockd-home-slider">
            <div class="container-fluid">
               <div class="row">
                  <div class="pogoSlider" id="js-main-slider">

                     <div class="pogoSlider-slide" style="background-image:url(dm/images/banner_02.jpg);">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="slide_text">
                                    <br><br><br>
                                    <h3 style="color: #fff">#OTB 2023</h3>
                                    <h6 style="color: #262e41">¡Ya estamos aqui!</h6>
                                    <br>
                                    <a class="readmore_bt" href="about.html">Leer mas</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="pogoSlider-slide" style="background-image:url(dm/images/banner_01.jpg);">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="slide_text">
                                    <h6>Servicios de mensajería y envíos</h6>
                                    <h4>#EstamosOnTime</h4>
                                    <h6 style="color: #fff">Entregas Express</h6>
                                    <br>
                                    <a class="readmore_bt" href="about.html">Leer mas</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="pogoSlider-slide" style="background-image:url(dm/images/banner_03.jpg);">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="slide_text">

                                    <a class="readmore_bt" href="about.html">Leer mas</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  <!-- .pogoSlider -->
               </div>
            </div>
         </div>
         <!-- End Banner -->
         <!-- section -->
         <div class="section dark_blue_layout white_fonts layout_padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-lg-4">
                     <div class="full">
                        <div class="heading_main text_align_left" style="margin-bottom: 0;">
                           <h2><strong class="small">Ingresa tu número de rastreo</strong><br>#TRK</h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-8">
                     <div class="full">
                         <div class="form_section">
                            <form class="news_submit_form" action="{{ route('trackingcontrol.search-trk') }}">
                              <fieldset>
                                 <div class="field">
                                    <input type="text" placeholder="Número" name="tracking-number" required />
                                    <button>Buscar</button>
                                 </div>
                              </fieldset>
                            </form>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end section -->

         <!-- section -->
         <div class="section  layout_padding" style="background-color:#dbdce1">
            <div class="container">
               <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                     <h2 class="display-4">AVISO</h2>
                     <p>Estimados Clientes, de conformidad con la <strong>Tercera Resolución de Modificaciones a la Miscelánea Fiscal para 2021</strong>, publicada el día <strong>18 de noviembre de 2021 en el Diario Oficial de la Federación, a partir del próximo 1º de diciembre de 2021 entrará en vigor el uso obligatorio del Complemento Carta Porte (CCP).</strong> </p>

                     <p>En estricto cumplimiento de estas disposiciones fiscales, el CFDI de tipo ingreso se debe generar antes de iniciar el traslado de mercancía y la facturación debe ser diaria. </p>

                     <p><strong>La emisión del CFDI de tipo ingreso y su Complemento Carta Porte amparan la prestación de estos servicios</strong> y acreditan el transporte y la legal tenencia de los bienes o mercancías. </p>

                     <p><strong>La finalidad de OntimeBox es cumplir con lo que establecen los artículos 29 último párrafo, 29-A del Código Fiscal de la Federación</strong>, y con esto no poner en riesgo la deducción o el acreditamiento correspondiente para el contribuyente que recibe el servicio prestado. </p>
                     <a class="btn btn-info float-right" href="/carta-porte">Leer mas...</a>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                     <div class="full text_align_center">
                        <img class="img-responsive" style="margin-left: auto; margin-right: auto; display: block;" src="dm/images/web_02.jpg" alt="#" />
                      </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end section -->

         <!-- section -->
         <div class="section about_section layout_padding dash_bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center">
                           <h2>Lo mas rápido y seguro.</h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                     <div class="full feature_box">
                         <div class="full icon">
                            <img class="default-block" src="dm/images/icon_1.png" alt="#" />
                            <img class="default-none" src="dm/images/icon_1w.png" alt="#" />
                         </div>
                         <div class="full">
                            <h4>Obejtivo</h4>
                         </div>
                         <div class="full">
                           <p>Dentro de nuestro sistema de trabajo no buscamos clientes, buscamos socios con un objetivo en común, para nosotros el poder cumplir es satisfacción personal y laboral, dentro de esta satisfacción queda la atención, disposición, compromiso, responsabilidad, honestidad  y solución de problemas.</p>
                         </div>
                     </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                     <div class="full feature_box">
                         <div class="full icon">
                            <img class="default-block" src="dm/images/icon_2.png" alt="#" />
                            <img class="default-none" src="dm/images/icon_2w.png" alt="#" />
                         </div>
                         <div class="full">
                            <h4>Misión</h4>
                         </div>
                         <div class="full">
                           <p>Con base a esfuerzo y dedicación tenemos el compromiso de servir, guiar y concluir satisfaciendo las necesidades de cada uno de nuestros clientes.</p>
                         </div>
                     </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                     <div class="full feature_box">
                         <div class="full icon">
                            <img class="default-block" src="dm/images/icon_3.png" alt="#" />
                            <img class="default-none" src="dm/images/icon_3w.png" alt="#" />
                         </div>
                         <div class="full">
                            <h4>Visión</h4>
                         </div>
                         <div class="full">
                           <p>Convertirnos en una empresa dónde el reconocimiento sea el de la gente, que cada persona este convencida que somos su mejor opción en la entrega de paquetería y mensajería, para que esto nos permita extender nuestro servicio a lugares que otros no llegan.</p>
                         </div>
                     </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                     <div class="full feature_box">
                         <div class="full icon">
                            <img class="default-block" src="dm/images/icon_4.png" alt="#" />
                            <img class="default-none" src="dm/images/icon_4w.png" alt="#" />
                         </div>
                         <div class="full">
                            <h4>Tu mejor opción</h4>
                         </div>
                         <div class="full">
                           <p>Tu carga, en las mejores manos. El manejo adecuado y cuidadoso nos preocupa tanto como a ti.</p>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end section -->
         <!-- section -->
         <div class="section about_section layout_padding padding_top_0">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center">
                           <h2 class="margin-bottom_30"><strong class="small theme_color">Incrementa tus cliente</strong><br>MEJOR POSICIÓN DE NEGOCIOS</h2>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                     <div class="full">
                        <div class="heading_small">
                          <h4>Conócenos</h4>
                        </div>
                        <p>¿Quién dice que no puedes llegar más lejos? Crecer es la meta de tu empresa o negocio, ¡crece con nosotros! Tenemos la solución en logística ideal para tus necesidades, con las mejores opciones de comodidad, seguridad y tecnología. Comprueba nuestros 5 años de experiencia.</p>
                      </div>
                      <div class="full margin-top_30">
                        <a class="readmore_bt" href="about.html">Leer mas</a>
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                     <div class="full text_align_center">
                        <img class="img-responsive" src="dm/images/f1.png" alt="#" />
                      </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end section -->
         <!-- section -->
         <div class="section about_section layout_padding padding_top_0">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center margin-bottom_30">
                           <h2><strong class="small theme_color">Servicios </strong><br>Empresariales</h2>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-10 offset-lg-1">
                     <div class="full text_align_center">
                         <p>Servicios entre la Ciudad de México y Puebla.</p>
                         <p>Integra tecnología de vanguardia, eficiencia y rapidez en tu logística de comercio. Somos tu aliado estratégico y tenemos el esquema ideal para tu pequeña o mediana empresa. ¡Compruébalo ya y empieza a crecer!</p>
                     </div>
                  </div>
               </div>
               <!--
               <div class="row">
                  <div class="col-md-12">
                     <div class="full text_align_center">
                       <img class="img-responsive" src="dm/images/video_img.jpg" alt="#" />
                     </div>
                     <div class="full center">
                        <a class="readmore_bt" href="about.html">Leer mas</a>
                      </div>
                  </div>
               </div>
             -->
            </div>
         </div>
         <!-- end section -->

         <!-- section -->
         <div class="section about_section layout_padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center margin-bottom_30">
                           <h2><strong class="small theme_color">No somos los unicos </strong><br>pero si tu mejor opción</h2>
                        </div>
                     </div>
                  </div>
               </div>
              <div class="row">

                <div class="col-sm-6 col-md-3 col-lg-3">
                   <div class="work_blog margin-top_30">
                      <img class="img-responsive" src="dm/images/blog1.jpg" alt="#" />
                      <div class="hover_workblog">
                          <img src="dm/images/search_icon.png" alt="#" />
                      </div>
                   </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3">
                   <div class="work_blog margin-top_30">
                      <img class="img-responsive" src="dm/images/blog2.jpg" alt="#" />
                      <div class="hover_workblog">
                          <img src="dm/images/search_icon.png" alt="#" />
                      </div>
                   </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3">
                   <div class="work_blog margin-top_30">
                      <img class="img-responsive" src="dm/images/blog3.jpg" alt="#" />
                      <div class="hover_workblog">
                          <img src="dm/images/search_icon.png" alt="#" />
                      </div>
                   </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3">
                   <div class="work_blog margin-top_30">
                      <img class="img-responsive" src="dm/images/blog4.jpg" alt="#" />
                      <div class="hover_workblog">
                          <img src="dm/images/search_icon.png" alt="#" />
                      </div>
                   </div>
                </div>

              </div>
            </div>
         </div>
         <!-- end section -->
         <!-- section -->
         <div class="section about_section layout_padding padding_top_0">
            <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center margin-bottom_30">
                           <h2>Mas cerca de ti</h2>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         <!-- section -->
         <!--
         <div class="section contact_section">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 theme_color_bg fc3726 padding_0">
                     <div class="full">
                        <div class="row">
                           <div class="col-sm-12 col-md-10 offset-lg-1">
                              <div class="full contact_form">
                                 <form class="contact_form_inner" action="#">
                                    <fieldset>
                                       <div class="field">
                                          <input type="text" name="name" placeholder="Your name" />
                                       </div>
                                       <div class="field">
                                          <input type="email" name="email" placeholder="Email" />
                                       </div>
                                       <div class="field">
                                          <input type="text" name="phone_no" placeholder="Phone number" />
                                       </div>
                                       <div class="field">
                                          <textarea placeholder="Message"></textarea>
                                       </div>
                                       <div class="field center">
                                          <button class="margin-top_30">SEND</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 padding_0">
                     <div class="full">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="full map_section">
                                 <div id="map">
                                    <div id="googleMap" style="width:100%;height:440px;"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>-->
         <!-- end section -->
@endsection