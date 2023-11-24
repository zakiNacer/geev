import React from 'react';
export default function Events(){
    <div>
        <div class="text-center"> 
            
            <h3>affiche la carte d'evenement</h3>
            <div class="d-flex">
                <div class="card" style="max-width: 700px;">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="..."/>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">L'évenement</h5>
                        <h6 class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h6>
                        <h6 class="card-text"><small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, similique itaque harum veritatis, provident nihil totam blanditiis quasi dolorem molestiae eligendi facilis neque? Quibusdam, fugit fugiat voluptate voluptas eum nisi.</small></h6>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="d-flex">
                    <a href style="background-color:orange; border: solid 2px; border-radius: 25px; margin: 5px; text-decoration: none; color: black; padding: 5px; height: 40px;">modifier</a>
                    <a href style="background-color:red; border: solid 2px; border-radius: 25px; margin: 5px; text-decoration: none; color: white;  padding: 5px; height: 40px;">Suprimmer </a>
                </div>
                
            </div>
        </div>
        <div class="text-center">
            <h4 class="mt-4"> ajouter un évenement </h4>
            <form action ="" method="POST" enctype="">
                <input type="datetime" class="form-control" placeholder="La date" aria-label="date" name="date"/>
                <input type="text" class="form-control" placeholder="lieu" aria-label="lieu" name="lieu"/>
                <input type="text" class="form-control" placeholder="détail lieu" aria-label="lieu" name="lieu"/>
                <h5> Prochain évenement </h5>
                
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description de l'évenement</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <label for="fichier" >Uploader une image </label>
                <input type="file" name="file" class="btn btn-primary"></input>
                <input type="submit" class="btn btn-primary mt-3"></input>

            </form>
        </div>
    </div>
} 