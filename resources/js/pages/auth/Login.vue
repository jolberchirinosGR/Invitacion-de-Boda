<template>
          <div id="about" class="about-box text-center">
            <div class="about-a1">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <!-- Música -->
                      <audio controls="" autoplay="" class="mb-3">
                        <!-- <source src="extras/MiBendicion.mp3" type="audio/mpeg"> -->
                      </audio>
        
                      <!-- Jolber & Javianny -->
                      <img class="img-fluid rounded" src="logo.png" alt="" />
                      <br>

                      <div class="col-lg-12">
                        <div class="title-box">
                          <h2 style="font-size: 45px; margin-top: 20px;">
                              <strong>          
                                ¡Nos casamos!
                              </strong>
                            </h2>
                            <p style="font-size: 20px; color: gray;"> Nuestro amor ha escrito un nuevo capítulo y queremos que tú formes parte de nuestra historia Y que así compartas con nosotros uno de los momentos más importantes de nuestras vidas.</p>
                        </div>
                      </div>
                      
                      <!-- Gif de copitas -->
                      <img style="width: 50%;" src="extras/cups.gif">
                      <br>
                      <br>
        
                      <!--  Día del evento -->
                      <img class="img-fluid" src="extras/fecha.svg" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <!--  Cuanto regresiva -->
          <div id="countdown" class="text-center">
            <div class="countdown-box">
              <div class="countdown-item">
                <span class="countdown-number">{{ days }}</span>
                <span class="countdown-label">Días</span>
              </div>
              <div class="countdown-item">
                <span class="countdown-number">{{ hours }}</span>
                <span class="countdown-label">Horas</span>
              </div>
              <div class="countdown-item">
                <span class="countdown-number">{{ minutes }}</span>
                <span class="countdown-label">Minutos</span>
              </div>
              <div class="countdown-item">
                <span class="countdown-number">{{ seconds }}</span>
                <span class="countdown-label">Segundos</span>
              </div>
            </div>
          </div>
  
          <!-- Start Gallery -->
          <div id="gallery" class="gallery-box">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                      <h2 style="font-size: 45px;">
                        <i class="fas fa-photo-video"></i>                
                        <strong>          
                          Galeria
                        </strong>
                      </h2>
                      <p style="font-size: 20px; color: gray;"> Algunos de nuestro recuerdos antes de llegar a este gran día. </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <ul class="popup-gallery clearfix">
                  <li>
                    <a href="extras/gallery-01.jpg">
                      <img class="img-fluid" src="extras/gallery-01.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-02.jpg">
                      <img class="img-fluid" src="extras/gallery-02.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-03.jpg">
                      <img class="img-fluid" src="extras/gallery-03.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-04.jpg">
                      <img class="img-fluid" src="extras/gallery-04.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-05.jpg">
                      <img class="img-fluid" src="extras/gallery-05.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-06.jpg">
                      <img class="img-fluid" src="extras/gallery-06.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-07.jpg">
                      <img class="img-fluid" src="extras/gallery-07.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li>
                    <a href="extras/gallery-08.jpg">
                      <img class="img-fluid" src="extras/gallery-08.jpg" alt="single image">
                      <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <div class="submit-button text-center">
                  <button @click="uploadImages" class="btn btn-secondary" style="background-color: goldenrod; border: none; border-radius: 50px; font-size: 20px;">
                    <strong>
                      Comparte tus fotos con nosotros.
                      <i class="fas fa-camera-retro"></i>                    
                    </strong>
                  </button>
                </div>
              </div>

            </div>
          </div>
          <!-- End Gallery -->
  
          <!-- Inicio Eventos -->
          <div id="events" class="events-box">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                      <h2 style="font-size: 45px;">
                        <i class="fas fa-church"></i>   
                        <strong>          
                          Día del evento
                        </strong>
                      </h2>
                      <p style="font-size: 20px; color: gray;"> 
                        ¡Aquí encontrarás detalles importantes para el día del evento! Desde la ubicación hasta la vestimenta y otros aspectos esenciales que asegurarán una experiencia inolvidable para todos.
                      </p>
                  </div>
                </div>
              </div>
        
              <div class="row">
                <!-- Ubicacion del evento -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="event-inner" style="background-color: white;">
                    <div class="event-img">
                      <img class="img-fluid" src="extras/address.png" alt="" />
                    </div>
                    <h2>
                      <i class="fas fa-map-marker-alt"></i>  
                      <strong>           
                        Ubicación del evento
                      </strong>            
                    </h2>
                    <p>Este sitio ha sido elegido especialmente para compartir este hermoso momento con ustedes. Se encuentra ubicado en 3J6M+5HH, Av. La Salle, Barquisimeto 3001, Lara, Venezuela.</p>
                    <a  style="border: none; border-radius: 50px;"  href="https://maps.app.goo.gl/eTadwyrDFfQL7FyJA">
                      Ir a la dirección 
                      <i class="fas fa-arrow-right"></i>            
                    </a>
                  </div>
                </div>
                <!-- Fin Ubicacion del evento -->
        
                <!-- Vestimenta del evento -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="event-inner" style="background-color: white;">
                    <div class="event-img">
                      <img class="img-fluid" src="extras/vestimentas.jpg" alt="" />
                    </div>
                    <h2>
                      <i class="fas fa-tshirt"></i>   
                      <strong>           
                        Vestimenta
                      </strong>
                    </h2>
                    <p>Estamos encantados compartir con ustedes un día lleno de amor en nuestra boda. Para que se sientan cómodos, les sugerimos vestir <strong>"SEMIFORMAL"</strong>, 
                      Queremos que luzcan elegantes, decorosos, comodos y a la vez que no sea una limitante para esta con nosotros.</p>
        
                    <p>Les pedimos por favor que consideren la importancia de vestir de manera apropiada para esta ocasión tan especial, Mantengamos el estilo y la elegancia, ¡sin necesidad de mostrar más de lo necesario! </p>
        
                    <p>Tienes una paleta de colores para escoger tu mejor outfit, pero hemos excluido el color <strong>"Blanco"</strong> ya que es reservado para la novia.</p>
        
                    <i class="fas fa-circle" style="color: white; font-size: 50px; border: 1px solid black; border-radius: 50px;"></i>
                    <i class="fas fa-ban" style="color: red; font-size: 50px;"></i>
                  </div>
                </div>
                <!-- Fin Vestimenta del evento -->
        
                <!-- Niños en el evento -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="event-inner" style="background-color: white;">
                    <div class="event-img">
                      <img class="img-fluid" src="extras/kids.png" alt="" />
                    </div>
                    <h2>
                      <i class="fas fa-child"></i>       
                      <strong>           
                        Niños
                      </strong>
                    </h2>
                    <p>
                      <strong>¡Prepárense para una noche Épica!</strong>
                      Este evento está pensado para adultos, por lo que les pedimos amablemente que hagan los arreglos necesarios para dejar a los niños en casa. Queremos que todos disfruten de esta noche especial sin ninguna restricción. 
                      <i class="fas fa-baby" style="font-size: 20px;"></i>       
                      <i class="fas fa-home" style="font-size: 20px;"></i>
                    </p>
                  </div>
                </div>
                <!-- Fin Niños en el evento -->
        
                <!-- Regalos -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="event-inner" style="background-color: white;">
                    <div class="event-img">
                      <img class="img-fluid" src="extras/gitf.png" alt="" />
                    </div>
                    <h2>
                      <i class="fas fa-gifts"></i>              
                      <strong>           
                        Recuerdos, no Regalos
                      </strong>
                    </h2>
                    <p>Estamos encantados de compartir un día lleno de amor en nuestra boda contigo. Queremos enfocarnos en el placer de tu compañía y los preciosos recuerdos que crearemos juntos. Por ello, te pedimos gentilmente que en lugar de regalos, nos acompañes con tu calidez y alegría.</p>
                    <p>Valoramos tu presencia más que cualquier obsequio material. Si deseas expresar tu cariño de alguna manera, sugerimos una carta, una foto o cualquier otro detalle que represente nuestra amistad y la conexión que compartimos.</p>
                    <i class="fas fa-gifts" style="font-size: 50px;"></i>
                    <i class="fas fa-ban" style="color: red; font-size: 50px;"></i>
                  </div>
                </div>
                <!-- Fin de regalos -->
        
              </div>
            </div>
          </div>
          <!-- Fin dia del evento -->
  
            <!-- Asistencia -->
          <div id="contact" class="contact-box">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="title-box">
                  <h2 style="font-size: 45px;">
                    <img class="img-fluid rounded" style="width: 20%;" src="extras/calendar.png" alt="" />
                    <strong>
                      Asistencia
                    </strong>
                  </h2>
                          </div>
                      </div>
                  </div>
      
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="row align-items-center about-main-info">
                        <div class="col-lg-8 col-md-6 col-sm-12">
                          <strong class="text-center">
                            <p>Este momento es invaluable para nosotros y queremos celebrarlo de manera significativa, honrando a cada uno de ustedes.</p>
                            <p>Aunque nos encantaría tenerlos a todos aquí, circunstancias nos llevan a una boda más íntima. Su presencia significa el mundo para nosotros.</p>
                            <p>Al hacer clic abajo, nuestros invitados confirmarán su asistencia. Estamos emocionados de compartir este día especial de forma personal.</p>
                            <br>
                            <p>Apreciamos su comprensión y apoyo. Esta decisión no disminuye su importancia en nuestras vidas.</p>
                          </strong>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <div class="col-md-12" style="margin-bottom: 20px;">
                    <div class="submit-button text-center">
                      <button @click="openModal" class="btn btn-secondary" style="background-color: goldenrod; border: none; border-radius: 50px; font-size: 20px;">
                        <strong>
                          Confirmar asistencia
                          <i class="fas fa-check"></i>
                        </strong>
                      </button>
                    </div>
                  </div>
              </div>
          </div>
          <!-- End Contact -->
    
          <!-- Start Footer -->
          <footer class="footer-box">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <p class="footer-company-name">Todos los derechos reservados &copy; 2024, Diseñado por: <a href="https://www.linkedin.com/in/jolber-chirinos18">Jolber Chirinos</a></p>
                </div>
              </div>
            </div>
          </footer>
          <!-- End Footer -->

      <!-- Modal de edicion y creacion de Carpeta -->
      <div class="modal fade" id="folderModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="margin-top: 15%;">
          <div class="modal-dialog d-flex align-items-center" role="document">
              <div class="modal-content">
                  <div class="container py-5 h-100">
                      <div class="d-flex justify-content-center align-items-center h-100">
                          <div class="user_card">
                              <div class="d-flex justify-content-center">
                                  <div class="brand_logo_container">
                                      <img src="logo.png" class="brand_logo" alt="Logo">
                                  </div>
                              </div>
                              <div class="d-flex justify-content-center form_container">
                                  <form @submit.prevent="handleSubmit">
                                      <h5 class="login-box-msg"><strong>Inicia con tus credenciales...</strong></h5>
                                      <div v-if="errorMessage" class="alert alert-danger" role="alert">
                                          {{ errorMessage }}
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-append">
                                              <span class="input-group-text"><i class="fas fa-at"></i></span>
                                          </div>
                                          <input v-model="form.email" type="email" class="form-control" placeholder="Correo">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-append">
                                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                          </div>
                                          <input v-model="form.password" type="password" class="form-control" placeholder="*********">
                                      </div>
                                      <div class="text-center pt-1 mb-5 pb-1">
                                          <button type="submit" class="btn login_btn" :disabled="loading">
                                              <div v-if="loading" class="spinner-border spinner-border-sm" role="status">
                                                  <span class="sr-only">Cargando...</span>
                                              </div>
                                              <span v-else class="fas fa-sign-in-alt"></span> Iniciar
                                          </button>

                                          <br>
                                          <br>

                                          <button class="btn btn-secondary" data-dismiss="modal">
                                              <i class="fas fa-times"></i> Salir
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthUserStore } from '../../stores/AuthUserStore';
import { useToastr } from '../../toastr.js';

