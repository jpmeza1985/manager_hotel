<?php
require_once "vistas/parte_superior.php";
?>

<!--INICIO del cont principal-->

<div class="grey-bg container-fluid">
                      <section id="minimal-statistics">

                        <div class="row">
                          <div class="col-12 mt-3 mb-1">
                            <h5 class="text">Dashboard Opera <?php echo $dia ?></h5>
                            <h6 class="text">Manager Flash:</h6>
                            <p> </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-9">
                                      <div class="row">
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon purple">
                                                                  <i class="fas fa-bed fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Habitaciones Ocupadas</h6>
                                                              <h6 class="font-extrabold mb-0">
                                                                <?php
                                                                $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Rooms Occupied'");
                                                                while ($roomocc = mysqli_fetch_array($query)) {
                                                                  echo $roomocc['dia'];
                                                                }
                                                                  ?>
                                            </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon blue">
                                                                  <i class="fas fa-door-open fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Habitaciones Disponibles</h6>
                                                              <h6 class="font-extrabold mb-0">
                                                                <?php
                                                                $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Available Rooms'");
                                                                while ($availroom = mysqli_fetch_array($query)) {
                                                                  echo $availroom['dia'];
                                                                }
                                                                  ?>

                                                                </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon green">
                                                                  <i class="fas fa-percentage fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">% ocupación en Hotel</h6>
                                                              <h6 class="font-extrabold mb-0">
                                                                <?php
                                                                $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= '% Rooms Occupied'");
                                                                while ($roomperc = mysqli_fetch_array($query)) {
                                                                  echo $roomperc['dia'];
                                                                }
                                                                  ?>
                                                                </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon green">
                                                                  <i class="fas fa-percentage fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">% Occ minus Comp & House</h6>
                                                              <h6 class="font-extrabold mb-0">
                                                                <?php
                                                                $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= '% Rooms Occupied minus Comp and House'");
                                                                while ($roccmch = mysqli_fetch_array($query)) {
                                                                  echo $roccmch['dia'];
                                                                }
                                                                  ?>
                                            </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                        </div>

                                      <div class="row">

                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon green">
                                                                <i class="fas fa-donate fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Tarifa <br> Promedio</h6>
                                                            <h6 class="font-extrabold mb-0">
                                                              <?php
                                                              $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'ADR'");
                                                              while ($ADR = mysqli_fetch_array($query)) {
                                                                echo "$ ";
                                                                echo $ADR['dia'];
                                                              }
                                                                ?>
                                          </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon green">
                                                                <i class="fas fa-donate fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Room <br> Revenue</h6>
                                                            <h6 class="font-extrabold mb-0">
                                                              <?php
                                                              $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Room Revenue'");
                                                              while ($roomrev = mysqli_fetch_array($query)) {
                                                                echo "$ ";
                                                                echo $roomrev['dia'];
                                                              }
                                                                ?>
                                          </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon green">
                                                                <i class="fas fa-utensils fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Food And Bev Revenue</h6>
                                                            <h6 class="font-extrabold mb-0">
                                                              <?php
                                                              $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Food And Beverage Revenue'");
                                                              while ($fbrev = mysqli_fetch_array($query)) {
                                                                echo "$ ";
                                                                echo $fbrev['dia'];
                                                              }
                                                                ?>
                                          </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="card">
                                                <div class="card-body px-3 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="stats-icon green">
                                                                <i class="fas fa-donate fa-2x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="text-muted font-semibold">Other <br> Revenue</h6>
                                                            <h6 class="font-extrabold mb-0">
                                                              <?php
                                                              $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Other Revenue'");
                                                              while ($orev = mysqli_fetch_array($query)) {
                                                                echo "$ ";
                                                                echo $orev['dia'];
                                                              }
                                                                ?>
                                          </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">

                                      <div class="col-6 col-lg-3 col-md-6">
                                          <div class="card">
                                              <div class="card-body px-3 py-4-5">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                          <div class="stats-icon green">
                                                              <i class="fas fa-donate fa-2x"></i>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                          <h6 class="text-muted font-semibold">Revenue per Avail Room</h6>
                                                          <h6 class="font-extrabold mb-0">
                                                            <?php
                                                            $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Revenue per Available Room'");
                                                            while ($revpar = mysqli_fetch_array($query)) {
                                                              echo "$ ";
                                                              echo $revpar['dia'];
                                                            }
                                                              ?>
                                        </h6>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-6 col-lg-3 col-md-6">
                                          <div class="card">
                                              <div class="card-body px-3 py-4-5">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                          <div class="stats-icon green">
                                                              <i class="fas fa-user-tie fa-2x"></i>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                          <h6 class="text-muted font-semibold">VIP Persons In-House</h6>
                                                          <h6 class="font-extrabold mb-0">
                                                            <?php
                                                            $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'VIP Persons In-House'");
                                                            while ($vip = mysqli_fetch_array($query)) {
                                                              echo $vip['dia'];
                                                            }
                                                              ?>
                                                            </h6>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>




                                    </div>


