<?php
echo <<<JRR
 <section class="py-5">
     <div class="container px-5">
     <div class="row gx-5 justify-content-center">
     <div class="col-lg-8 col-xl-6">
         <div class="text-center">
             <h2 class="fw-bolder  mb-5">NHL Hockey Classificació</h2>
         </div>
      </div>
    </div>
     <table class="table table-hover table-dark table-striped caption-top" style="text-align: center;">
     <thead>
       <tr>
            <th scope="col">Posicio</th>
            <th scope="col">Equip</th>
            <th scope="col">Punts</th>
            <th scope="col">Partits jugats</th>
            <th scope="col">Victories</th>
            <th scope="col">Empats</th>
            <th scope="col">Derrotes</th>
            <th scope="col">Gols favor</th>
            <th scope="col">Gols contra</th>
            <th scope="col">Diferencia gols</th>
       </tr>
     </thead>
     <tbody>
JRR;
foreach ($content as $data) {
    echo <<<JRR
        <tr><td>{$data->getPosition()}</td>
        <td>{$data->getTeam()}</td>
        <td>{$data->getPoints()}</td>
        <td>{$data->getMatches()}</td>
        <td>{$data->getWins()}</td>
        <td>{$data->getDraws()}</td>
        <td>{$data->getLosses()}</td>
        <td>{$data->getGolsFor()}</td>
        <td>{$data->getGolsAgainst()}</td>
        <td>{$data->getGoalDifference()}</td>
        </tr>
        JRR;
}
echo <<<JRR
        </tbody>
    </table>
</div>
        </div>
    </section>
JRR;