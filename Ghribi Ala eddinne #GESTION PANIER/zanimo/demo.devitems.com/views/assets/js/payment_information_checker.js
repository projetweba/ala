function checker()
{
	if(document.f.nameoncard.value == "" && document.f.creditcardnumber.value == "" && document.f.cardverificationnumber.value == "")
	{
		alert("Merci de remplir les information de votre carte de credit information");
	}
	else
	{
		if(document.f.creditcardnumber.length!=16)
		{
			alert("Le numero de votre carte de credit est invalide");
		}
		else if(document.f.verificationnumber.length!=3)
		{
			alert("Le numero de Card Verification Number est invalide");
		}
	}

}