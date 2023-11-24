import React from 'react'

    export default function form(){
        return(
            <form>
             <label class="hi"><br></br>
              Nom :
             <input type="text" name="name" />
             </label><br></br>

             <label class="hi"><br></br>
              prenom :
             <input type="text" name="name" />
             </label><br></br>

             <label class="hi"><br></br>
              email :
             <input type="mail" name="mail" />
             </label><br></br>

             <label class="hi"><br></br>
              password :
             <input type="password" name="mail" />
             </label><br></br>

            <input class="btn" type="submit" value="Envoyer" />
            </form>
        )
    } 
    
