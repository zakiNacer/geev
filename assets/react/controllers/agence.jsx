import React from 'react';
export default function Agence(){
    return(
            <div class= "text-center">
                <div class="container col-md-7"> 
                    <h5>Gestion du contenu de l'agence</h5>
                    <div class="card bg-dark text-black text-center">
                        <img src="../public/assets/img/contact.png" class="card-img" alt=""/>
                        <div class="card-img-overlay">
                            <p class="card-text" style="font-size: x-large;">Découvez tout les services Unitudiant</p>
                        </div>
                    </div>
                   
                    <h5 class="mt-2">Ajouter du text a propos</h5> 
                    
                    
                   
                    <form action="HomeDashbord/add" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mt-1">
                                <textarea class="form-control" placeholder="Leave a comment here" name="text"    style="height: 100px"></textarea>
                                
                                <label for="text">Ajouter du text</label>
                        </div>
                        
                        <label for="fichier" >Uploader une image </label>
                            <input type="file" name="files" class="btn btn-primary"></input>
                        <input type="submit" class="btn btn-primary"></input>
                    </form>
                    <h5 class="mt-5">Ajouter une actualité</h5>
                    
                    
                   
                    <form action="HomeDashbord/addcard" method="POST" >
                        <div class="form-floating mt-1">
                                <textarea class="form-control" placeholder="Leave a comment here" name="titre2"    style="height: 100px"></textarea>
                                
                                <label for="text">Ajouter du text</label>
                        </div>
                        <div class="form-floating mt-1">
                                <textarea class="form-control" placeholder="Leave a comment here" name="contenu"    style="height: 100px"></textarea>
                                
                                <label for="text">Ajouter du text</label>
                        </div>
                        
                        
                        <input type="submit" class="btn btn-primary"></input>
                    </form>
                </div>              
            </div>
    )
}