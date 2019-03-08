
function validate2()
{
	var nom_livre = document.forms["addbook"]["bkname"];
	var nom_auteur = document.forms["addbook"]["author"];




 if(nom_livre.value=="")
 {
		 alert("entre le nom Svp");
		 nom_livre.focus();
		 return false;
 }

 if(nom_auteur.value=="")
 {
		 alert("entre le nom d'auteur SVP");
		 nom_auteur.focus();
		 return false;
 }


 var reg2 = /[a-zA-Z]$/
 if (reg2.exec(nom_livre.value) == null) {
		 alert("le nom du livre n'est pas convenable");
 nom_livre.focus();
 return false;
  }

		 var reg1= /[a-zA-Z]$/
		 if(reg1.exec(nom_auteur.value)==null) {
		 alert("le nom d'auteur n'est pas convenable");
		 nom_auteur.focus();
 return false;
 }

	return true;
}
