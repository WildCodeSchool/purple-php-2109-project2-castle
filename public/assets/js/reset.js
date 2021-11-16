/**
 * création d'une pop-up de réinitialisation de la partie avec êtes 
 * vous sûr de vouloir quitter
 */
$("#yesno").easyconfirm({locale: { title: 'Select Yes or No', button: ['No','Yes']}});
$("#yesno").click(function() {
	alert("You clicked yes");
});


