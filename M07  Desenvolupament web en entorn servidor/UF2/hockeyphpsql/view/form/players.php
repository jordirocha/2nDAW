<?php
echo <<<JRR
 <section class="py-5">
     <div class="container px-5">
         <div class="row gx-5 justify-content-center">
             <div class="col-lg-8 col-xl-6">
                 <div class="text-center">
                     <h2 class="fw-bolder  mb-5">Minerva Roster</h2>
                 </div>
             </div>
         </div>
    <div class="row gx-5">
JRR;

foreach ($content as $player) {
    echo <<<JRR
    <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
            <img class="card-img-top" src="view/img/{$player->getAvatar()}" alt="...">
            <div class="card-body p-4">
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$player->getPosition()}</div>
                <a class="text-decoration-none link-dark stretched-link" href="#!">
                    <h5 class="card-title">{$player->getPlayer()}</h5>
                </a>
            </div>
        </div>
    </div>
    JRR;
}

echo <<<JRR
         </div>
     </div>
</section>
JRR;
