<template>
  <div id="about" class="about-box text-center">
    <div class="about-a1">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="title-box">
              <!-- Música -->
              <audio controls="" autoplay="" class="mb-3">
                <source src="extras/MiBendicion.mp3" type="audio/mpeg">
              </audio>

              <!-- Jolber & Javianny -->
              <img class="img-fluid rounded" src="logo.png" alt="" style="animation: heartbeat 3.5s infinite;"/>    
              <br>

              <div class="col-lg-12">
                <div class="title-box">
                  <h2 style="font-size: 55px; margin-top: 20px;">
                      <strong>          
                        ¡Nos casamos!
                      </strong>
                    </h2>
                    <p style="font-size: 20px; color: gray;"> Nuestro amor ha escrito un nuevo capítulo y queremos que tú formes parte de nuestra historia y que así compartas con nosotros uno de los momentos más importantes de nuestras vidas.</p>
                </div>
              </div>
              
              <!-- Gif de copitas -->
              <img style="width: 50%; margin-bottom: 10%;" src="extras/cups.gif">        

              <!--  Día del evento -->
              <img class="img-fluid" src="extras/fecha.svg"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  Cuanto regresiva -->
  <div id="countdown" class="text-center">
    <h2 style="font-size: 45px; margin-top: 20px;">
      <strong>   
        ¡Faltan tan solo!
      </strong>
    </h2>

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

    <br>

    <p style="font-size: 20px; color: gray; padding: 10px;"> Nuestro evento comenzará puntualmente a las <strong>5:30 p.m.</strong> Queremos que disfrutes cada momento con nosotros, desde el inicio hasta el final a las  <strong>12:00 a.m.</strong> 
      Por favor, asegúrate de tomar las precauciones necesarias para garantizar un regreso seguro a casa después de la celebración..</p>
  </div>
  <!-- Fin de la cuenta regresiva y recalcar -->

  <!-- Inicio de versiculo  -->
  <div class="container-fluid text-center" style="margin-top: 10%;">
    <div class="row">
      <div class="col-lg-12">
          <div class="title-box">

            <div class="row" style="padding: 5%;">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="event-inner" style="background-color: white;">
                  <h2 style="font-size: 30px;">
                    <strong>           
                      Mateo 19:5-6
                    </strong>   
                    <img class="img-fluid" src="extras/biblia.png" style="width: 18%;"/>         
                  </h2>
                  <p style="font-size: 20px;">
                    "Y dijo: Por tanto, el hombre dejará a su padre y a su madre, y ase unirá a su esposa, y los dos serán una sola carne?
                    <br>
                    Así que, no son ya más dos, sino una sola carne; por tanto, lo que Dios ha unido, no lo separe el hombre."
                  </p>
                </div>
              </div>
            </div>
            
          </div>
      </div>
    </div>
  </div>  
  <!-- Fin de versiculo -->


  <!-- Start Gallery -->
  <div id="gallery" class="gallery-box">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 style="font-size: 45px;">
            <img class="img-fluid" src="extras/imagen.png" style="width: 18%; transform: scaleX(-1);"/>
            <strong>          
              Galeria
            </strong>
          </h2>
          <p style="font-size: 20px; color: gray;"> Algunos de nuestro recuerdos antes de llegar a este gran día. </p>
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
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12">
          <h2 style="font-size: 50px;">
            <strong>  
              <img class="img-fluid" src="extras/iglesia.png" style="width: 25%; transform: scaleX(-1);"/>     
              Evento
            </strong>
          </h2>
          <p style="font-size: 20px; color: gray;"> 
            ¡Aquí encontrarás detalles importantes para el día del evento! Desde la ubicación hasta la vestimenta y otros aspectos esenciales que asegurarán una experiencia inolvidable para todos.
          </p>
        </div>
      </div>

      <div class="row" style="padding: 5%;">

        <!-- Ubicacion del evento -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="event-inner" style="background-color: white;">
            <div class="event-img">
              <img class="img-fluid" src="extras/address.png" alt="" />
            </div>
            <h2>
              <strong>           
                Ubicación del evento
              </strong>            
            </h2>
            <p>Este sitio ha sido elegido especialmente para compartir este hermoso momento con ustedes. Se encuentra ubicado en 3J6M+5HH, Av. La Salle, Barquisimeto 3001, Lara, Venezuela.</p>
            <a href="https://maps.app.goo.gl/eTadwyrDFfQL7FyJA" style="border: none; border-radius: 50px;">
              Ir a la dirección 
              <i class="fas fa-map-marked-alt"></i>                   
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
              <strong>           
                Vestimenta
              </strong>
            </h2>
            <p>Estamos encantados compartir con ustedes un día lleno de amor en nuestra boda. Para que se sientan cómodos, les sugerimos vestir <strong>"SEMIFORMAL"</strong>, 
              Queremos que luzcan elegantes, decorosos, comodos y a la vez que no sea una limitante para esta con nosotros.</p>

            <p>Les pedimos por favor que consideren la importancia de vestir de manera apropiada para esta ocasión tan especial, Mantengamos el estilo y la elegancia, ¡sin necesidad de mostrar más de lo necesario! </p>

            <p>Tienes una paleta de colores para escoger tu mejor outfit, pero hemos excluido el color <strong>"Blanco"</strong> ya que es reservado para la novia.</p>

            <div style="border: none; border-radius: 50px;">
              <i class="fas fa-circle" style="color: white; font-size: 40px; border: 1px solid black; border-radius: 50px;"></i>
              <i class="fas fa-ban" style="color: red; font-size: 40px;"></i>
            </div>
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
              <strong>           
                Los pequeños de casa
              </strong>
            </h2>
            <p>
              <strong>¡Prepárense para una noche Épica!</strong>
              Este evento está pensado para adultos, por lo que les pedimos amablemente que hagan los arreglos necesarios para dejar a los niños en casa. Queremos que todos disfruten de esta noche especial sin ninguna restricción. 
            </p>

            <div style="border: none; border-radius: 50px;">
              <i class="fas fa-baby" style="font-size: 40px;"></i>       
              <i class="fas fa-home" style="font-size: 40px;"></i>
            </div>
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
              <strong>           
                Recuerdos, no Regalos
              </strong>
            </h2>
            <p>Estamos encantados de compartir un día lleno de amor en nuestra boda contigo. Queremos enfocarnos en el placer de tu compañía y los preciosos recuerdos que crearemos juntos. Por ello, te pedimos gentilmente que en lugar de regalos, nos acompañes con tu calidez y alegría.</p>
            <p>Valoramos tu presencia más que cualquier obsequio material. Si deseas expresar tu cariño de alguna manera, sugerimos una carta, una foto o cualquier otro detalle que represente nuestra amistad y la conexión que compartimos.</p>

            <div style="border: none; border-radius: 50px;">
              <i class="fas fa-gifts" style="font-size: 40px;"></i>
              <i class="fas fa-ban" style="color: red; font-size: 40px;"></i>
            </div>
          </div>
        </div>
        <!-- Fin de regalos -->

      </div>
    </div>
  </div>
  <!-- Fin dia del evento -->


  <!-- Inicio de la asistencia -->
  <div id="gallery" class="gallery-box">
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-lg-12">
          <h2 style="font-size: 45px;">
            <img @click="arrivalConfirmModal" class="img-fluid rounded" style="width: 20%;" src="extras/calendario.png" alt="" />
      
            <strong>          
              Asistencia
            </strong>
          </h2>

          <p style="font-size: 20px; color: gray;"> Este momento es invaluable para nosotros y queremos celebrarlo de manera significativa, aunque nos encantaría tenerlos a todos aquí, circunstancias nos llevan a una boda más íntima. </p>
          <p style="font-size: 20px; color: gray;"> Al hacer clic abajo, tendran buscador con nuestros invitados estos confirmarán su asistencia.</p>
          <br>
          <p style="font-size: 20px; color: gray;"> Apreciamos su comprensión y apoyo. Esta decisión no disminuye su importancia en nuestras vidas.</p>
        </div>
      </div>

      <div class="col-md-12" style="margin-top: 20px;">
        <div class="submit-button text-center">
          <button @click="attendanceConfirmModal" class="btn btn-secondary" style="background-color: goldenrod; border: none; border-radius: 50px; font-size: 20px;">
            <strong>
              Confirmar asistencia
              <i class="fas fa-check"></i>
            </strong>
          </button>
        </div>
      </div>

    </div>
  </div>
  <!-- Fin de asistencia -->

  <!-- Inicio de Contacto  -->
  <div id="gallery" class="gallery-box">
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-lg-12">
            <div class="title-box">
              <h2 style="font-size: 45px;">
                <strong>
                  ¡Esperamos poder contar contigo!
                </strong>
                <br>
                <img class="img-fluid" src="extras/baile.png" style="width: 25%; transform: scaleX(-1); animation: shake 2.5s infinite;"/>     
              </h2>
            </div>
        </div>
      </div>

      <p style="font-size: 20px; color: gray;"> ¿No apareces en el listado de invitados?, ¿Tienes alguna inquietud?, ¿Duda? o Sugerencia. Aqui tienes los contactos para que te puedas comunicar con nosotros.</p>

      <div class="col-md-12" style="margin-top: 20px;">
        <div class="submit-button text-center">
            <div class="col-md-6" style="margin-bottom: 20px;">
                <a href="https://wa.me/34622130388" class="btn" style="background-color: goldenrod; color: white; border-radius: 50px; font-size: 20px;">
                  <strong>
                    Jolber Chirinos
                    <img class="img-fluid" src="extras/novio.png" style="width: 10%;"/>
                  </strong>
                </a>
            </div>

            <div class="col-md-6" style="margin-bottom: 20px;">
                <a href="https://wa.me/584245827911" class="btn" style="background-color: goldenrod; color: white; border-radius: 50px; font-size: 20px;">
                  <strong>
                    Javianny Rojas
                    <img class="img-fluid" src="extras/novia.png" style="width: 10%;"/>
                  </strong>
                </a>
            </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Fin de contacto -->

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

  <!-- Modal -->
  <attendance-modals ref="attendanceModal"/>
