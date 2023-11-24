import React from 'react';

export default function Products(){
    return(
        <div>
            <div class="table-responsive-sm" >
                <table class="table table-light  table table-bordered mt-5">
                <thead>
                    <td>id</td>
                    <td>image</td>
                    <td>nom</td>
                    <td>catégorie</td>
                    <td>nombre d'article</td>
                    <td>action </td>
                </thead>
                
                
                <tbody>
                    <tr>
                        <td>05</td> 
                        <td><img src="" style="width:70px;"/></td>
                        <td><p>Boite de conserve</p></td> 
                        <td><p>nouriture</p></td> 
                        <td><p>80</p></td> 
                        <td><a href=""/>🗑️</td>
                    </tr>
                    
                </tbody>
                
                </table>
            </div>
            <div class="text-center">
                <h4 class="mt-4"> ajouter des produits évenement </h4>
                <form action ="" method="POST" enctype="">
                
                    {/* {/* <input type="text" class="form-control" placeholder="nom du produit" aria-label="lieu" name="lieu"/> */}
                    
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description du produit</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <select class="form-select form-select-lg mb-3 mt-5" name="cat" aria-label=".
                    form-select-lg example">              
                        <option selected>choisissez la catégorie</option>                
                        <option value="">Vetement</option>
                        <option value="">Nouriture</option>
                        <option value="">Produit Hygien</option>                 
                    </select>
                    <input type="number" class="form-control" placeholder="quantité" aria-label="lieu" name="lieu"/>
                    <div class="input-group">
                        <span class="input-group-text">Evenement</span>
                        <select class="form-select form-select-lg mb-3 mt-5" name="cat" aria-label=".
                        form-select-lg example">              
                        <option selected>choisissez l'evenement</option>                
                        <option value="">17 avril</option>
                        <option value="">15 mai</option>
                        <option value="">16 mai</option>                 
                        </select>
                        <input type="text" aria-label="First name" class="form-control"/>
                    </div>
                    
                    <label for="fichier" >Uploader une image </label>
                    <input type="file" name="file" class="btn btn-primary"></input>
                    <input type="submit" class="btn btn-primary mt-3"></input>

                </form>
            </div>
        </div>
    );
}