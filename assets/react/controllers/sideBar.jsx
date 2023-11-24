import React from 'react' 


export default function SideBar(){
    return(
        <div class="col-md-2">
            <input type="checkbox" id="check"/>
                <label for="check">
                    <i class="fa fa-bars" id="btn"></i>
                    <i class="fa fa-times" id="cancel"></i>
                </label>
                <div class="sidebar">
                  <header>Espace admin</header>
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-link"></i>Shortcuts</a></li>
                        <li><a href="#"><i class="fa fa-search"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i>Give&Collect</a></li>
                        <li><a href="#"><i class="fa fa-question-circle"></i>Events</a></li>
                        <li><a href="#"><i class="fa-light fa-basket-shopping"></i>Produits</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i>Contact</a></li>
                    </ul>
                </div> 
        </div>
    )
}