</template>


<script>
import { useRouter } from 'vue-router';
import AttendanceModals from './attendance/AttendanceModals.vue';

export default {
    components: {
      AttendanceModals,
    },
    setup() {
        const router = useRouter();

        const uploadImages = () => {
            router.push('/fotos');
        };

        return {
            uploadImages,
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
        var countDownDate = new Date("Aug 8, 2024 17:30:00").getTime();

          // var now = new Date().getTime();
          var now = new Date().toLocaleString("en-US", { timeZone: "America/Caracas" });
          var nowInVenezuela = new Date(now).getTime();

          var distance = countDownDate - nowInVenezuela;

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

      // Método para abrir el modal de asistencia
      attendanceConfirmModal() {
        this.$refs.attendanceModal.openFormModal(null);
      },

      // Método la llegada de los invitados
      arrivalConfirmModal() {
        this.$refs.attendanceModal.openArrivalModal(null);
      },

    }
}
</script>

<style>
    @import url(../../../public/extras/responsive.css);
    @import url(../../../public/extras/style.css);

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

    @keyframes shake {
        0%, 100% { transform: translate(0, 0) rotate(0); }
        25% { transform: translate(-2px, -2px) rotate(-2deg); }
        50% { transform: translate(2px, 2px) rotate(2deg); }
        75% { transform: translate(-2px, -2px) rotate(-2deg); }
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }
        25% {
            transform: scale(1.1);
        }
        50% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }
</style>