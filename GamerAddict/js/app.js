function afficherDate() {
    var ladate = new Date();
    var jour = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    var mois = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

    document.write(jour[ladate.getDay()] + ", le ");
    document.write(ladate.getDate() + " " + mois[ladate.getMonth()] + " " + ladate.getFullYear());
}

async function reqAjax() {
    document.getElementById("recherche").classList.add("loading");

    const data = new URLSearchParams();
    const nomProduit = document.getElementById("recherche").value;
    data.append("nomProduit", nomProduit);

    try {
        const response = await fetch("recherche.php",
            {
                method: 'POST',
                body: data
            });

        if (response.ok) {
            const codeHTMLRecherche = await response.text();
            traiterResultatAjax(codeHTMLRecherche);
        }
    } catch (err) {

    }
}

function traiterResultatAjax(codeHTMLRecherche) {
    console.log("Code HTML provenant du code PHP :\n" + codeHTMLRecherche);

    document.getElementById("suggestion").style.display = "block";
    document.getElementById("suggestion").innerHTML = codeHTMLRecherche;
    document.getElementById("recherche").classList.remove("loading");
}

function selectionnerProduit(nom, quantite) {
    console.log("Vous avez selectionner : " + nom);
    document.getElementById("recherche").value = nom;
    document.getElementById("suggestion").style.display = "none";

    document.getElementById("Quantity").innerHTML = "Nous en avons : " + quantite + " en stock.";
}