</div>

</div>

<div class="row">
  <div class="col-12 mt-3 mb-1">
    <h6 class="text">Llegadas y Salidas <?php echo $dia ?>:</h6>
    <p> </p>
  </div>
</div>

<div class="row">
  <div class="col-12 col-lg-9">
              <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body px-3 py-4-5">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="stats-icon purple">
                                          <i class="fas fa-plane-arrival fa-2x"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <h6 class="text-muted font-semibold">Llegadas (Habitaciones)</h6>
                                      <h6 class="font-extrabold mb-0">
                                        <?php
                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Arrival Rooms'");
                                        while ($arrivals = mysqli_fetch_array($query)) {
                                          echo $arrivals['dia'];
                                        }
                                          ?>
                    </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body px-3 py-4-5">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="stats-icon blue">
                                          <i class="fas fa-plane-departure fa-2x"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <h6 class="text-muted font-semibold">Salidas (Habitaciones)</h6>
                                      <h6 class="font-extrabold mb-0">
                                        <?php
                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Departure Rooms'");
                                        while ($departures = mysqli_fetch_array($query)) {
                                          echo $departures['dia'];
                                        }
                                          ?>
                                        </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
  </div>
</div>

<div class="row">
  <div class="col-12 mt-3 mb-1">
    <h6 class="text">Acumulado Mensual:</h6>
    <p> </p>
  </div>
</div>

<div class="row">
  <div class="col-12 col-lg-9">
              <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body px-3 py-4-5">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="stats-icon purple">
                                          <i class="fas fa-hand-holding-usd fa-2x"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <h6 class="text-muted font-semibold">Revenue acumulado</h6>
                                      <h6 class="font-extrabold mb-0">
                                        <?php
                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Room Revenue'");
                                        while ($revmes = mysqli_fetch_array($query)) {
                                          echo "$ ";
                                          echo $revmes['mes'];
                                        }
                                          ?>
                    </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body px-3 py-4-5">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="stats-icon blue">
                                          <i class="fas fa-utensils fa-2x"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <h6 class="text-muted font-semibold">F&B acumulado</h6>
                                      <h6 class="font-extrabold mb-0">
                                        <?php
                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Food And Beverage Revenue'");
                                        while ($fbmes = mysqli_fetch_array($query)) {
                                          echo "$ ";
                                          echo $fbmes['mes'];
                                        }
                                          ?>
                                        </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body px-3 py-4-5">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="stats-icon blue">
                                          <i class="fas fa-balance-scale fa-2x"></i>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <h6 class="text-muted font-semibold">Total <br> Revenue</h6>
                                      <h6 class="font-extrabold mb-0">
                                        <?php
                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Total Revenue'");
                                        while ($totmes = mysqli_fetch_array($query)) {
                                          echo "$ ";
                                          echo $totmes['mes'];
                                        }
                                          ?>
                                        </h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
  </div>
</div>







  </section>


<div class="row">




</div>





<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
