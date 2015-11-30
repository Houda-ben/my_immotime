function lien() {
	i = document.Choix.liste.selectedIndex;
	if (i == 0) return;
	url = document.Choix.liste.options[i].value;
	parent.location.href = url;
}