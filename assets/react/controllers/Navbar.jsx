import React,{useState} from 'react'


export default function Navbar(props){

    const [showLinks, setShowLinks]=useState(false)
    const handleShowLinks = ()=>{
         setShowLinks(!showLinks)
    }
    return(
        <div className="header_container">

            <div className="container">
                <header className="principal">
                    
                    <div className="six">
                        <a href="/">
                            <img  src="images/panier.png"/>
                        </a>
                    </div> 

                    <div className={`container barItems ${showLinks ? "show-nav" : "hide-nav"}`}>
                        <div className="panier">
                            <a href="/">
                                <img  src="/images/panier.png"/>
                            </a>
                        </div>

                        <div className="link"><a  href="/evenements" className="donBtn">Je participe</a></div>
                    </div>

                    <ul className="link_items">
                        <li className="navbar_item">
                            <h5>Évènements ▼</h5>
                            <ul className="dropdown">
                            
                                <li> <a href="/evenements">Évènements</a></li>
                                    <li><a href="">IUT de Bobigny</a></li>
                                
                            </ul>
                        </li>
                        
                        <li className="navbar_item">
                            <h5>Association ▼</h5>
                            <ul className="dropdown">
                            
                                <li> <a href="">Qu’est-ce que Give&collect ?</a></li>
                                    <li><a href="">UNI’tudiant</a></li>
                                
                            </ul>
                        </li>
                        <li className="navbar_item">
                            <h5>Nos partenairiats ▼</h5>
                            <ul className="dropdown">
                            
                                <li> <a href="">Crous Créteil</a></li>
                                
                            </ul>
                        </li>
                        <li className="navbar_item">
                            <h5>Nos dons ▼</h5>
                            <ul className="dropdown">
                            
                                <li> <a href="">Produits alimentaires</a></li>
                                    <li><a href="">Hygiène</a></li>
                                    <li><a href="">Fournitures scolaires</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                    
                    <div className="header_right">
                        <div className="icons">
                            <i className="fab fa-facebook"></i>
                            <i className="fab fa-twitter"></i>
                            <i className="fab fa-instagram"></i>
                            <i className="fab fa-tiktok"></i>
                            <i className="fab fa-linkedin"></i>       
                        </div>

                        <div className="auth_buttons">
                            <a className="auth_button" href="/register">Inscription</a>
                            <a className="auth_button" href="/login">Connexion</a>
                        </div>
                    </div>

                    <button className="navbar_burger popup_open" onClick={handleShowLinks}>
                        <span className="burger-bar"></span>
                    </button>

                    <div className="logoImg"><a href="/users"><img src="/images/compte.png"/></a></div>
                    
                </header>     
            </div>
        </div>
    )
}