export default {
    setup() {
        const toastr = useToastr();
        const authUserStore = useAuthUserStore();
        const router = useRouter();
        const form = ref({
            email: '',
            password: '',
        });

        const loading = ref(false);
        const errorMessage = ref('');

        const handleSubmit = () => {
            loading.value = true;
            errorMessage.value = '';
            axios.post('/login', form.value)
                .then(() => {
                    $('#folderModal').modal('hide');
                    router.push('/');
                })
                .catch((error) => {
                    errorMessage.value = error.response.data.message;
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        return {
            form,
            loading,
            errorMessage,
            handleSubmit,
        };
    },
    data() {
      return {
        days: '',
        hours: '',
        minutes: '',
        seconds: '',
        final: '',
      };
    },
    mounted() {
      setInterval(() => {
        this.startCountdown();
      }, 1000);
    },
    methods: {
        startCountdown() {
        var countDownDate = new Date("Aug 8, 2024 17:00:00").getTime();

          var now = new Date().getTime();
          var distance = countDownDate - now;

          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          this.days = days;
          this.hours = hours;
          this.minutes = minutes;
          this.seconds = seconds;

          if (distance < 0) {
            clearInterval(x);
            this.days = 0;
            this.hours = 0;
            this.minutes = 0;
          }
      },
      openModal(){
        console.log('confirmar mi asistencia');
      },
      uploadImages(){
        $('#folderModal').modal('show');

      }
    }
}
</script>

<style>
    @import url(../../../../public/extras/responsive.css);
    @import url(../../../../public/extras/style.css);

    #countdown {
        padding: 0; /* Reducir el padding para que los elementos se ajusten mejor */
    }

    .countdown-box {
        display: flex;
        justify-content: center;
        align-items: center; /* Alinear los elementos verticalmente */
    }

    .countdown-item {
        margin: 0 5px; /* Reducir el margen entre los elementos */
        width: 80px; /* Establecer un ancho fijo para cada elemento */
        padding: 10px 0; /* Ajustar el padding vertical */
        text-align: center; /* Centrar el texto dentro de los elementos */
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .countdown-number {
        font-size: 24px; /* Reducir el tamaño de la fuente para que quepan todos los números */
        font-weight: bold;
        color: #333333;
    }

    .countdown-label {
        font-size: 12px; /* Reducir el tamaño de la etiqueta */
        color: #666666;
    }

    .countdown-item {
        transition: all 0.3s ease; /* Transición de 0.3 segundos con un efecto suave */
    }
    
    .user_card {
    	height: 450px;
    	width: 350px;
    	margin-top: auto;
    	margin-bottom: auto;
      background: goldenrod; /* Azul oscuro */
    	position: relative;
    	display: flex;
    	justify-content: center;
    	flex-direction: column;
    	padding: 10px;
    	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    	-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    	-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    	border-radius: 5px;

    }
    .brand_logo_container {
    	position: absolute;
    	height: 170px;
    	width: 170px;
    	top: -75px;
    	border-radius: 50%;
        background: rgba(255, 255, 255, 0.9); /* Blanco */
    	padding: 10px;
    	text-align: center;
    }
    .brand_logo {
    	height: 150px;
    	width: 150px;
    	border-radius: 50%;
        border: none; /* Elimina el borde alrededor del logo */
    }
    .form_container {
    	margin-top: 100px;
    }
    .login_btn {
    	width: 100%;
      background: #ffffff !important; /* Azul oscuro */
    	color: goldenrod !important;
    }
    .login_btn:focus {
    	box-shadow: none !important;
    	outline: 0px !important;
    }
    .login_container {
    	padding: 0 2rem;
    }
    .input-group-text {
      background: #b69d12 !important; /* Azul oscuro */
    	color: white !important;
    	border: 0 !important;
    	border-radius: 0.25rem 0 0 0.25rem !important;
    }
    .input_user,
    .input_pass:focus {
    	box-shadow: none !important;
    	outline: 0px !important;
    }
</style>