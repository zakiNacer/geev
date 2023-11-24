import React from 'react';
export default function Home(){
    return(

        <div class="col-md-10">
        <div class="row">
              <div class="col-md-4 ">
                 <h3>NB PARTICIPANT</h3>
                    <div class="card-header pb-0">
                      <h6>Orders overview</h6>
                      <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">24%</span> this month
                      </p>
                    </div>
              </div>
              <div class="col-md-4">
                  <h3>NB DONS</h3>
                      <div class="card-header pb-0">
                        <h6>Orders overview</h6>
                        <p class="text-sm">
                          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                          <span class="font-weight-bold">24%</span> this month
                        </p>
                      </div>    
              </div>
              <div class="col-md-4">
                  <h3>NB evenement</h3>
                      <div class="card-header pb-0">
                        <h6>Orders overview</h6>
                        <p class="text-sm">
                          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                          <span class="font-weight-bold">24%</span> this month
                        </p>
                      </div>
              </div>
        </div>
         <div>
             <p >donut visiteur[donateur, recpteur, noninteressé] </p>
              <div class="row">
                  <div class="col-md-6">
                      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                      <h5 class="bg-primary">charts</h5>
                  </div>
                  <div class="col-md-4">
                      <div id="example"></div>
                      <h5 class="bg-primary">charts</h5>
                  </div>
              </div> 
         </div>
         <div class="bg-primary">
            <p>progress circle</p>
         </div>
    </div>
    )
}