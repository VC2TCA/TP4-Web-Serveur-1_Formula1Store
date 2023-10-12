function afficherDate() {
    var ladate = new Date();
    var jour = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    var mois = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

    document.write(jour[ladate.getDay()] + ", le ");
    document.write(ladate.getDate() + " " + mois[ladate.getMonth()] + " " + ladate.getFullYear());
}