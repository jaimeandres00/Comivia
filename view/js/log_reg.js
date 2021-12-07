
function validation(){

	var name = document.getElementById("reg-name").value;

	var lastname = document.getElementById("reg-lastname").value;

	var email = document.getElementById("reg-email").value;

	var password = document.getElementById("reg-password").value;

	var phone = document.getElementById("reg-telnumber").value;

	var terms_and_conditions = document.getElementById("reg-check");

	if(name == null || name.lenght() == 0 || /^\s+$/.test(name)){

		return false;

	} else if(lastname == null || lastname.lenght() == 0 || /^\s+$/.test(lastname)){

		return false;

	} else if(!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))){

		return false;

	} else if(password == null || password.lenght() == 0 || /^\s+$/.test(password)){

		return false;

	} else if(!(/^\d{9}$/.test(phone))){

		return false;

	} else if(!(terms_and_conditions.checked)){

		return false;

	}

	return true;

}