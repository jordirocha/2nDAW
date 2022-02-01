<?php
echo <<<JRR
 <section class="py-5">
     <div class="container px-5">
         <div class="row gx-5 justify-content-center">
             <div class="col-lg-8 col-xl-6">
                 <div class="text-center">
                     <h2 class="fw-bolder  mb-5">Les Meves Dades</h2>
                     <!-- <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p> -->
                 </div>
             </div>
         </div>
         <div class="row gx-5">
             <div class="col-lg-4 mb-5">
                 <div class="card h-100 shadow border-0">
                     <img class="card-img-top" src="https://sportsbrowser.net/wp-content/uploads/2021/11/Meeri-Raisanen.jpeg" alt="...">
                     <div class="card-body p-4">
                     <div class="badge bg-danger bg-gradient rounded-pill mb-2">{$content->getDni()}</div>    
                     <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$content->getPosition()}</div>
                         <a class="text-decoration-none link-dark stretched-link" href="#!">
                             <h5 class="card-title mb-3">{$content->getPlayer()}</h5>
                         </a>
                         <p class="card-text mb-0">
                         Ciutat: {$content->getPlaceOfBirth()}<br>
                         Naixement: {$content->getBirthdate()}<br>
                         Equip técnic:
JRR;

if ($content->getTechnicalTeam() == 0) echo " No";
else echo " Sí";
echo <<<JRR
                          <br>
                         Pes: {$content->getWeigth()} kg<br>
                         Alçada: {$content->getHeigth()} cm<br>
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</section>
JRR;
